<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 8:05 PM
 */

namespace Controller;


use Core\Controller;
use Model\LoginModel;

class LoginController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->user();
  }

  public function user()
  {
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
      // check empty filed
      if ( !empty($_POST['email']) && !empty($_POST['password']) ) {
        $loginModel = new LoginModel;
        if ( $loginModel->userLogin($_POST) ) {
          $this->view->status = "Logged in... Redirect to " . URL . "home";
//          header("Location: " . URL . "home");
        }
        else
          $this->view->status = "Incorrect credentials, please try again.";
      } else $this->view->status = "Please fill in all credentials";
    }
    $this->view->render("user/login");
  }

  public function admin()
  {
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
      if ( !empty($_POST['email']) && !empty($_POST['password']) ) {
        $loginModel = new LoginModel;
        if ( $loginModel->adminLogin($_POST) ) {
          $this->view->status = "Logged in... Redirect to " . URL . "home";
//          header("Location: " . URL . "home");
        } else
          $this->view->status = "Incorrect credentials, please try again.";
      } else $this->view->status = "Please fill in all credentials";
    }
    $this->view->render("admin/login");
  }

}