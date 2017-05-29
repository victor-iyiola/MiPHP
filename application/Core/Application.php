<?php

/**
 * @author tomiiide
 * @email ayotomiiide@gmail.com
 * @create date 2017-05-26 10:44:34
 * @modify date 2017-05-26 10:45:04
 * @desc Class of the core App
*/

namespace Core;
use Controller\HomeController;

class Application{

    private $controller  = null;
    private $action = null;
    private $parameters  = null;
    public $db = null;
    
    public function __construct(){
        $this->cleanURL();
        $this->callController();
    }

    public function cleanURL(){

        if(isset($_GET['url'])) {
            //clean, filter, split URL
            $url = $_GET['url'];
            $url = trim($url , '/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);


            //assign the URL content to appropriate properties
            $this->controller = isset($url[0]) ? $url[0] : null;
            $this->method = isset($url[1]) ? $url[1] : null;

            //Remove contoller and action from the split URL so it remains the URL parameters
            unset($url[0],$url[1]);

            //Reset array keys to start from 0
            $this->parameters = array_values($url);

        }
    }

    public function callController(){
 //check controller, if no controller is given then load homepage
        if(!$this->controller){
            $page = new HomeController();
            $page->index();
        }
        // check if controller exists ? load controller : redirect to 404 page;
        elseif(file_exists(APP.'Controller/'.ucfirst($this->controller).'Controller.php')){
            $controller = "\\Controller\\".ucfirst($this->controller)."Controller";
            $this->controller = new $controller();

            //check if method exist in the controller  ? call method : call index() method
            if(method_exists($this->controller, $this->method)){
                //check if there are parameters and pass it to the method
                if(!empty($this->parameters)){
                    echo("");
                    call_user_func_array(array($this->controller,$this->method),$this->parameters);
                }
                // if there are no parameters just call the method
                else {
                    $this->controller->{$this->method}();
                }
            } 
            else{
                if(strlen($this->method) == 0){
                    $this->controller->index();
                }
                else{
                    header("location:".URL."error");
                }
            }
        }
        else{
            header("location:".URL."error");
        }
    }
}

