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
		'Products' => [
			'active' => ($controller == 'Products' && $action == 'index') ? true : false,
			'url' => ['controller'=> 'Products', 'action' => 'index'],
			'class' => 'fa fa-usd',
			'subMenu' => []
		],
		'Interested Buyers' => [
			'active' => ($controller == 'InterestedUsers' && $action == 'index') ? true : false,
			'url' => ['controller'=> 'InterestedUsers', 'action' => 'index'],
			'class' => 'fa fa-child',
			'subMenu' => []
		],
		'Issues' => [
			'active' => ($controller == 'Issues' && $action == 'index') ? true : false,
			'url' => ['controller'=> 'Issues', 'action' => 'index'],
			'class' => 'fa fa-exclamation-circle',
			'subMenu' => []
		],
		'Manage Businesses' => [
			'active' => in_array($controller, ['Businesses', 'ProductCategories', 'BusinessProductCategories']) ? true : false,
			'url' => '#',
			'class' => 'fa fa-align-left',
			'subMenu' => [
				'Businesses' => ['controller' => 'Businesses', 'action' => 'index'],
				'Product Categories' => ['controller' => 'ProductCategories', 'action' => 'index'],
				// 'Business Product Categories' => ['controller' => 'BusinessProductCategories', 'action' => 'index']
			]
		],
		'User Management' => [
			'active' => in_array($controller, ['Users', 'Roles']) && $action != 'dashboard' ? true : false,
			'url' => '#',
			'class' => 'fa fa-users',
			'subMenu' => [
				'Users' => ['controller' => 'users', 'action' => 'index'],
				'Roles' => ['controller' => 'roles', 'action' => 'index'],
			]
		],

		
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