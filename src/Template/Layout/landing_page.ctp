<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="Responsive Bootstrap Multi-Purpose Landing Page Template">
<meta name="keywords" content="LandX, Bootstrap, Landing page, Template, Registration, Landing">
<meta name="author" content="Mizanur Rahman">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- SITE TITLE -->
  <title>Sell Start</title>

  <?php $host = $this->Url->build('/', true) ?>
  
  <?= $this->Html->meta([
      'link' => $host."img/landing/favicon.ico",
      'rel' => 'icon'
  ]);
  ?>

  <?= $this->Html->meta([
      'link' => $host."img/landing/apple-touch-icon.png",
      'rel' => 'apple-touch-icon'
  ]);
  ?>
  <?= $this->Html->meta([
      'link' => $host."img/landing/apple-touch-icon-72x72.png",
      'rel' => 'apple-touch-icon',
      'sizes' => "72x72"
  ]);
  ?>
  <?= $this->Html->meta([
      'link' => $host."img/landing/apple-touch-icon-114x114.png",
      'rel' => 'apple-touch-icon',
      'sizes' => "114x114"
  ]);
  ?>
  <!-- <link rel="icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
   -->

  <?= $this->Html->css([
    "landing/bootstrap.min",
    "landing/assets/ionicons/css/ionicons",
    "landing/assets/elegant-icons/style",
    "landing/owl.theme",
    "landing/owl.carousel",
    "landing/nivo-lightbox",
    "landing/nivo_themes/default/default",
    "landing/colors/blue",
    "landing/styles",
    "plugins/font-awesome/css/font-awesome",
    "landing/responsive"
  ])?>
     
</head>

<body>
  <!-- start: page -->
    <?= $this->fetch('content') ?>
  <!-- end: page -->


  <!-- =========================
       SCRIPTS   
  ============================== -->
  <?= $this->Html->script([ "landing/jquery.min" ]) ?>;


  <script>
  /* =================================
     LOADER                     
  =================================== */
  // makes sure the whole site is loaded
  jQuery(window).load(function() {
    "use strict";
          // will first fade out the loading animation
    jQuery(".status").fadeOut();
          // will fade out the whole DIV that covers the website.
    jQuery(".preloader").delay(1000).fadeOut("slow");
  })

  </script>
  <?= $this->Html->script([ 
    "landing/bootstrap.min",
    "landing/retina-1.1.0.min",
    "landing/smoothscroll",
    "landing/jquery.scrollTo.min",
    "landing/jquery.localScroll.min",
    "landing/owl.carousel.min",
    "landing/nivo-lightbox.min",
    "landing/simple-expand.min",
    "landing/jquery.nav",
    "landing/jquery.fitvids",
    "landing/jquery.ajaxchimp.min",
    "landing/custom"
  ]); ?>
<!-- ****************
      After neccessary customization/modification, Please minify JavaScript/jQuery according to http://browserdiet.com/en/ for better performance
     **************** -->
</body>
</html>