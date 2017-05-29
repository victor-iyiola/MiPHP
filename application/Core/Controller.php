<?php

/**
 * @author tomiiide
 * @email ayotomiiide@gmail.com
 * @create date 2017-05-26 11:13:53
 * @modify date 2017-05-26 11:13:53
 * @desc Abstract Controller Class
*/
namespace Core;

 abstract Class Controller{

   public function __construct()
   {
     $this->view = new View;
   }

   abstract public function index();

}
