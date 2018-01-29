<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>
<?php $host = $this->Url->build('/', true) ?>
<!-- =========================
     HEADER   
============================== -->
<header id="home" style="background:url(<?= $host.'img/landing/topbg.jpg'?>) no-repeat top fixed;">

<!-- COLOR OVER IMAGE -->
<div class="color-overlay">
  
  <div class="navigation-header">
    
    <!-- STICKY NAVIGATION -->
    <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation">
      <div class="container">
        <div class="navbar-header">
          
          <!-- LOGO ON STICKY NAV BAR -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#landx-navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png', ['alt'=>'Logo',"height" => 40, 'style' => "max-height: 100px;"])?></a>
          
        </div>
        

        <!-- NAVIGATION LINKS -->
        <div class="navbar-collapse collapse" id="landx-navigation">
          <ul class="nav navbar-nav navbar-right main-navigation">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">Our Story</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'login']) ?>">Login</a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'signUp']) ?>">Sign Up</a></li>
          </ul>
        </div>
        
      </div>
      <!-- /END CONTAINER -->
      
    </div>
    
    <!-- /END STICKY NAVIGATION -->
    
    <!-- ONLY LOGO ON HEADER -->
    <div class="navbar non-sticky">
      
      <div class="container">
        
        <div class="navbar-header">
          <?= $this->Html->image('logo.png', ['alt'=>'Logo',"height" => 70, 'style' => "max-height: 100px;"])?>
        </div>
      </div>
      <!-- /END CONTAINER -->
      
    </div>
    <!-- /END ONLY LOGO ON HEADER -->
    
  </div>
  
  <!-- HEADING, FEATURES AND REGISTRATION FORM CONTAINER -->
  <div class="container">
    <div class="row">
      
      <!-- LEFT - HEADING AND TEXTS -->
      <div class="col-md-7 col-sm-7 intro-section">
        
        <h1 class="intro text-left">
        <strong>Welcome</strong> to <strong>SellStart</strong>
        </h1>
        
        <ul class="feature-list-1">
          
          <!-- FEATURE ROW -->
          <li>
          <div class="icon-container pull-left">
            <span class="icon_check"></span>
          </div>
          <p class="text-left">
            Trying to make most out of your buck while starting your new business or winding up the old one, you have come to the right place!
          </p>
          </li>
          
          <!-- FEATURE ROW -->
          <li>
          <div class="icon-container pull-left">
            <span class="icon_check"></span>
          </div>
          <p class="text-left">
            Tired of the middle men and paying commissions? Again you are at the right place!
          </p>
          </li>
          
          <!-- FEATURE ROW -->
          <li>
          <div class="icon-container pull-left">
            <span class="icon_check"></span>
          </div>
          <p class="text-left">
           <strong>sellstart.in</strong> your friend in need, is a platform for buying and selling inventories at the click of a button.
          </p>
          </li>
        </ul>
        
      </div>
      
      <!-- RIGHT - REGISTRATION FORM -->
      
      <div class="col-md-5 col-sm-5">
        
        <div class="vertical-registration-form">
          <div class="colored-line">
          </div>
          <h3>Login</h3>

          <form class="registration-form" method = "post" action=" <?=$this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>" id="register" role="form">
            <input class="form-control input-box" id="usernamer" type="text" name="username" placeholder="Username">
            <input class="form-control input-box" id="password" type="password" name="password" placeholder="Password">
            <button class="btn standard-button btn-sm" type="submit" id="submit" name="submit">Login</button>
          </form>

          <span class="mt-lg mb-lg line-thru text-center text-uppercase">
              <span><hr></span>
          </span>

          <div class="mb-xs text-center">
              <?php echo $this->Form->postLink(
                  'Connect with '.$this->Html->tag('i', '', array('class' => 'fa fa-facebook')),
                  ['controller' => 'Users', 'action' => 'socialLogin', '?' => ['provider' => 'Facebook']],
                  ['class' => ['btn', 'btn-primary', 'mb-md', 'ml-xs', 'mr-xs'], 'escape'=>false]
              ); ?>
              <?php echo $this->Form->postLink(
                  'Connect with '.$this->Html->tag('i', '', array('class' => 'fa fa-google')),
                  ['controller' => 'Users', 'action' => 'socialLogin', '?' => ['provider' => 'Google']],
                  ['class' => ['btn', 'btn-danger', 'mb-md', 'ml-xs', 'mr-xs'], 'escape'=>false]
              ); ?>
              <!-- <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
              <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a> -->
          </div>
            <p class="text-center text-default">Don't have an account yet? 
              <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'signUp']) ?>">
                Sign Up!
              </a>  
              <!-- <a href="pages-signup.html">Sign Up!</a> -->
            </p>
        </div>
      </div>
      <!-- /END - REGISTRATION FORM -->
    </div>
    
  </div>
  <!-- /END HEADING, FEATURES AND REGISTRATION FORM CONTAINER -->
  
</div>

</header>


<!-- =========================
     SECTION 1   
============================== -->
<section class="section1" id="about">

<div class="container">
  <div class="row">
    
    <div class="col-md-12">
      
      <!-- DETAILS WITH LIST -->
      <div class="brief text-left">
        
        <!-- HEADING -->
        <h2>Our Story</h2>
        <div class="colored-line pull-left">
        </div>
        
        <p>
          Raskhit Arora is an entrepreneur and an investor. Before starting out with sellstart, he tried his hands at various ventures and consortiums, and it was only his last one that pushed him to lay the foundation stone for <b>sellstart.in</b>
          <br><br>
          While wrapping up his hospitality firm, it occurred to him that while it was easy to conglomerate the inventory, it was quite difficult to vend them off profitably. And a bit of research helped him realize, that there is infact a niche market for this. Lo and behold, the foundation was laid. 
          <br><br>
          <b>sellstart.in</b> provides a platform for buying and selling inventories, thus eliminating the middleman and saves the time for traders at both ends. You want to buy a set of furniture catering to 150 people? We cover you. You want to sell a set of crockery? We cover you. 
          <br><br>
          <b>sellstart.in</b> is here to help you make most out of your buck and to help you get the best price for your new business or wind up the old one.
        </p>
      </div>
    </div> <!-- /END DETAILS WITH LIST -->
    
  </div> <!-- END ROW -->
  
</div> <!-- END CONTAINER -->

</section>

<!-- =========================
     SECTION 8 - CTA  
============================== -->
<section class="cta-section" id="contact" style="background:url(<?= $host.'img/map-image.jpg'?>) no-repeat center fixed">
<div class="color-overlay">
  
  <div class="container">
    
    <h3>Contact Us</h3>
    <h4>Feel free to contact us anytime. We are at your service.</h4>
    <h5 class="text-muted">
      <p>4205 , Rani Bagh , Pitampura, New delhi -110034</p>
      <p>info@sellstart.in</p>
    </h5>
    <!-- /END SUBSCRIPTION FORM -->
    
  </div>  <!-- /END CONTAINER -->
</div>  <!-- /END COLOR OVERLAY -->

</section>

<!-- =========================
     SECTION 10 - FOOTER 
============================== -->
<footer class="bgcolor-2">
<div class="container">
  
  <!-- <div class="footer-logo">
    <img src="images/logo-dark.png" alt="">
  </div> -->
  
  <?= $this->element('footer') ?>
  
</div>
</footer>