<?php
// Core App class
namespace App;

use Pages;

class Core
{
    public $currentController = 'Pages';
    public $currentMethod = 'signup';
    public $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        $adr =  dirname(dirname((__FILE__))).'/controllers/';
       
        if ($url) {
            //Look in controllers for first value, ucwords will capitilize first letter
            if (file_exists($adr.ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords(($url[0]));
                 unset($url[0]);
            };
        }
        // require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        
        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //get parameters
            $this->params = $url ? array_values($url) : array();
       /*  die(json_encode($this->params)); */
        // call a callback with array of parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            //filtering string and number
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // breaking into array
            $url = explode('/', $url);
            return $url;
        }
    }
}
