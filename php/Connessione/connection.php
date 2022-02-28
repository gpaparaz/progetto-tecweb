<?php
#Connessione php+db
$servername="localhost";
$username="root";
$password="";
$dbname="tecweb";

define("DB_HOST", $servername);
define("DB_NAME", $dbname);
define("DB_USER", $username);
define("DB_PASS", $password);

//Create Connection
$conn=new mysqli($servername, $username, $password, $dbname);

//Check
if(!$conn)
{
	die("Connection failed:".mysqli_connect_error());
}
?>
