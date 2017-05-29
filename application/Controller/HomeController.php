<?php
/**
 * Created by PhpStorm.
 * User: tomiiide
 * Date: 5/26/2017
 * Time: 11:46 AM
 */

namespace Controller;


use Core\Controller;

class HomeController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Home";
  }

  public function index()
  {
    $this->view->name = "Tomiiide";
    $this->view->render("home/index");
  }

}