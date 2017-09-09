<!-- #header start -->
<header id="header" class="clearfix">
    <section id="logo">
        <a href="#">
            <?= $this->Html->image('logo.png', ['alt'=>'Logo'])?>
        </a>
    </section>

    <section id="nav-container">
        <nav id="nav">
            <ul>
                <?= $this->element('MenuItems/admin-menu') ?> 
            </ul>
        </nav><!-- #nav end -->                  
    </section><!-- #nav-container end -->

    <!-- #dl-menu.dl-menuwrapper start Responsive Menu -->
    <div id="dl-menu" class='dl-menuwrapper'>
        <button class="dl-trigger">Open Menu</button>
        <ul class="dl-menu"> 
                <?= $this->element('MenuItems/admin-menu') ?>
        </ul><!-- .dl-menu end -->
    </div><!-- #dl-menu.dl-menuwrapper end -->
</header><!-- .header end -->