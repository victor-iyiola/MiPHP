<?php 

/**
 * @author tomiiide
 * @email ayotomiiide@gmail.com
 * @create date 2017-05-26 10:34:26
 * @modify date 2017-05-26 10:34:26
 * @desc Auto class loader used in the php
*/

spl_autoload_register(function($className){
    $className = preg_replace('/\\\/',DIRECTORY_SEPARATOR,$className);
    $className = $className.'.php';
    $className = APP."/".$className;
    if(file_exists($className))require_once $className;
});
