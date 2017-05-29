<?php 

/**
 * @author tomiiide
 * @email ayotomiiide@gmail.com
 * @create date 2017-05-26 07:55:30
 * @modify date 2017-05-26 07:55:30
 * @desc User model
*/


namespace Model;
use \Core\Database;
use Libs\Session;

Class User
{
  private $userTable;
  public $id;
  public $fullName;
  public $email;
  public $password;

  public function __construct($data){
    $this->userTable = "users";
    if ( !empty($data) )
      foreach ( $data as $key => $value )
        if ( !empty($value) )
          $this->{$key} = $value;
  }

  public function login()
  {
    if ( $this->userExists() ) {
      Session::set("loggedIn", true);
      return true;
    }
    return false;
  }

  public function userExists()
  {
    $query = Database::connection()->prepare("SELECT id, password FROM " . $this->userTableName . " WHERE email=:email");
    $query->execute(['email' => $this->email]);
    $this->id = $query->fetch(\PDO::FETCH_ASSOC)['id'];
    $passHash = password_hash($query->fetch(\PDO::FETCH_ASSOC)['password'], PASSWORD_BCRYPT);
    return password_verify($this->password, $passHash);
  }

  public function register()
  {
      $query = Database::connection()->prepare("INSERT INTO " . $this->userTable . " VALUES(0,:fullname, :email, :password)");
      $query->execute(array(":fullname" => $this->fullName,":email" => $this->email,":password" => password_hash
      ($this->password, PASSWORD_BCRYPT)));
      $this->id = Database::connection()->lastInsertId();
      return $this;
  }

}