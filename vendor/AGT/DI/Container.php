<?php

namespace AGT\DI;

use \App\Connection;

/**
 * Description of Container
 *
 * @author carlos
 */
class Container {
   
   public static function getModel($model) {
      $class = "\\App\\Models\\" . ucfirst($model);
      
      return new $class(Connection::getDb());
   }
}
