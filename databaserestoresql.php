<?php
/**
 * databaseRestoreSQL allow to restore a sql database from php code
 * @return void
 * @author Emmanuel ADEKPLOVI
 */

function databaseRestoreSQL($dbhost,$dbuser,$dbpwd,$dbname,$dbsourcedump){
$sql = mysqli_connect($dbhost,$dbuser, $dbpwd,$dbname );
$sqlSource=file_get_contents($dbsourcedump);
mysqli_multi_query($sql,$sqlSource);
mysqli_close($sql);
}