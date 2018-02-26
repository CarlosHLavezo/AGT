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
      $this->render('index');
   }
   
}
