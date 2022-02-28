<?php

session_start();

require_once 'php/Connessione/connection.php';

if(isset($_POST['submit'])){
	$err="";
	$row=array();
	$posti_totali=array();
	$nominativo= mysqli_real_escape_string($conn, $_POST['nominativo']);
	$nposti= $_POST['nposti'];
	$nomeevento=mysqli_real_escape_string($conn, $_POST['evento']);
	$email=$_POST['email'];
	$postievento=mysqli_query($conn, "SELECT posti FROM eventi WHERE evento='$nomeevento'");
	$data=mysqli_query($conn, "SELECT dataZ FROM eventi WHERE evento='$nomeevento'");
	$posti_totali=mysqli_fetch_array($postievento);
	$row=mysqli_fetch_array($data);
	
	

	if($nominativo=="" || $nposti=="" || $nomeevento=="" || $email=="")
	{
		header("location: prenotazionefallita.php");
		exit();
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		header("location: prenotazionefallita.php");
		exit();
	}
	
	$query="INSERT INTO prenotazioni(nominativo, nposti, dataevento, email) VALUES ('$nominativo','$nposti', '$row[0]', '$email')";
	
	if($nposti>$posti_totali[0]){
		header("location: troppi_posti.php");
		exit();
	}

	mysqli_query($conn, "UPDATE eventi SET posti=posti-$nposti WHERE evento='$nomeevento'");

	$insert=mysqli_query($conn, $query);
	if(!$insert)
		echo "Errore". mysqli_error($conn);
	else
    {
        header("location: prenotazioneriuscita.php");
        exit();
    }
}
?>