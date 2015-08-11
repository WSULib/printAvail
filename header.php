<?php

$liburl = "";



function getBaseUrl() 
{
  // output: /myproject/index.php
  $currentPath = $_SERVER['PHP_SELF']; 
  
  // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
  $pathInfo = pathinfo($currentPath); 
  
  // output: localhost
  $hostName = $_SERVER['HTTP_HOST']; 
  
  // output: http://
  $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
  
  // return: http://localhost/myproject/
  return $protocol.$hostName.$pathInfo['dirname'];
}

?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <style>
        i {
        display:none;
        }
        input[class=input-large] {
        line-height: 1em;
        }

      </style>
      <script src="/resources/quicksearch/inc/bootstrap/js/html5shiv.js"></script>
      <script src="/resources/quicksearch/inc/bootstrap/js/respond.min.js"></script>
    <![endif]-->
<!-- third party localStorage compatability -->
<script src="/inc/js/storage.js"></script>
<script src="/resources/quicksearch/js/bento_queries.js"></script>

<div class="pipeline" style="display: none;">
   <h3>You are viewing the University Libraries site inside another website</h3>
   <p><a href="http://www.lib.wayne.edu" target="_blank">Please get the full experience of the University Libraries website in a new window</a></p>
</div>

<div id="libheader">
  <div id="libheader-top">
    <div id="libheader-top-nest" class="container">
      <div id="libheader-top-left">
        <a class="waynelogo" href="<?php echo 'http://' . $_SERVER['HTTP_HOST']; ?>"></a>
        <a class="uniliblogo" href="#"></a>
      </div>
      <div id="libheader-top-right">
        <div id="libheader-top-right-quicksearchlogo"></div>
        <div id="libheader-top-right-searchwrap">
          <form action="#" onsubmit="searchCall('form_submit','header'); return false;" class="inline-form search-form">
            <div id="libheader-top-right-searchboxwrap">
              <input type="text" value=""  id="search_string" class="search-field" autocomplete="off" />
            </div>
            <div id="libheader-top-right-searchsubmitwrap">
              <input type="submit" value="" />
            </div>
          </form>
        </div>
        <div id="search-suggestions"></div>
      </div>
    </div>
  </div>
  <div id="libheader-bottom">
    <div id="libheader-bottom-nest" class="container">
      <div class="floatleft">
        <ul>
          <li>
            <a href="/" title="Home Page"><span class="icon-home"></span></a>
          </li>
          <li class="dd">
            <a>Resources</a>
            <ul class="ddmenu">
              <li><a href="/resources/databases">Article Databases</a></li>
              <li><a href="http://elibrary.wayne.edu/search/X" target="_self">Catalog</a></li>
              <li><a href="http://up7af9tu5s.search.serialssolutions.com/?SS_Page=refiner">Citation Linker</a></li>
              <li><a href="http://digital.library.wayne.edu/">Digital Collections</a></li>
              <li><a href="http://digitalcommons.wayne.edu/">Digital Commons</a></li>
              <li><a href="/resources/ebooks">eBooks</a></li>
              <li><a href="/resources/journals">E-Journals</a></li>
              <li><a href="http://guides.lib.wayne.edu/content.php?pid=248390">Reference Tools</a></li>
              <li><a href="/resources/guides">Research Guides</a></li>
              <li><a href="http://guides.lib.wayne.edu/friendly.php?action=82&amp;s=SpecialCollections">Special Collections</a></li>
              <li><a href="http://wayne.summon.serialssolutions.com/">Summon</a></li>
              <li class="ddmenulastlink"><a href="/resources">All Resources</a></li>
            </ul>
          </li>
          <li class="dd">
            <a>Services</a>
            <ul class="ddmenu">
              <li><a href="/services/help">Ask-A-Librarian</a></li>
              <li><a href="/services/borrowing">Borrowing</a></li>
              <li><a href="/services/classroom">Classroom Support</a></li>
              <li><a href="/services/computing">Computing</a></li>
              <li><a href="http://copyright.wayne.edu/">Copyright@Wayne</a></li>
              <li><a href="/services/events">Events Support</a></li>
              <li><a href="/services/research">Faculty/Grad Research Support</a></li>
              <li><a href="https://wayne.illiad.oclc.org/illiad/illiad.dll">Interlibrary Loan</a></li>
              <li><a href="/services/instruction">Instruction</a></li>
              <li><a href="/services/reserves">Reserves</a></li>
              <li><a href="/services/rooms">Room Reservations</a></li>
              <li><a href="http://scholarscooperative.wayne.edu/">Scholars Cooperative</a></li>
              <li class="ddmenulastlink"><a href="http://library.wayne.edu/services">All Services</a></li>
            </ul>
          </li>
          <li class="dd">
            <a>Libraries</a>
            <ul class="ddmenu">
              <li><a href="/neef">Arthur Neef Law Library</a></li>
              <li><a href="/pk">Purdy/Kresge Library</a></li>
              <li><a href="/reuther">Reuther Library</a></li>
              <li><a href="/shiffman">Shiffman Medical Library</a></li>
              <li><a href="/ugl">Undergraduate Library</a></li>
              <li class="ddmenudivider"></li>
              <li><a href="/info/about">About</a></li>
              <li><a href="/info/app-lab">App Lab</a></li>
              <li><a href="/info/staff">Contact Info/Staff Directory</a></li>
              <li><a href="/info/hours">Hours</a></li>
              <li><a href="/info/maps">Maps and Directions</a></li>
              <li><a href="http://www.lib.wayne.edu/blog">News</a></li>
              <li><a href="/info/policies">Policies</a></li>
              <li class="ddmenulastlink"><a href="/info">All Information</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="floatright">
        <ul>
          <li class="dd">
            <a>Log In</a>
            <ul class="ddmenu">
              <li>
                <div class="ddmenulogin">
                  <form>
                    <label>Access ID:</label>
                    <input type="text" />
                    <div style="margin-top:10px;">
                      <label>Password:</label>
                      <input type="text" />
                    </div>

                    <div class="ddmenuloginlocation">
                      <input type="radio" name="service" value="academica" checked="checked"><label for="academica"><span>Academica</span></label>
                      <input type="radio" name="service" value="blackboard"><label for="blackboard"><span>Blackboard</span></label>
                      <input type="radio" name="service" value="webmail"><label for="webmail"><span>Webmail</span></label>
                    </div>

                    <input type="submit" />

                  </form>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="http://elibrary.wayne.edu/patroninfo">Renew Books</a>
          </li>
          <li>
            <a href="http://library.wayne.edu/services/help/">Ask-A-Librarian</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<header class="header" role="banner" style="display:none">
