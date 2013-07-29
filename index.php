<?
//	Index.php
//  Emerge Framework
require_once('inc.php');
include(ROOT_PATH.'/lib/html/head.php');
?>
<script type="text/javascript">
$(function() {
  emerge.ajax_get('ajax/main.php', 'main_content');
});
  function search_for_book() {
    var search_term = jQuery('#search_term').val();
    emerge.ajax_get('ajax/google_books_rest.php?query='+search_term, 'slider');
  }

</script>
<body>
  

<!-- Header -->
<header>
  <div class="container">
      <div class="row">
          <div class="span2">
              <div id="logo">
              <a href="/" title="Stacks"><img src="img/logo.png" /></a>
            </div>
            </div>
            
            <div class="span10">
              <!-- Mobile Menu -->
              <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
                
                <!-- Standard Menu -->
            <nav id="menu">
                    <ul id="menu-nav">
                        <!--<li><a href="#" onClick="search_for_book();">TEST</li> -->
                        <li class="active"><a href="/">home</a></li>
                        <li><a href="#" id="menu-stacks">stacks</a></li>
                        <li><a href="#" id="menu-genres">genres</a></li>
                        <li class="search">
                          <div class="show-hide">
                            <a href="#">search</a>
                          </div>
                          <div class="search-box">
                            <input id="search-box" type="search" placeholder="Search for a book near you">
                            <div class="show-hide"><img src="/img/close.png"></div>
                          </div>
                        </li>
                    </ul>
          </div>
        </div>
    </div>
</header>




<!-- Start Slider -->
<section id="slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            
            <ul>

                <li data-transition="random" data-slotamount="1" data-masterspeed="300">
                    <img src="img/slide1.jpg" alt="Image" data-fullwidthcentering="on">
                </li>

                <li data-transition="random" data-slotamount="1" data-masterspeed="300">
                    <img src="img/slide2.jpg" alt="Image" data-fullwidthcentering="on">
                </li>

                <li data-transition="random" data-slotamount="1" data-masterspeed="300">
                    <img src="img/slide3.jpg" alt="Image" data-fullwidthcentering="on">
                </li>

                <li data-transition="random" data-slotamount="1" data-masterspeed="300">
                    <img src="img/slide4.jpg" alt="Image" data-fullwidthcentering="on">
                </li>

                <li data-transition="random" data-slotamount="1" data-masterspeed="300">
                    <img src="img/slide5.jpg" alt="Image" data-fullwidthcentering="on">
                </li>
                            
            </ul>
            
        </div>
    </div>
</section>
<!-- End Slider -->




<!-- Start Intro Box-->
<section id="intro-box" class="margin-80">
    <div class="container">
        <div class="row">
            <div class="span12"><h3>Simplicity. Literacy. Community.</h3></div>
        </div>
    </div>
</section>
<!--End Intro Box -->




<!-- Start Footer -->
<footer>
       <nav id="social-footer">
                <ul>
                    <li><a href="#" title=""><i class="font-icon-social-twitter"></i></a></li>
                    <li><a href="#" title=""><i class="font-icon-social-facebook"></i></a></li>
                    <li><a href="#" title=""><i class="font-icon-social-google-plus"></i></a></li>
                </ul>
            </nav>   
</footer>
<!-- End Footer -->




<!-- Start Credits -->
<section id="footer-credits">

  <div class="container">
      <div class="row">
          <div class="span12">
              <p class="credits">&copy; 2013 Stacks. All rights reserved.</p>
            </div>
        </div>
    </div>
</section>
<!-- End Credits -->

  <div id="main_content" data-role="content"></div>


</body>
</html>
<? exit; ?>
