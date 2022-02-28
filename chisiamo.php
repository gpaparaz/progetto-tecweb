<?php

session_start();

require_once 'php/Connessione/connection.php';


$page=file_get_contents("html/chisiamo.html");
$footer=file_get_contents("footer/footer.html");
$header=file_get_contents("header/header.html");
$page=str_replace('$errornome$', "", $page);
$page=str_replace('$errormail$', "", $page);
$page=str_replace('$errorobj$', "", $page);
$page=str_replace('$header$', $header ,$page);
$page=str_replace('$footer$', $footer, $page);
$page=str_replace('$breadcrumb$', '/ Chi Siamo' ,$page);
echo $page;

?>

