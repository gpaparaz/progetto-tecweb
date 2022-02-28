<?php 
session_start();
if(!isset($_SESSION['uname']))
{
	header("location: ../forbidden.php");
    exit();
}
else{
$page=file_get_contents("amministrazione.html");
echo $page;
}
?>
