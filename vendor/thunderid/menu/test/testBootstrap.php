<?php 

include __DIR__ . '/../src/Menu/Interface/IMenu.php';
include __DIR__ . '/../src/Menu/Menu.php';
include __DIR__ . '/../src/Menu/Bootstrap3Menu.php';

$menu = new ThunderID\Menu\Bootstrap3Menu();
$menu->add('dashboard', 'Dashboard', 'http://yahoo.com', null, '__left_nav');
$menu->add('overview', 'Overview', 'http://yahoo.com', 'glyphicon glyphicon-add', 'dashboard');

echo $menu->render();


