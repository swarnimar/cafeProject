<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      www.sellstart.in
    </a>
    <!-- <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'dashboard']) ?>" class="logo">
            <?= $this->Html->image('logo.png', ['alt'=>'Logo',  "height"=>"50", 'class' => ['navbar-brand', 'js-scroll-trigger']])?>
        </a> -->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">Our Story</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'login']) ?>">
            Login
          </a> 
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php $host = $this->Url->build('/', true) ?>
<!-- Header -->
<header class="masthead" style="background-image:url(<?= $host.'img/banner.png'?>);">
  <div class="container">
    <div class="intro-text">
      <!-- <div class="intro-lead-in">Welcome To Our Studio!</div>
      <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
      <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a> -->
    </div>
  </div>
</header>

<!-- About -->
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Our Story</h2>
        <!-- <h3 class="section-subheading text-muted">This is how we started.</h3> -->
        <i>
          <p>
            Raskhit Arora is an entrepreneur and an investor. Before starting out with sellstart, he tried his hands at various ventures and consortiums, and it was only his last one that pushed him to lay the foundation stone for <b>sellstart.in</b>
          </p>
          <p>
            While wrapping up his hospitality firm, it occurred to him that while it was easy to conglomerate the inventory, it was quite difficult to vend them off profitably. And a bit of research helped him realize, that there is infact a niche market for this. Lo and behold, the foundation was laid. 
          </p>
          <p>
            <b>sellstart.in</b> provides a platform for buying and selling inventories, thus eliminating the middleman and saves the time for traders at both ends. You want to buy a set of furniture catering to 150 people? We cover you. You want to sell a set of crockery? We cover you. 
          </p>
          <p>
            <b>sellstart.in</b> is here to help you make most out of your buck and to help you get the best price for your new business or wind up the old one.
          </p>
        </i>
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact" style="background-image:url(<?= $host.'img/map-image.png'?>)">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Contact Us</h2>
        <div class="text-muted">
          <p>Feel free to contact us anytime. We are at your service.</p>
          <p>4205 , Rani Bagh , Pitampura, New delhi -110034</p>
          <p>info@sellstart.in</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <?= $this->element('footer') ?>
        </div>
      </div>
    </div>
  </div>
</footer>
