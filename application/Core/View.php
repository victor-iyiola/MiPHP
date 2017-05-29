<?php
/**
 * Created by PhpStorm.
 * User: tomiiide
 * Date: 5/26/2017
 * Time: 3:32 PM
 */

namespace Core;

/**
 * @property string name
 * @property string title
 * @property string status
 */
class View
{
  public function __construct()
  {
    $this->title = "";
    // you can get loggedIn status to be used in your layout file
    // for dynamic display of login and logout links
    // $this->loggedIn =  Session::get(loggedIn);
  }

  public function render($view)
  {
        $viewFile = VIEWS . $view . '.php';
        if ( file_exists($viewFile) )
            require_once VIEWS.'_layout.php';
    }
}