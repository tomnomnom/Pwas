#!/usr/local/bin/php
<?php
require('./Core/Init.php');

$urls[] = "http://apptember.com/||Apptempber||Wed Sep 2 10:45:15 2009";
$urls[] = "http://arstechnica.com/open-source/guides/2009/09/how-to-build-a-twitter-extension-for-chrome.ars/2||Twitter Chrome Extension||Wed Sep 9 8:31:14 2009";
$urls[] = "http://aymanh.com/how-debug-bash-scripts||How to debug bash scripts||Tue Aug 25 8:15:52 2009";
$urls[] = "http://beej.us/blog/2010/01/digital-sound/||Audio Programming Intro||Wed Feb 10 23:52:25 2010";
$urls[] = "http://blog.backblaze.com/2009/09/01/petabytes-on-a-budget-how-to-build-cheap-cloud-storage/||Petabytes on a budget - backblaze||Wed Sep 2 9:48:00 2009";
$urls[] = "http://blog.danielwellman.com/2008/10/real-life-tron-on-an-apple-iigs.html||Real Life Tron||Mon Aug 3 9:16:18 2009";
$urls[] = "http://blog.rabidgremlin.com/2009/08/12/svnviz-1-0-0-released/||SVN Viz||Thu Sep 17 0:47:08 2009";
$urls[] = "http://carsonified.com||Carsonified||Wed Jul 22 14:12:57 2009";
$urls[] = "http://code.google.com/p/gource/||Gource||Thu Sep 17 0:42:45 2009";
$urls[] = "http://couchdb.apache.org||CouchDB||Fri Sep 11 11:24:01 2009";
$urls[] = "http://crypto.stanford.edu/~blynn/c/ch02.html||C||Fri Dec 18 16:46:48 2009";
$urls[] = "http://data.hmg.gov.uk/||HMG Data||Thu Oct 1 17:11:08 2009";
$urls[] = "http://developers.facebook.com/opensource.php||Facebook Open Source||Sun Jan 31 14:12:40 2010";
$urls[] = "http://developer.yahoo.com/yui/theater/video.php?v=crockford-yuiconf2009-state||Douglas Crockford . The State and Future of JavaScript||Thu Dec 10 16:59:49 2009";
$urls[] = "http://domai.nr/||Domai.nr||Wed Sep 30 14:43:48 2009";
$urls[] = "http://en.wikipedia.org/wiki/Ido||Ido||Sun Aug 9 20:38:48 2009";
$urls[] = "http://freeworld.thc.org/root/phun/unmaintain.html||How to write unmaintainable code||Fri Jan 22 15:27:53 2010";
$urls[] = "http://gigamonkeys.com/book/||Practical Common Lisp||Tue Jan 26 10:42:18 2010";
$urls[] = "http://gizmodo.com/5323671/3d-projection-gives-building-fantastical-undulating-skin||3D Building Projection||Tue Jul 28 8:50:21 2009";
$urls[] = "http://golang.org/||Go Language||Wed Nov 11 3:24:04 2009";
$urls[] = "http://idleprocess.wordpress.com/2009/11/24/presentation-summary-high-performance-at-massive-scale-lessons-learned-at-facebook/||Facebook scaling notes||Wed Dec 9 1:23:40 2009";
$urls[] = "http://jaxer.org||Jaxer||Sun Aug 16 15:52:02 2009";
$urls[] = "http://jsconf.eu/2009/video_nodejs_by_ryan_dahl.html||NodeJS talk||Sat Nov 28 18:29:48 2009";
$urls[] = "http://karl-voit.at/vim-emacs-cheatsheet_of_freezing_hell.txt||Vi -> Emacs cheat sheet||Mon Nov 30 12:53:30 2009";
$urls[] = "http://kore-nordmann.de/blog/php_charset_encoding_FAQ.html||PHP charsets / encoding||Fri Jul 17 20:23:51 2009";
$urls[] = "http://lite.facebook.com/blake/notes/Why-products-are-complicated-and-how-to-fix-them/251878465503/||Facebook Lite Notes||Sat Sep 12 11:17:23 2009";
$urls[] = "http://love2d.org/||Love||Tue Dec 29 2:54:05 2009";
$urls[] = "http://meyerweb.com/eric/tools/color-blend/||Colour Blender||Tue Aug 11 22:37:53 2009";
$urls[] = "http://misko.hevery.com/||Misko Hevery||Thu Oct 8 23:45:08 2009";
$urls[] = "http://mlntn.com/2009/12/08/how-to-build-a-google-chrome-extension-in-15-minutes/||Build a Google Chrome extension in 15 minutes||Thu Dec 10 16:56:38 2009";
$urls[] = "http://my.opera.com/ODIN/blog/2009/10/05/future-of-web-apps-london-html5||BruceL FOWA/HTML5 slides||Mon Oct 5 12:35:09 2009";
$urls[] = "http://nodejs.org/||NodeJS||Mon Nov 23 15:43:27 2009";
$urls[] = "http://openknot.com/||Rob Tuley||Mon Nov 9 17:49:15 2009";
$urls[] = "http://oreilly.com/pub/a/php/archive/mvc-intro.html?page=1||Understanding MVC in PHP||Mon Dec 14 10:58:52 2009";
$urls[] = "http://particletree.com/features/php-quick-profiler/||PHP Quick Profiler||Thu Jul 23 19:01:06 2009";
$urls[] = "http://particletree.com/features/visualizing-fittss-law/||Fitts' Law||Wed Mar 24 19:32:08 2010";
$urls[] = "http://phing.info/trac/||Phing||Fri Nov 6 15:59:52 2009";
$urls[] = "http://phpwiki.stevethemonkey.co.uk/||PHP Wiki||Wed Aug 19 18:52:33 2009";
$urls[] = "http://qbnz.com/highlighter/index.php||Generic Syntax Highlighter||Thu Oct 8 8:49:22 2009";
$urls[] = "http://rad-dev.org/lithium/||Lithium PHP5.3 Framework||Tue Dec 1 10:05:34 2009";
$urls[] = "http://search.cpan.org/~infinoid/App-SVN-Bisect-0.9/bin/svn-bisect||SVN Bisect||Tue Nov 24 13:25:09 2009";
$urls[] = "http://simonwillison.net/2009/Nov/23/node/||Node.js is exciting||Mon Nov 23 15:32:35 2009";
$urls[] = "http://smerity.com/interviews.html||Questions||Tue Oct 27 17:40:50 2009";
$urls[] = "http://snow.meta.io/||Snow||Sat Aug 8 15:52:44 2009";
$urls[] = "http://spritesmods.com/?art=wiimote-mamegun||Wiimote on Linux||Mon Nov 30 9:32:05 2009";
$urls[] = "http://stackoverflow.com/questions/164847/what-is-in-your-vimrc||Stack Overflow .vimrc files thread||Tue Nov 10 17:19:01 2009";
$urls[] = "http://stevelosh.com/blog/2010/02/my-extravagant-zsh-prompt/||Cool ZSH Shell||Mon Feb 1 20:14:56 2010";
$urls[] = "http://svn.knotwerk.com/trunk/reflection/Xhtml/Php.php||RobT's PHP -> XHTML converter||Thu Oct 8 8:22:58 2009";
$urls[] = "http://tn123.ath.cx/mod_xsendfile/||mod_xsendfile||Wed Nov 25 12:52:29 2009";
$urls[] = "http://tomayko.com/writings/unicorn-is-unix||Unicorn is Unix||Wed Oct 7 8:29:59 2009";
$urls[] = "http://trac.edgewall.org/||Trac||Mon Jul 20 9:21:27 2009";
$urls[] = "http://twitpicwall.com/||Twit Pic Wall||Mon Aug 3 9:04:07 2009";
$urls[] = "http://uk3.php.net/manual/en/language.oop5.reflection.php||PHP Reflection API||Mon Jul 20 13:31:55 2009";
$urls[] = "http://uk.php.net/manual/en/book.openal.php||PHP Open AL||Sun Oct 11 19:03:10 2009";
$urls[] = "http://video.google.com/videoplay?docid=-6304964351441328559#||YouTube Scaling Talk||Fri Oct 30 15:23:57 2009";
$urls[] = "http://vimeo.com/seandevlin||Sean Devlin - Lisp videos||Thu Apr 8 18:08:43 2010";
$urls[] = "http://vis.cs.ucdavis.edu/~ogawa/codeswarm/||Code Swarm||Thu Sep 17 0:46:50 2009";
$urls[] = "http://wiki.eth-0.nl/index.php/LackRack||LackRack||Tue Jan 26 15:48:01 2010";
$urls[] = "http://wiki.github.com/sorccu/cufon/demos||Cufon||Wed Aug 5 16:21:51 2009";
$urls[] = "http://www.aharef.info/static/htmlgraph/||HTML Graph||Fri Aug 28 15:40:05 2009";
$urls[] = "http://www.autohotkey.com/||AutoHotKey||Sun Jan 24 2:18:11 2010";
$urls[] = "http://www.billyreisinger.com/jash/||JASH||Sun Jul 26 19:55:22 2009";
$urls[] = "http://www.blackcircles.com||Black Circles||Thu Sep 3 18:22:04 2009";
$urls[] = "http://www.brucelawson.co.uk/||BruceL||Mon Oct 5 11:39:14 2009";
$urls[] = "http://www.cg-lock.co.uk||CG Lock||Tue Aug 25 22:03:32 2009";
$urls[] = "http://www.colourlovers.com/web/blog/2010/03/11/calculating-color-contrast-for-legible-text||Text contrast math||Sat Mar 13 12:38:48 2010";
$urls[] = "http://www.dailymotion.com/video/xbvr0m_the-intelligence%B2-debate-stephen-fr_shortfilms||Stephen Fry - Intelligence2 Debate||Tue Feb 9 14:56:39 2010";
$urls[] = "http://www.dealextreme.com||Deal Extreme||Tue Jul 28 12:01:57 2009";
$urls[] = "http://www.debianadmin.com/vimdiff-edit-two-or-three-versions-of-a-file-with-vim-and-show-differences.html||Vimdiff||Fri Jul 24 14:57:29 2009";
$urls[] = "http://www.e-booksdirectory.com/programming.php||Programming books||Fri Jul 17 20:27:22 2009";
$urls[] = "http://www.firstgiving.com/findingmoonshine||A shape named after you||Thu Nov 26 1:28:11 2009";
$urls[] = "http://www.fontcapture.com||Font Capture||Thu Oct 29 13:28:52 2009";
$urls[] = "http://www.fontsquirrel.com/||Font Squirrel||Thu Aug 27 14:39:02 2009";
$urls[] = "http://www.guardian.co.uk/open-platform/blog/uk-scale-camp||UK Scale Camp||Wed Nov 4 19:55:20 2009";
$urls[] = "http://www.hackerfactor.com/||Hacker Factor||Mon Dec 28 4:08:53 2009";
$urls[] = "http://www.hackurls.com/||Hackurls||Wed Mar 17 15:39:58 2010";
$urls[] = "http://www.hiren.info/pages/bootcd||Hiren's Boot CD||Mon Feb 15 9:22:04 2010";
$urls[] = "http://www.iamcal.com/||Cal Henderson - I Am Cal||Fri Oct 9 12:46:30 2009";
$urls[] = "http://www.linux-mag.com/id/7480/1/||Ten things about Apache 2.2||Wed Sep 2 23:29:45 2009";
$urls[] = "http://www.logarithmic.net/pfh/resynthesizer||Resynthesizer||Fri Mar 26 10:27:22 2010";
$urls[] = "http://www.mindcipher.net/||Mind Cipher||Thu Jul 30 20:12:24 2009";
$urls[] = "http://www.motorcycleseatworks.co.uk/||Motor Cycle Seat Works||Wed Sep 2 22:30:59 2009";
$urls[] = "http://www.naturalmotion.com/euphoria.htm#video||Natural Motion||Tue Jul 21 16:24:09 2009";
$urls[] = "http://www.ocremix.org/||Overclocked Remix||Fri Jul 24 9:51:29 2009";
$urls[] = "http://www.open3dweb.com/demos/2d/canvasexpt/||Pretty canvas animation||Fri Sep 25 8:59:35 2009";
$urls[] = "http://www.parkers.co.uk/cars/specs/#||Parkers car facts||Fri Jul 17 21:59:18 2009";
$urls[] = "http://www.phpcompiler.org/||PHC||Tue Sep 15 1:09:34 2009";
$urls[] = "http://www.phpied.com/make-your-javascript-a-windows-exe/||Windows Executables from JScript||Thu Sep 3 13:34:59 2009";
$urls[] = "http://www.pirateparty.org.uk||UK Pirate Party||Thu Aug 13 11:05:38 2009";
$urls[] = "http://www.recessframework.org/page/map-reduce-anonymous-functions-lambdas-php||PHP5.3 Map/Reduce||Sat Aug 22 14:14:45 2009";
$urls[] = "http://www.rexswain.com/benford.html||Benford's Law||Fri Nov 6 16:06:41 2009";
$urls[] = "http://www.scribd.com/doc/19072592/State-of-the-Art-Post-Exploitation-in-Hardened-PHP-Environments||State of the Art Post Exploitation in Hardened PHP Environments||Mon Nov 9 14:25:19 2009";
$urls[] = "http://www.storytotell.org/blog/2009/08/11/postgresql84-recursive-queries.html||Postgres 8.4 Recursive Queries||Thu Aug 13 8:45:14 2009";
$urls[] = "http://www.sun.com/software/solaris/||Solaris||Tue Jul 21 16:54:38 2009";
$urls[] = "http://www.synthesiagame.com/||Synthesia||Sat Jan 23 20:45:18 2010";
$urls[] = "http://www.tarbagan.net/nodo/how/how.html||Throat Singing||Mon Jan 25 8:52:55 2010";
$urls[] = "http://www.vosgeschocolate.com/category/bacon_and_chocolate||Bacon Chocolate||Mon Sep 14 1:38:01 2009";
$urls[] = "http://www.wana.at/vimshell/||Vim Shell||Mon Jan 25 21:41:18 2010";
$urls[] = "http://www.wordle.net||Wordle||Wed Sep 9 15:47:16 2009";
$urls[] = "http://www.xaprb.com/blog/2009/08/18/how-to-find-un-indexed-queries-in-mysql-without-using-the-log/||Finding un-indexed MySQL queries without a log||Wed Aug 19 18:51:46 2009";
$urls[] = "http://www.ymacs.org/?re||Ymacs||Thu Nov 26 23:19:44 2009";
$urls[] = "http://www.youtube.com/view_play_list?p=664F2AE1160FF884||The Secret Life of Chaos||Mon Jan 25 21:29:20 2010";
$urls[] = "http://www.youtube.com/watch?v=i6Fr65PFqfk||Why I Hate Django||Fri Oct 9 12:40:57 2009";
$urls[] = "http://www.youtube.com/watch?v=NWdTcxv4V-g&feature=PlayList&p=C074DFE1A0371DE4&index=0||Infinity||Sun Feb 14 1:00:29 2010";
$urls[] = "http://yaws.hyber.org/||YAWS||Wed Dec 16 13:31:46 2009";

$db = \Core\PdoFactory::getDb();

//Clear the table out first
$db->query('delete from links');

//Insert all the test data
foreach ($urls as $url){
  list($url, $title, $date) = explode('||', $url);
  $statement = $db->prepare('
    insert into links (url, title, date)
    values (:url, :title, :date)
  ');
  $result = $statement->execute(array(
    ':url' => $url,
    ':title' => $title, 
    ':date' => strToTime($date)
  ));
  if (!$result){
    $error = $statement->errorInfo();
    echo "Error: {$error[2]}\n";
  }
}
