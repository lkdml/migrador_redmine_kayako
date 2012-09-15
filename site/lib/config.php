<?php

include('./db.php');
include	("./db_redmine.php");
include("./db_Kayako.php");

/*
 * Datos de configuración de la base de datos de REDMINE 
 */
define("DB_RHOST", "localhost");
define("DB_RUSER", "root");
define("DB_RPASS", "mysql");
define("DB_RBASE", "redmine");
/*
 * Datos de configuración de la base de datos de KAYAKO 
 */
define("DB_KHOST", "localhost");
define("DB_KUSER", "root");
define("DB_KPASS", "mysql");
define("DB_KBASE", "kayako");


$issues = new dbRedmine();
$test = $issues->traerListadoIssues();
print_r($test);
echo "1".$test."2";
var_dump($test); 
