<?php
include_once 'php/Connessione/connection.php';
//Richiesta al DB degli Eventi tramite query+array

$catalogo=array();

$query=mysqli_query($conn, "SELECT *, date_format(dataZ, '%d-%m-%y') FROM eventi ORDER BY dataZ");

while($row=mysqli_fetch_assoc($query))
{
	$catalogo[]=$row;
}

if(!$query)
{
	echo 'mysqli_error($conn))';
	exit();
}
//$catalogo = array_map('stripslashes', $catalogo);

//Se invece la query è valida e l'array ha almeno un elemento
$inseventi="";
foreach($catalogo as $eventi)
{
	$get_eventi=file_get_contents("html/catalogoEventi.html");
	
	$get_eventi=str_replace('$evento$', $eventi["evento"], $get_eventi);
    $get_eventi=str_replace('$dataZ$', $eventi["date_format(dataZ, '%d-%m-%y')"], $get_eventi);    
	$get_eventi=str_replace('$desc_evento$', $eventi["desc_evento"], $get_eventi);
	$get_eventi=str_replace('$alt$', $eventi["alt"], $get_eventi);
	$get_eventi=str_replace('$img$', $eventi["imgeventi"], $get_eventi);
	$inseventi=$inseventi.$get_eventi;
}
$page=file_get_contents("html/eventi.html");
$page=str_replace('$titolopagina$','Eventi',$page);
$page=str_replace('$catalogo$',$inseventi, $page);
$footer=file_get_contents("footer/footer.html");
$header=file_get_contents("header/header.html");
$page=str_replace('$header$', $header ,$page);
$page=str_replace('$footer$', $footer ,$page);
$page=str_replace('$breadcrumb$', '/ Eventi', $page);

echo $page;
?>
