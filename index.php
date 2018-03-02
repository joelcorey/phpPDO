<?php
 
require 'vendor/autoload.php';
 
use \App\SQLiteConnection;
use \App\SQLiteCreateTable;
use \App\SQLiteInsert;

$pdo = (new SQLiteConnection())->connect();
$tables = new SQLiteCreateTable($pdo);
$sqlite = new SQLiteInsert($pdo);

$tables->createTables();
// get the table list
//$tables = $sqlite->getTableList();

echo "Please enter a name to add to the database: ";
$name = fgets(STDIN);

//echo "Please enter the hair color for " . $name . ": ";
//$color = fgets(STDIN);

$name = trim(str_replace( array("\r\n","\r","\n",'  '), ' ' , $name));
//$color = trim(str_replace( array("\r\n","\r","\n",'  '), ' ' , $color));

$sqlite->insertName($name);