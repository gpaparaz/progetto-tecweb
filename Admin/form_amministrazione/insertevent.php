<?php
include_once '../../php/Connessione/connection.php';
session_start();
if(!isset($_SESSION['uname']))
{
	header("location: ../../forbidden.php");
    exit();
}

if(isset($_POST['upload'])){
	$evento=mysqli_real_escape_string($conn, $_POST['evento']);
	$desc_evento=mysqli_real_escape_string($conn, $_POST['desc_evento']);
	$dataZ=$_POST['dataZ'];
	$posti=$_POST['posti'];
	$noimg=mysqli_real_escape_string($conn, $_POST['alt']);
	$immeventi=$_FILES['image']['name'];
    
    if($evento=="" || $desc_evento=="" || $dataZ=="" || $posti=="" || $noimg=="" || $immeventi=="")
	{
		header('location: errinsev.html');
		exit();
	}

	$sql="INSERT INTO eventi (evento, desc_evento, dataZ, posti, alt, imgeventi) VALUES ('$evento', '$desc_evento', '$dataZ', '$posti', '$noimg',
	 '$immeventi')";
	 
	$insert=mysqli_query($conn, $sql);

	if(!$insert)
    {	header('location: errinsev.html');
     exit();
    }
	else
    {	header("location: ../amministrazione.php");
        exit();
    }
}

?>
