<?php
session_start();
include_once 'php/Connessione/connection.php';

if(isset($_SESSION['uname']))
{	
    header('location: Admin/amministrazione.php');
    exit();
}

$page=file_get_contents("html/login.html");
$footer=file_get_contents("footer/footer.html");
$header=file_get_contents("header/header.html");
$page=str_replace('$errorlogin$', "", $page);
$page=str_replace('$header$', $header ,$page);
$page=str_replace('$footer$', $footer, $page);
$page=str_replace('$breadcrumb$', '/<span lang="en" xml:lang="en">Login</span>' ,$page);
echo $page;
?>