<?php
	$controller = $this->request->params['controller'];
    $action = $this->request->params['action'];
	$menuItems = [

		'Dashboard' => [
			'active' => ($controller == 'Users' && $action == 'dashboard') ? true : false,
			'url' => ['controller'=> 'Users', 'action' => 'dashboard'],
			'class' => 'fa fa-home',
			'subMenu' => []
		],
		'My Products' => [
			'active' => ($controller == 'Products' && $action == 'index') ? true : false,
			'url' => ['controller'=> 'Products', 'action' => 'index', '?' => ['productType' => 'myProducts']],
			'class' => 'fa fa-usd',
			'subMenu' => []
		],
		'Interested Buyers' => [
			'active' => ($controller == 'InterestedUsers' && $action == 'index') ? true : false,
			'url' => ['controller'=> 'InterestedUsers', 'action' => 'index'],
			'class' => 'fa fa-child',
			'subMenu' => []
		],
		'Liked Products' => [
			'active' => ($controller == 'InterestedUsers' && $action == 'index') ? true : false,
			'url' => ['controller'=> 'InterestedUsers', 'action' => 'index', '?' => ['query' => 'liked']],
			'class' => 'fa fa-thumbs-o-up',
			'subMenu' => []
		]
	];

?>

<?php foreach ($menuItems as $menu => $value): ?>
	<?php if(empty($value['subMenu'])): ?>
		<li <?= $value['active'] ? 'class="nav-active"' : ''?>>
	        <a href="<?= $this->Url->build($value['url']);?>">
	            <i class="<?= $value['class'] ?>" aria-hidden="true"></i>
	        	<span><?= $menu ?></span>
	        </a>
	    </li>
	<?php endif; ?>
	<?php if(!empty($value['subMenu'])): ?>
		<li class="nav-parent <?= $value['active'] ? 'nav-active nav-expanded' : ''?>">
            <a>
                <i class="<?= $value['class'] ?>" aria-hidden="true"></i>
                <span><?= $menu ?></span>
            </a>
            <ul class="nav nav-children">
                <li>
					<?php foreach ($value['subMenu'] as $subMenu => $value2): ?>
	                    <?= $this->Html->link(__($subMenu), $value2) ?>
					<?php endforeach; ?>
                </li>
            </ul>
        </li>
	<?php endif; ?>
<?php endforeach; ?>