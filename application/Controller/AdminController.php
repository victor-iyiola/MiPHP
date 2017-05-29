<?php
/**
 * Created by PhpStorm.
 * User: tomiiide
 * Date: 5/26/2017
 * Time: 12:10 PM
 */

namespace Controller;

use Core\Controller;

class AdminController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->view->render("admin/index");
  }

}