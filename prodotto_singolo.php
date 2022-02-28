<?php

session_start();

require_once 'php/Connessione/connection.php';
// PER PRODOTTO SINGOLO
$catalogo=array();
$id=$_GET['idprodotto'];

//echo $id;

$query=mysqli_query($conn, "SELECT * FROM prodotti WHERE idprodotto='$id'");

//print_r($query);

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
$ins_prodotto_singolo="";
$prodotto_singolo=file_get_contents("html/prodotto_singolo.html");

foreach($catalogo as $catalogomultiplo)
{
	$prodotto_singolo=str_replace('$idprodotto$', $catalogomultiplo["idprodotto"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$titolo$', $catalogomultiplo["titolo"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$tipoalc$', $catalogomultiplo["tipoalc"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$tipologia$', $catalogomultiplo["tipologia"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$gradazione$', $catalogomultiplo["gradazione"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$regione$', $catalogomultiplo["regione"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$temp$', $catalogomultiplo["temp"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$aroma$', $catalogomultiplo["aroma"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$desc_prod$', $catalogomultiplo["desc_prod"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$alt$', $catalogomultiplo["alt"], $prodotto_singolo);
	$prodotto_singolo=str_replace('$img$', $catalogomultiplo["immagini"], $prodotto_singolo);
	$ins_prodotto_singolo=$ins_prodotto_singolo.$prodotto_singolo;
}

$header=file_get_contents("header/header.html");
$prodotto_singolo=str_replace('$header$', $header ,$prodotto_singolo);


if($catalogomultiplo["tipologia"] == "Barricata")
{
    $prodotto_singolo=str_replace('$breadcrumb$', "/ <a href='paginagrappe.php'>Grappe</a> / <a href='catalogo.php?tipoalc=Grappa&tipologia=Barricata'> Barricata</a> / $catalogomultiplo[titolo]", $prodotto_singolo);
}
elseif($catalogomultiplo["tipologia"] == "Aromatizzata")
{
    $prodotto_singolo=str_replace('$breadcrumb$', "/ <a href='paginagrappe.php'>Grappe</a> / <a href='catalogo.php?tipoalc=Grappa&tipologia=Aromatizzata'> Aromatizzata</a> / $catalogomultiplo[titolo]", $prodotto_singolo);
}
elseif($catalogomultiplo["tipologia"] == "Giovane")
{
    $prodotto_singolo=str_replace('$breadcrumb$', "/ <a href='paginagrappe.php'>Grappe</a> / <a href='catalogo.php?tipoalc=Grappa&tipologia=Giovane'> Giovane</a> / $catalogomultiplo[titolo]", $prodotto_singolo);
}
elseif($catalogomultiplo["tipologia"] == "Fruttato")
{
    $prodotto_singolo=str_replace('$breadcrumb$', "/ <a href='paginaliquori.php'>Liquori</a> / <a href='catalogo.php?tipoalc=Liquore&tipologia=Fruttato'> Fruttati </a> / $catalogomultiplo[titolo]", $prodotto_singolo);
}
elseif($catalogomultiplo["tipologia"] == "Distillato")
{
    $prodotto_singolo=str_replace('$breadcrumb$', "/ <a href='paginaliquori.php'>Liquori</a> / <a href='paginaliquori.php'>Liquori</a> / <a href='catalogo.php?tipoalc=Liquore&tipologia=Distillato'> Distillati </a> / $catalogomultiplo[titolo]", $prodotto_singolo);
}
elseif($catalogomultiplo["tipologia"] == "Speziato")
{
    $prodotto_singolo=str_replace('$breadcrumb$', "/ <a href='paginaliquori.php'>Liquori</a> / <a href='paginaliquori.php'>Liquori</a> / <a href='catalogo.php?tipoalc=Liquore&tipologia=Speziato'> Speziati </a> / $catalogomultiplo[titolo]", $prodotto_singolo);
}
elseif($catalogomultiplo["tipologia"] == "Bianco")
{
    $prodotto_singolo=str_replace('$breadcrumb$', "/ <a href='paginavini.php'>Vini</a> / <a href='catalogo.php?tipoalc=Vino&tipologia=Bianco'> Vino Bianco</a> /$catalogomultiplo[titolo]", $prodotto_singolo);
}
elseif($catalogomultiplo["tipologia"] == "Rosso")
{
    $prodotto_singolo=str_replace('$breadcrumb$', "/ <a href='paginavini.php'>Vini</a> / <a href='catalogo.php?tipoalc=Vino&tipologia=Rosso'> Vino Rosso</a> / $catalogomultiplo[titolo]", $prodotto_singolo);
}

$footer=file_get_contents("footer/footer.html");
$prodotto_singolo=str_replace('$footer$', $footer, $prodotto_singolo);


echo $prodotto_singolo;

?>

