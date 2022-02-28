<?php
include_once '../../php/Connessione/connection.php';
session_start();
if(!isset($_SESSION['uname']))
{	header("location: ../../forbidden.php");
    exit();
}
	
// recupero i valori di nome caratteristiche descrizione e immagine e li assegno alle variabili
if(isset($_POST['upload'])){
    $msg="";
    $titolo= mysqli_real_escape_string($conn, $_POST['titolo']);
    $tipoalc= $_POST['tipoalc'];
    $tipologia= $_POST['tipologia'];
    $gradazione= $_POST['gradazione'];
    $regione= mysqli_real_escape_string($conn, $_POST['regione']);
    $temp= $_POST['temp'];
    $aroma= mysqli_real_escape_string($conn, $_POST['aroma']);
    $desc_prod= mysqli_real_escape_string($conn, $_POST['desc_prod']);
    $noimg=mysqli_real_escape_string($conn, $_POST['alt']);
    $immprodotti=$_FILES['image']['name'];

    if($titolo=="" || $tipoalc=="" || $tipologia=="" || $gradazione=="" || $regione=="" || $temp=="" || $aroma=="" || $desc_prod=="" || $noimg=="" || $immprodotti=="")
    {
        header('location: errinspr.html');
        exit();
    }
    $result = "INSERT INTO prodotti (titolo, tipoalc, tipologia, gradazione, regione, temp,aroma, desc_prod, alt, immagini)	
                            VALUES('$titolo', '$tipoalc', '$tipologia', '$gradazione', '$regione', '$temp', '$aroma', '$desc_prod', '$noimg', '$immprodotti')";

    $insert=mysqli_query($conn, $result);
    if($insert)
    {
        header('location: ../amministrazione.php');
        exit();
    } 
    else
    {
        header('location: errinspr.html');
        exit();
        }
}
?>