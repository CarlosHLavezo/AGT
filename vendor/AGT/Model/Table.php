<?php

namespace AGT\Model;

/**
 * Description of Table
 *
 * @author carlos
 */
abstract class Table {
   protected $db;
   protected $table;


   public function __construct(\PDO $db) {
      $this->db = $db;
   }
   
   public function fetchAll() {
      $query = "SELECT * FROM {$this->table}";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(\PDO::FETCH_CLASS);
   }
   
   public function findById($id) {
      $query = "SELECT * FROM {$this->table} WHERE id=:id";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      
      return $stmt->fetch(\PDO::FETCH_ASSOC);
   } 
}
