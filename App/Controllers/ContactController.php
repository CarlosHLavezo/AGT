<?php

namespace App\Controllers;

use AGT\Controller\Action;
use AGT\DI\Container;

/**
 * Description of ContactController
 *
 * @author carlos
 */
class ContactController extends Action {

   public function index() {
      $params = $_GET;
      $contact = Container::getModel('Contact');
      $this->view->contact = $contact->find($params);

      $this->render('index');
   }

   public function create() {
      $this->render('create');
   }

   public function store() {
      try {
         $params = $_POST;
         if (count($params) > 0) {
            $contact = Container::getModel('Contact');
            if($contact->create($params)) {
               die(json_encode(['status' => true, 'message' => 'Contato criado com sucesso.']));
            }
         }
         throw new Exception('Não foi possível efetuar o cadastro');
      } catch (Exception $e) {
         die(json_encode(['status' => false, 'message' => $e->getMessage()]));
      }
   }

   public function edit() {
      $contact = Container::getModel('Contact');
      $this->view->contact = $contact->findById($_GET['id']);

      $this->render('edit');
   }

   public function update() {
      try {
         $params = $_POST;
         $contact = Container::getModel('Contact');
         if ($contact->update($params)) {
            die(json_encode(['status' => true, 'message' => 'Contato atualizado com sucesso.']));
         }
         throw new Exception('Não foi possível efetuar a atualização');
      } catch (Exception $e) {
         die(json_encode(['status' => false, 'message' => $e->getMessage()]));
      }
   }

   public function delete() {
      $params = $_POST;
      $contact = Container::getModel('Contact');

      header('Content-Type: text/html;');
      if ($contact->delete($params['id'])) {
         die(json_encode(['status' => true]));
      }
      die(json_encode(['status' => false]));
   }

}