<!-- <header class="header" role="banner">
 -->  <div class="container">
    <div class="col-md-3 wsu-logo">
      <a href="http://wayne.edu"><img src="/pattern-lib/images/green_gold_wayne_left.png" class="logo wayne-left" alt="Wayne State University" /></a><a href="/"><img src="/pattern-lib/images/green_gold_lib_right2.png"  class="logo lib-right" alt="Wayne State University" /></a>
    </div>
    <div class="col-md-9 bento-search" style="position:relative;">
      <div id="search-quicksearch-logo"></div>
      <form action="#" onsubmit="searchCall('form_submit','header'); return false;" class="inline-form search-form">
        <fieldset data-intro="Search for everything here">
          <legend class="is-vishidden">Search</legend>
          <label for="search-field" class="is-vishidden">Quicksearch</label>
          <input type="search" placeholder="Find articles, books, journals, and more" id="search_string" class="search-field" autofocus="autofocus" autocomplete="off" />
          <button type="submit" id="submit" class="search-submit">
            <span class="icon-search" aria-hidden="true"></span>
            <span class="is-vishidden">Search</span>
          </button>
        </fieldset>
      </form>
      <div id="search-suggestions" style="position:absolute;top:68px;top:54px;left:200px;z-index:99999999999999;width:100%;height:auto;background:#fff;"></div>
    </div>

    <nav id="nav" class="main-nav" role="navigation">
      <ul class="nav navbar-nav">
        <li class="home-nav"><a href="/" title="Home Page"><span class="icon-home"></span></a></li>
