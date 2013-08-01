<!DOCYTPE html>
<html lang="<?=$site_config['site']['lang'];?>">
<head>
  <meta charset="<?=$site_config['site']['charset'];?>" />
  <!-- Mobile Specifics -->
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>   
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?=$site_config['site']['title'];?></title>
<script src="http://maps.googleapis.com/maps/api/js?key=<?=$site_config['site']['google_api_key'];?>&sensor=true"></script>


  <!-- Include CSS files -->
  <link rel="stylesheet" type="text/css" href="<?=$site_config['site']['wwwroot'];?>/css/screen.css" />
  <link rel="stylesheet" type="text/css" href="<?=$site_config['site']['wwwroot'];?>/css/jquery.mobile-1.3.1.css" />
  <link href="<?=$site_config['site']['wwwroot'];?>/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap -->
  <link href="<?=$site_config['site']['wwwroot'];?>/css/settings.css" rel="stylesheet"><!-- Revolution Slider -->
  <link href="<?=$site_config['site']['wwwroot'];?>/css/main.css" rel="stylesheet"><!-- Main Style -->
  <link href="<?=$site_config['site']['wwwroot'];?>/css/fonts.css" rel="stylesheet"><!-- Custom Webfonts -->
  <link href="<?=$site_config['site']['wwwroot'];?>/css/responsive.css" rel="stylesheet"><!-- Responsive -->



  <!-- Include jQuery -->
  <script src="<?=$site_config['site']['wwwroot'];?>/js/jquery.min.js"></script> 
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<!--  <script src="<?=$site_config['site']['wwwroot'];?>/js/jquery-ui.min.js"></script> -->
<!--  <script src="<?=$site_config['site']['wwwroot'];?>/js/jquery.mobile-1.3.1.js"></script> -->

<!--  <script src="<?=$site_config['site']['wwwroot'];?>/js/bootstrap.min.js"></script>  Bootstrap -->
  <script src="<?=$site_config['site']['wwwroot'];?>/js/revolution.min.js"></script>
  <script src="<?=$site_config['site']['wwwroot'];?>/js/plugins.min.js"></script>
  <script src="<?=$site_config['site']['wwwroot'];?>/js/plugins.js"></script> <!-- Contains: jQuery Easing, jQuery ScrollTo -->

  <!-- Include Javascript files -->
  <script type="text/javascript" src="<?=$site_config['site']['wwwroot'];?>/js/main.js"></script>
  <script type="text/javascript" src="<?=$site_config['site']['wwwroot'];?>/js/desktop.js"></script>
  <script type="text/javascript" src="<?=$site_config['site']['wwwroot'];?>/js/mobile.js"></script>
  <script type="text/javascript" src="<?=$site_config['site']['wwwroot'];?>/js/emerge.js"></script>
  <script type="text/javascript" src="<?=$site_config['site']['wwwroot'];?>/js/host.js"></script>
  <script type="text/javascript" src="<?=$site_config['site']['wwwroot'];?>/js/mysql.js"></script>


  <script><? include(ROOT_PATH.'/js/init.js'); ?></script> <!-- Init JS -->
</head>

