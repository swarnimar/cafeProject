<?php 
    $session = $this->request->session();
    $user = $session->read('Auth.User');
    $humanizedName = \Cake\Utility\Inflector::humanize($user['first_name']);
?>

<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="../" class="logo">
            <?= $this->Html->image('logo.png', ['alt'=>'Logo',  "height"=>"35"])?>
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="header-right">
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <?= $this->Html->image('logged-user.jpg', ['alt'=>'Logo', "class"=>"img-circle"])?>
                </figure>
                <div class="profile-info" data-lock-name="<?= $humanizedName ?>" data-lock-email="<?= $user['email']?>">
                    <span class="name"><?= $humanizedName ?></span>
                    <span class="role"><?= $user['role']['label']?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <?= '<a href="'.$this->Url->build(['controller' => 'users', 'action' => 'edit', $user['id']]).'" role="menuitem" tabindex="-1"><i class="fa fa-user"></i> My Profile </a>' ?>
                    </li>
                    <li>
                        <?= '<a href="'.$this->Url->build(['controller' => 'users', 'action' => 'logout']).'" role="menuitem" tabindex="-1"><i class="fa fa-power-off"></i> Logout </a>' ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->