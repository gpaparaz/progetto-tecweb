<?php

session_start();

require_once 'php/Connessione/connection.php';


$page=file_get_contents("html/forbidden.html");
$footer=file_get_contents("footer/footer.html");
$header=file_get_contents("header/header.html");
$page=str_replace('$header$', $header ,$page);
$page=str_replace('$footer$', $footer, $page);
$page=str_replace('$breadcrumb$', '/ Forbidden' ,$page);
echo $page;

?>

