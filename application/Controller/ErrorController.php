<?php
/**
 * Created by PhpStorm.
 * User: tomiiide
 * Date: 5/26/2017
 * Time: 12:08 PM
 */

namespace Controller;


use Core\Controller;

class ErrorController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index($type=null)
  {
    switch ( $type ) {
      case 404:
        $this->view->render('error/404');
        break;
      case 500:
        $this->view->render('error/500');
        break;
      default:
        $this->view->render('error/index');
    }
  }

}