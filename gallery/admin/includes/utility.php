<?php
spl_autoload_register('myAutoloader');
function myAutoloader($class){
    $class = strtolower($class);
    $the_path = 'includes/'.  $class . '.php';
    if(file_exists($the_path)){
        require_once($the_path);
    }else{
        die("the file name {$class}.php was not find");
    }
}

function redirect($location){
        header('Location: '. $location);
}
