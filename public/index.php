<?php

/**
 * @author tomiiide
 * @email ayotomiiide@gmail.com
 * @create date 2017-05-25 05:53:18
 * @modify date 2017-05-25 05:53:18
 * @desc index.php. Entry point of the app
*/

define('ROOT',dirname(__DIR__).DIRECTORY_SEPARATOR);
define('APP',ROOT. 'application'.DIRECTORY_SEPARATOR);
define('VIEWS',APP.'views'.DIRECTORY_SEPARATOR);


require APP. 'config/config.php';
require ROOT. '/autoloader.php';
require APP . 'Libs/helpers.php';
use Core\Application;

$app = new Application();






