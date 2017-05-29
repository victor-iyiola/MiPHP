<?php

/**
 * @author tomiiide
 * @email ayotomiiide@gmail.com
 * @create date 2017-05-27 03:21:57
 * @modify date 2017-05-27 03:21:57
 * @desc [description]
*/

namespace Core;
use \PDO;
use PDOException;

Class Database
{
    private static $dbConnection = null;

    private function __construct(){
      
    }

    public static function connection() {
        if(self::$dbConnection){
            return self::$dbConnection;
        }
        else{
            try{
              $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        self::$dbConnection  = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET,DB_USER,DB_PASS, $options);
        } catch ( PDOException $e ) {
            exit("Error connecting to the database. ".$e);
        }
          return self::$dbConnection;
        }
    }
}