<?php
session_start();
include_once("php/Connessione/connection.php");
$page=file_get_contents("html/prenotazioni.html");
$header=file_get_contents("header/header.html");
$page=str_replace('$header$', $header, $page);
$page=str_replace('$breadcrumb$', " / Prenotazioni ", $page);

echo $page;
?>