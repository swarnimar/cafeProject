<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Sell Start';
?>
<!DOCTYPE html>
<html class="fixed">
<head>
    <?= $this->Html->charset() ?>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
    <!-- <?= $this->Html->css(['bootstrap.min']) ?> -->
    <!-- theme stylesheets -->
        <!-- Web Fonts  -->
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css"> -->

        <!-- Vendor CSS -->
        <?= $this->Html->css([
                                "plugins/bootstrap/css/bootstrap.css",    
                                "plugins/font-awesome/css/font-awesome",
                                "plugins/magnific-popup/magnific-popup",
                                "plugins/bootstrap-datepicker/css/datepicker3"
        ]) ?>
        
        <!-- Theme CSS -->
        <?= $this->Html->css([
                                "theme",
                                "skins/default",
                                "theme-custom"
        ]) ?>

        <!-- Head Libs -->
        <?= $this->Html->script(["plugins/modernizr/modernizr"])?>

</head>
<body>
    <section class="body">

        <?= $this->element('Header/header') ?>
        <?= $this->element('Nav/side-navigation') ?> 
        <div class="inner-wrapper">
            

            <section role="main" class="content-body">
                <?= $this->element('Header/title') ?>
                <div class="text-center">
                    <?= $this->Flash->render() ?>
                </div>
                <!-- start: page -->
                <?= $this->fetch('content') ?>
                <!-- end: page -->
            </section>
        </div>
        
    </section>
</body>
<!-- theme scripts -->
    

    <!-- Vendor -->
        <?= $this->Html->script([
                            "plugins/jquery/jquery",
                            "plugins/bootstrap/js/bootstrap",
                            "plugins/jquery-browser-mobile/jquery.browser.mobile",
                            "plugins/nanoscroller/nanoscroller",
                            "plugins/bootstrap-datepicker/js/bootstrap-datepicker",
                            "plugins/magnific-popup/magnific-popup",
                            "plugins/jquery-placeholder/jquery.placeholder"
                        ]) 
        ?>
    <!-- Theme Base, Components and Settings -->
        <?= $this->Html->script([
                            "theme",
                            "theme.custom",
                            "theme.init"
                        ]) 
        ?>

<?= $this->Html->script([
                            // 'jquery-3.2.1.min', 
                            // 'bootstrap.min',
                            'user-management',
                            '/js/plugins/validator/validator.js' 
                        ]) 
?>
</html>
