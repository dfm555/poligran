<?php
//DATABASE CONFIGURATIONS (change to the correct values)
define("DB_SERVER", '127.0.0.1');
define("DB_USERNAME", 'root');
define("DB_PASS", 'root'); 
define("DB_DBASE", 'db_calazans');

//-----------DO NOT CHANGE ------------------------

//SERVER CONFIGURATIONS (It is not recommended change this values)
define('HOST','http://'.$_SERVER['HTTP_HOST']);
define("BASE_PATH",'localhost');
define('BASE_RESOURCES',HOST.'/resources/');
define("BASE_MODELS",'/models');
define("BASE_CONTROLLERS",'/controllers');
define("BASE_VIEWS",'/views');
define("BASE_CLASSES",'/clases');
define("BASE_CONFIG",'/config');


//load the folders
$folders = [BASE_CLASSES , BASE_MODELS, BASE_CONTROLLERS];
foreach ($folders as $folder) {   
    
    foreach (glob(".{$folder}/*.php") as $file) {
        require  $file;
    }    
}


 