<!--         <li class="dropdown selected">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">QuickSearch &trade;</a>
        </li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Resources</a>
          <ul class="dropdown-menu">
            <li><a href="/resources/databases">Article Databases</a></li>
            <li><a href="http://elibrary.wayne.edu/search/X" target="_self">Catalog</a></li>
            <li><a href="http://up7af9tu5s.search.serialssolutions.com/?SS_Page=refiner">Citation Linker</a></li>
            <li><a href="http://digital.library.wayne.edu/">Digital Collections</a></li>
            <li><a href="http://digitalcommons.wayne.edu/">Digital Commons</a></li>
            <li><a href="/resources/ebooks">eBooks</a></li>
            <li><a href="/resources/journals">E-Journals</a></li>
            <li><a href="http://guides.lib.wayne.edu/content.php?pid=248390">Reference Tools</a></li>
            <li><a href="/resources/guides">Research Guides</a></li>
            <li><a href="http://guides.lib.wayne.edu/friendly.php?action=82&s=SpecialCollections">Special Collections</a></li>
            <li><a href="http://wayne.summon.serialssolutions.com/">Summon</a></li>
            <li class="divider hidden-xs"></li>
            <li class="hidden-xs"><a href="/resources">All Resources</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Services</a>
          <ul class="dropdown-menu">
            <li><a href="/services/help">Ask-A-Librarian</a></li>
            <li><a href="/services/borrowing">Borrowing</a></li>
            <li><a href="/services/classroom">Classroom Support</a></li>
            <li><a href="/services/computing">Computing</a></li>
            <li><a href="http://copyright.wayne.edu/">Copyright@Wayne</a></li>
            <li><a href="/services/events">Events Support</a></li>
            <li><a href="/services/research">Faculty/Grad Research Support</a></li>
            <li><a href="https://wayne.illiad.oclc.org/illiad/illiad.dll">Interlibrary Loan</a></li>
            <li><a href="/services/instruction">Instruction</a></li>
            <li><a href="/services/reserves">Reserves</a></li>
            <li><a href="/services/rooms">Room Reservations</a></li>
            <li><a href="http://scholarscooperative.wayne.edu/">Scholars Cooperative</a></li>
            <li class="divider hidden-xs"></li>
            <li class="hidden-xs"><a href="/services">All Services</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Libraries</a>
          <ul class="dropdown-menu">
            <li><a href="/neef">Arthur Neef Law Library</a></li>
            <li><a href="/pk">Purdy/Kresge Library</a></li>
            <li><a href="http://www.reuther.wayne.edu">Reuther Library</a></li>
            <li><a href="/shiffman">Shiffman Medical Library</a></li>
            <li><a href="/ugl">Undergraduate Library</a></li>
            <li class="divider hidden-xs"></li>
            <li><a href="/info/about">About</a></li>
            <li><a href="/info/app-lab">App Lab</a></li>
            <li><a href="/info/staff">Contact Info/Staff Directory</a></li>
            <li><a href="/info/hours">Hours</a></li>
            <li><a href="/info/maps">Maps and Directions</a></li>
            <li><a href="http://www.lib.wayne.edu/blog">News</a></li>
            <li><a href="/info/policies">Policies</a></li>
            <li class="divider hidden-xs"></li>
            <li class="hidden-xs"><a href="/info">All Information</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-right">
        <li class="login-nav"><a href="#"><!-- <span class="icon-user"></span> &nbsp; -->Log In</a></li>
        <li><a href="http://elibrary.wayne.edu/patroninfo"><!-- <span class="icon-book"></span> &nbsp; -->Renew Books</a></li>

        <li><a href="#" onclick="window.open('http://libraryh3lp.com/chat/waynegenref@chat.libraryh3lp.com?skin=13780&theme=gtalk&title=Ask-A-Librarian&identity=Librarian&sounds=true', 'chat', 'resizable=1,width=350,height=350'); return false;" data-toggle="modal" data-target="#chatmodal">Chat</a></li>

        <li class= "chat-btn" data-intro="Questions?" data-position="right"> <a href="/services/help/"><!-- <span class="icon-box"></span> &nbsp; -->Ask-A-Librarian</a></li>
      </ul>
      <div id="nav-menu"></div>
    </nav>
  </div>

  <div id="functionmenu" class="col-md-12 login-options">
    <div class="container">
      <div id="wsulinks">
        <a href="http://pipeline.wayne.edu">Pipeline</a>
        <a href="http://blackboard.wayne.edu">Blackboard</a>
        <a href="http://webmail.wayne.edu">Webmail</a>
      </div>
      <div id="secondarylinks">
        <ul class="login-nav">
          <li><a href="http://elibrary.wayne.edu/patroninfo">My Library Account</a></li>
          <li><a href="https://apps.med.wayne.edu/ssonew/?actionUrl=http://apps.med.wayne.edu/ureserve/">SoM Study Room Reservation</a></li>
          <li><a href="http://owa.med.wayne.edu/">SOM</a></li>
          <li><a href="http://www.dmc.org/staff">DMC</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>

<!-- beta banner -->
<?php /*<div class="feedback">Help us improve this site. <a href="https://waynestate.az1.qualtrics.com/SE/?SID=SV_6nDzfp3WSP0lTox">Please give us feedback</a></div> */?>
<!-- beta banner -->
      <?php
        $rss = new DOMDocument();
        $rss->load('http://library.wayne.edu/blog/?cat=313&feed=rss2');
        $feed = array();
        foreach ($rss->getElementsByTagName('item') as $node) {
          $item = array ( 
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            );
          array_push($feed, $item);
        }
        $limit = 1; // number of posts to show
        for($x=0;$x<$limit;$x++) {
          $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
          $link = $feed[$x]['link'];
          $description = $feed[$x]['desc'];
          // $dateM = date('M', strtotime($feed[$x]['date']));
          // $dateD = date('d', strtotime($feed[$x]['date']));
          // $dateY = date('Y', strtotime($feed[$x]['date']));

          echo   '<div class="urgent">
          <a href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a>
          </div>';
          
        }
      ?>

      <script>
      $(".urgent a:empty").parent().hide();
      </script>