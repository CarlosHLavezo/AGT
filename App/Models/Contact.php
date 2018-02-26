<?php

namespace App\Models;

use AGT\Model\Table;

/**
 * Description of Contact
 *
 * @author carlos
 */
class Contact extends Table {

   protected $table = 'contact';

   public function find($params) {
      $query = "SELECT * FROM {$this->table} WHERE 1";
      if (isset($params['name']) && !empty($params['name'])) {
         $query .= " AND name LIKE '%{$params['name']}%'";
      }
      if (isset($params['email']) && !empty($params['email'])) {
         $query .= " AND email LIKE '%{$params['email']}%'";
      }
      if (isset($params['cell_number']) && !empty($params['cell_number'])) {
         $query .= " AND cell_number LIKE '%{$params['cell_number']}%'";
      }
      if (isset($params['phone_number']) && !empty($params['phone_number'])) {
         $query .= " AND phone_number LIKE '%{$params['phone_number']}%'";
      }
      $stmt = $this->db->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll(\PDO::FETCH_CLASS);
   }

   public function create($params) {
      $query = "INSERT INTO contact"
            . " (name, email, cell_number, phone_number) "
            . "VALUES "
            . " (:name, :email, :cell_number, :phone_number)";

      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':name', $params['name']);
      $stmt->bindParam(':email', $params['email']);
      $stmt->bindParam(':cell_number', $params['cell_number']);
      $stmt->bindParam(':phone_number', $params['phone_number']);
      return $stmt->execute();
   }

   public function update($params) {
      if (!is_numeric($params['id'])) {
         throw new Exception('O id do contato é necessário para efetuar a edição.');
      }
      $query = "UPDATE contact"
            . " SET name=:name, email=:email, cell_number=:cell_number, phone_number=:phone_number "
            . "WHERE "
            . " id=:id";

      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':id', $params['id']);
      $stmt->bindParam(':name', $params['name']);
      $stmt->bindParam(':email', $params['email']);
      $stmt->bindParam(':cell_number', $params['cell_number']);
      $stmt->bindParam(':phone_number', $params['phone_number']);
      return $stmt->execute();
   }

   public function delete($id) {
      $query = "DELETE FROM contact WHERE id=:id";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      return $stmt->rowCount();
   }

}
