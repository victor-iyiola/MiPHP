<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 8:08 PM
 */

namespace Controller;


use Core\Controller;
use Model\Admin;
use Model\User;

class RegisterController extends Controller
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
      $user = new User($_POST);
      $user->register();
    }
    $this->view->render("user/register");
  }

  public function admin()
  {
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
      $admin = new Admin($_POST);
      $admin->register();
    }
    $this->view->render("admin/register");
  }
}