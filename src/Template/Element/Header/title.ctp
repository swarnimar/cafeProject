<?php 

    $controller = $this->request->params['controller'];
    $action = $this->request->params['action'];
    $humanizedAction = \Cake\Utility\Inflector::humanize(\Cake\Utility\Inflector::underscore($action));
    $humanizedController = \Cake\Utility\Inflector::humanize(\Cake\Utility\Inflector::underscore($controller)); 
?>
<header class="page-header">
    <h2><?= $humanizedController?><?=($action != 'index' ? ' - '.$humanizedAction : '')?></h2>

    <div class="right-wrapper pull-right mr-sm">
        <ol class="breadcrumbs">
            <li>
                <?= '<a href="'.$this->Url->build(['controller' => 'users', 'action' => 'dashboard']).'"><i class="fa fa-home"></i></a>' ?>
            </li>
            <?php if($action != 'dashboard'): ?>
                <li>
                    <?= $this->Html->link(__($humanizedController), ['controller' => $controller, 'action' => 'index']) ?>
                    <!-- <a href="portfolio3.html">Pages / </a> -->
                </li>
                <?php if($action != 'index'): ?>
                    <li>
                        <span><?= $humanizedAction ?></span>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ol>
        <span class="separator"></span>
    </div>
</header>