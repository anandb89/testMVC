<?php

    /* Base Controller
    *  Loads the models and views 
    */

    class Controller{
        //Load model
        public function model($model){
            // Require model file
            require_once "../app/models/".$model.".php";

            //Instantiate model
            return new $model();
        }

        // Load View
        // Params - view to load and data to pass dynamically
        public function view($view, $data=[]){
            //check for the view file
            if(file_exists("../app/views/".$view.".php")){
                require_once "../app/views/".$view.".php";
            }
            else{
                //View doesn't exist
                die("View doesn't exist!");
            }
        }

    }