<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 4:05 PM
 */


namespace Model;
use \Core\Database;
use Libs\Session;

Class Admin
{
  private $adminTable;
  public $id;
  public $fullName;
  public $email;
  public $password;

  public function __construct($data){
    $this->adminTable = "admin";
    if ( !empty($data) )
      foreach ( $data as $key => $value )
        if ( !empty($value) )
          $this->{$key} = $value;
  }

  public function login()
  {
    if ( $this->adminExists() ) {
      Session::set("loggedIn", true);
      return true;
    }
    return false;
  }

  public function adminExists()
  {
    $query = Database::connection()->prepare("SELECT id, password FROM " . $this->adminTable . " WHERE email=:email");
    $query->execute(['email' => $this->email]);
    $this->id = $query->fetch(\PDO::FETCH_ASSOC)['id'];
    $passHash = password_hash($query->fetch(\PDO::FETCH_ASSOC)['password'], PASSWORD_BCRYPT);
    return password_verify($this->password, $passHash);
  }

  public function register()
  {
    $query = Database::connection()->prepare("INSERT INTO " . $this->adminTable . " VALUES(0,:fullname, :email, :password)");
    $query->execute(array(":fullname" => $this->fullName,":email" => $this->email,":password" => password_hash
    ($this->password, PASSWORD_BCRYPT)));
    $this->id = Database::connection()->lastInsertId();
    return $this;
  }

}