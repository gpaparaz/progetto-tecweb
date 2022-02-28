<?php
include_once 'php/Connessione/connection.php';

$page=file_get_contents("html/prenotazione_riuscita.html");
$footer=file_get_contents("footer/footer.html");
$header=file_get_contents("header/header.html");
//$form_prenotazioni=file_get_contents("php/form_prenotazioni.php");
$page=str_replace('$header$', $header ,$page);
$page=str_replace('$footer$', $footer, $page);
$page=str_replace('$breadcrumb$', " / Prenotazione Riuscita", $page);

echo $page;
?>