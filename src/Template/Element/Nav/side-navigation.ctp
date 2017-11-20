<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <?php 
                        $session = $this->request->session();
                        $user = $session->read('Auth.User');
                        if($user['role_id'] == 1){
                            echo $this->element('MenuItems/admin-menu');
                        }else{
                            echo $this->element('MenuItems/user-menu');
                        }
                    ?>
                </ul>
            </nav>
        </div>

    </div>

</aside>
<!-- end: sidebar -->