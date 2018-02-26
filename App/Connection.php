<?php

namespace App;

/**
 * Description of Connection
 *
 * @author carlos
 */
class Connection {
   public static function getDb() {
      return new \PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
   }
}
