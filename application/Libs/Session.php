<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 9:46 PM
 */

namespace Libs;



class Session
{

    public static function init()
    { session_start();  }

    public static function set($key, $value)
    { $_SESSION[$key] = $value; }

    public static function get($key)
    {
      return isset( $_SESSION[$key] ) ? $_SESSION[$key] : false;
    }

    public static function destroy()
    {
      session_destroy();
      $_SESSION = [];
    }

}