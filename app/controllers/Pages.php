<?php

class Pages extends Controller {
    public function __construct(){
        //echo "Pages loaded";
    }

    public function index(){

        //Data to be passed to the view
        $data = [
            "title" => "Welcome",
        ];


        $this->view("pages/index", $data);
        
    }

    public function about(){
         //Data to be passed to the view
         $data = [
            "title" => "About Us"
        ];

        $this->view("pages/about", $data);
    }
}