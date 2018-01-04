<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sell Start</title>

    <!-- Bootstrap core CSS -->
    <?= $this->Html->css([
                            "landing/bootstrap.min",    
                            "landing/font-awesome.min"
                        ]) 
    ?>

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <!-- <link href="css/agency.min.css" rel="stylesheet"> -->
    <?= $this->Html->css(["landing/agency.min"]) ?>

  </head>

  <body id="page-top">

    <!-- start: page -->
      <?= $this->fetch('content') ?>
    <!-- end: page -->
    
    <!-- Scripts -->
    
    <!-- Bootstrap core JavaScript -->
    <?= $this->Html->script([
                              "landing/jquery.min",
                              "landing/bootstrap.bundle.min"
                            ]) 
    ?>


    <!-- Plugin JavaScript -->
    <?= $this->Html->script([
                              "landing/jquery.easing.min",
                              "landing/jqBootstrapValidation",
                              "landing/contact_me",
                              "landing/agency.min.js" // Custom scripts for this template
                            ]) 
    ?>
  </body>

</html>