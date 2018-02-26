<?php

namespace App;

/**
 * Description of Connection
 *
 * @author carlos
 */
class Connection {
   public static function getDb() {
      return new \PDO('mysql:host=localhost;dbname=agt', 'agt', 'Asdf123456');
//      return new \PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
   }
}
