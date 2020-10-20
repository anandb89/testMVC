<?php
    /*
    * App Core Class
    * Creates URL & loads Core Controller
    * URL FORMAT - /controller/method/params
    */

    class Core {
        //Default controller - if none is specified
        protected $currentController = "Pages";
        protected $currentMethod = "index";
        protected $params = [];

        public function __construct(){
            //print_r($this->getURL());
            $url = $this->getURL();

            //Look in controllers for first value
            if(file_exists("../app/controllers/".ucwords($url[0]).".php")){
                //If exists, set as current controller
                $this->currentController = ucwords($url[0]);
                //Unset 0 Index
                unset($url[0]);
            }

            //Require the controller
            require_once "../app/controllers/". $this->currentController .".php";

            //Instantiate the controller class
            $this->currentController = new $this->currentController;

            # METHOD
            // Check for 2nd part of URL
            if(isset($url[1])){
                //check to see if the method exists in the controller
                if(method_exists($this->currentController,$url[1])){
                    $this->currentMethod = $url[1];
                    
                    //Unset 1 Index
                    unset($url[1]);
                }

            }

            # PARAMETERS
            // Get Params - if params exist, they will be added to the array
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params 
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        
        }

        public function getURL(){
            if(isset($_GET["url"])){
                $url=rtrim($_GET["url"],"/"); //Trim Trailing slashes
                $url=filter_var($url, FILTER_SANITIZE_URL); //Sanitize input
                $url=explode("/", $url);
                return $url; //Returns as array

            }
        }
    }
