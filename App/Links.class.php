<?php
namespace App;
class Links {
  private $links = array();
  private $server;

  public function __construct($server){
    $this->server = $server;
  }

  //Let's keep the date format the same everywhere, shall we?
  public function formatDate($timestamp){
    return date('D M j G:i:s Y', $timestamp);
  }

  //Sanitise the data for a link before it's outputed to the browser
  public function sanitiseLink($link){
    $link->title = htmlentities($link->title);
    $link->url = htmlentities($link->url);
    $link->dateString = $this->formatDate($link->date); 
    return $link;
  }

  //Get, erm... All of the links
  public function getAll($db){
    $links = $db->query('select * from links order by date desc');
    $this->links = array_values($links->fetchAll(\PDO::FETCH_OBJ));
    $that = $this;
    $this->links = array_map(array($this, 'sanitiseLink'), $this->links);
    return json_encode((array) $this->links);
  }

  //I'm not even going to bother giving this a comment
  public function delete($db){
    $url = $this->server->postVar('url');
    $statement = $db->prepare('delete from links where url = :url');
    $result = $statement->execute(array(
      ':url' => $url
    ));
    return json_encode((object) array(
      'status' => $result
    ));    
  }

  public function add($db){
    $title = $this->server->postVar('title');
    $url = $this->server->postVar('url');

    if (!$title) {
      return json_encode((object) array(
        'error'       => true,
        'errorString' => 'You must specify a title'
      ));
    }
    if (!filter_var($url, FILTER_VALIDATE_URL)){
      return json_encode((object) array(
        'error'       => true,
        'errorString' => 'You must specify a valid URL'
      ));
    }

    $statement = $db->prepare('
      insert into links (title, url, date) 
      values (:title, :url, :date)
    ');
    $now = time();
    $result = $statement->execute(array(
      ':title' => $title,
      ':url'   => $url,
      ':date'  => $now
    ));

    //Return any errors AND the link so the page can insert it into the list without refresh
    return json_encode($this->sanitiseLink((object) array(
      'error'       => !$result,
      'errorString' => $result? '' : 'Could not add link!',

      'title'       => $title,
      'url'         => $url,
      'date'        => $now,
      'dateString'  => $this->formatDate($now)
    )));
  }
}
