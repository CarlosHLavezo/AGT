<?php

namespace App\Controllers;

use AGT\Controller\Action;
use AGT\DI\Container; //Dependency Injection

/**
 * Description of IndexController
 *
 * @author carlos
 */
class HomeController extends Action {
   
   public function index() {
      
      $contact = Container::getModel('Contact');
      $this->view->contact = $contact->find([]);
      $this->render('index');
   }
   
}
