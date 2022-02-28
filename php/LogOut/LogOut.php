<?php
session_start();
include_once '../Connessione/connection.php';

session_destroy();
header("location: ../../index.php");
exit();
?>