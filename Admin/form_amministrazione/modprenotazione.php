<?php
include_once '../../php/Connessione/connection.php';

$catalogo=array();
$id=$_GET['idprenotazione'];

$query=mysqli_query($conn, "SELECT * FROM prenotazioni WHERE idprenotazione='$id'");

while($row=mysqli_fetch_assoc($query))
{
	$catalogo[]=$row;
}

if(!$query)
{
	echo 'mysqli_error($conn))';
	exit();
}

//Se invece la query è valida e l'array ha almeno un elemento
$ins_mod_pren="";
$mod_pren=file_get_contents("modificaprenotazione.html");
$mod_pren=str_replace('$errornome$', "", $mod_pren);
$mod_pren=str_replace('$errormail$', "", $mod_pren);
$mod_pren=str_replace('$errornum$', "", $mod_pren);

foreach($catalogo as $catalogomultiplo)
{
	$mod_pren=str_replace('$idprenotazione$', $catalogomultiplo["idprenotazione"], $mod_pren);
	$mod_pren=str_replace('$dataevento$', $catalogomultiplo["dataevento"], $mod_pren);
	$mod_pren=str_replace('$nominativo$', $catalogomultiplo["nominativo"], $mod_pren);
	$mod_pren=str_replace('$email$', $catalogomultiplo["email"], $mod_pren);
	$mod_pren=str_replace('$nposti$', $catalogomultiplo["nposti"], $mod_pren);
	$ins_mod_pren=$ins_mod_pren.$mod_pren;
}

echo $mod_pren;

?>