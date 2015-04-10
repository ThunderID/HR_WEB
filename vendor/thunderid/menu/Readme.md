# Installation

# Usage

## Adding new Menu Item

*Bootstrap 3*
```php
$menu = new \thunderid\menu\Bootstrap3Menu();
$menu->add('dashboard', 'Dashboard', 'http://yahoo.com', null, '__left_nav');
$menu->add('overview', 'Overview', 'http://yahoo.com', 'glyphicon glyphicon-add', 'dashboard');
```

*Material Admin*
```php
$menu = new \thunderid\menu\MaterialAdminSideMenu();
$menu->add('dashboard', 'Dashboard', 'http://yahoo.com', null);
$menu->add('overview', 'Overview', 'http://yahoo.com', 'glyphicon glyphicon-add', 'dashboard');
```

