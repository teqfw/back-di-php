# back-di-php
Dependency Injection in TeqFW

Based on `league/container` 3.x.

Create classes based on TeqFW conventions:
* \Vendor\Path\To\Module\Api\Path\To\Class => \Vendor\Path\To\Module\Path\To\Class


## Usage 

    $container = \TeqFw\Lib\Di\Api\ContainerFactory::getContainer();
    $repoUser = $container->get(\Vendor\Path\To\Module\Api\Db\Repo\User::class)