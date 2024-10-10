<?php 
session_start();


function myAuto($class) {
    include "classes/" . $class . ".class.php";
}
spl_autoload_register("myAuto");

/* DB-settingg on Localhost */
define("DBHOST", "localhost");
define("DBUSER", "phpeditor");
define("DBPASS", "password");
define("DBDATABASE", "phpeditor");