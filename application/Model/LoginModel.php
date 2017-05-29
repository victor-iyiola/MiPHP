<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 8:34 PM
 */

namespace Model;


use Core\Model;

class LoginModel extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function userLogin( $credentials )
  {
    $user = new User($credentials);
    return $user->login();
  }

  public function adminLogin( $credentials )
  {
    $admin = new Admin($credentials);
    return $admin->login();
  }

}