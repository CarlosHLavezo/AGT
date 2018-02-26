<?php

namespace App;

use AGT\Init\Bootstrap;

class Route extends Bootstrap {

   protected function initRoutes() {
      $routes['home'] = [
         'route' => '/', 'controller' => 'HomeController', 'action' => 'index'
      ];
      $routes['contact/index'] = [
         'route' => '/contact/index', 'controller' => 'ContactController', 'action' => 'index'
      ];
      $routes['contact/create'] = [
         'route' => '/contact/create', 'controller' => 'ContactController', 'action' => 'create'
      ];
      $routes['contact/store'] = [
         'route' => '/contact/store', 'controller' => 'ContactController', 'action' => 'store'
      ];
      $routes['contact/edit'] = [
         'route' => '/contact/edit', 'controller' => 'ContactController', 'action' => 'edit'
      ];
      $routes['contact/update'] = [
         'route' => '/contact/update', 'controller' => 'ContactController', 'action' => 'update'
      ];
      $routes['contact/delete'] = [
         'route' => '/contact/delete', 'controller' => 'ContactController', 'action' => 'delete'
      ];

      $this->setRoutes($routes);
   }

}
