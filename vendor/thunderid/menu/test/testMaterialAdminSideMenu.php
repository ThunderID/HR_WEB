<?php 

include __DIR__ . '/../src/Menu/Interface/IMenu.php';
include __DIR__ . '/../src/Menu/Menu.php';
include __DIR__ . '/../src/Menu/MaterialAdminSideMenu.php';

$menu = new \ThunderID\Menu\MaterialAdminSideMenu();
$menu->add('dashboard', 'Dashboard', 'http://yahoo.com', null);
$menu->add('overview', 'Overview', 'http://yahoo.com', 'glyphicon glyphicon-add', 'dashboard');

echo $menu->render();


