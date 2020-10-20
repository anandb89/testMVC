<?php
//Load Config
require_once "config/config.php";

//Autoload Core Libraries - everything from libraries folder
spl_autoload_register(function($className){
    require_once "libraries/" . $className . ".php";
});