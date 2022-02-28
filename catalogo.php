<?php
include_once 'php/Connessione/connection.php';
//Richiesta al DB dei Liquori tramite query+array
// PER PRODOTTI MULTIPLI (prodotti.php?cat=vini&tipo=bianchi)
$catalogo=array();
$tipoalc=$_GET['tipoalc'];
$tipologia=$_GET['tipologia'];

$query=mysqli_query($conn, "SELECT * FROM prodotti WHERE tipoalc='$tipoalc' AND tipologia='$tipologia'");

if(!$query)
{
	echo 'mysqli_error($conn))';
	exit();
}

while($row=mysqli_fetch_assoc($query))
{
	$catalogo[]=$row;
}



//Se invece la query è valida e l'array ha almeno un elemento
$inscatalogomultiplo="";
foreach($catalogo as $catalogomultiplo)
{
	$get_catalogomultiplo=file_get_contents("html/catalogomultiplo.html");
	$get_catalogomultiplo=str_replace('$idprodotto$', $catalogomultiplo["idprodotto"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$titolo$', $catalogomultiplo["titolo"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$tipoalc$', $catalogomultiplo["tipoalc"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$tipologia$', $catalogomultiplo["tipologia"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$gradazione$', $catalogomultiplo["gradazione"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$regione$', $catalogomultiplo["regione"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$temp$', $catalogomultiplo["temp"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$aroma$', $catalogomultiplo["aroma"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$desc_prod$', $catalogomultiplo["desc_prod"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$alt$', $catalogomultiplo["alt"], $get_catalogomultiplo);
	$get_catalogomultiplo=str_replace('$img$', $catalogomultiplo["immagini"], $get_catalogomultiplo);
	$inscatalogomultiplo=$inscatalogomultiplo.$get_catalogomultiplo;
}

$page=file_get_contents("html/catalogo.html");

$header=file_get_contents("header/header.html");
$page=str_replace('$header$', $header ,$page);

if($tipologia == "Barricata")
{
        $page=str_replace('$titolocategoria$','Grappe Barricate', $page);
        $page=str_replace('$breadcrumb$', "/ <a href='paginagrappe.php'>Grappe</a> / $tipologia" ,$page);
}
    elseif($tipologia == "Aromatizzata")
    {
        $page=str_replace('$titolocategoria$','Grappe Aromatizzate', $page);
        $page=str_replace('$breadcrumb$', "/ <a href='paginagrappe.php'>Grappe</a> / $tipologia" ,$page);
    }
elseif($tipologia == "Giovane")
{
        $page=str_replace('$titolocategoria$','Grappe Giovani', $page);
    $page=str_replace('$breadcrumb$', "/ <a href='paginagrappe.php'>Grappe</a> / $tipologia" ,$page);
}
elseif($tipologia == "Fruttato")
{
        $page=str_replace('$titolocategoria$','Liquori Fruttati ', $page);
    $page=str_replace('$breadcrumb$', "/ <a href='paginaliquori.php'>Liquori</a> / $tipologia" ,$page);
}
elseif($tipologia == "Distillato")
{
        $page=str_replace('$titolocategoria$','Liquori Distillati', $page);
    $page=str_replace('$breadcrumb$', "/ <a href='paginaliquori.php'>Liquori</a> / $tipologia" ,$page);
}
elseif($tipologia == "Speziato")
{
        $page=str_replace('$titolocategoria$','Liquori Speziati', $page);
    $page=str_replace('$breadcrumb$', "/ <a href='paginaliquori.php'>Liquori</a> / $tipologia" ,$page);
}
elseif($tipologia == "Bianco")
{
        $page=str_replace('$titolocategoria$','Vini Bianchi', $page);
    $page=str_replace('$breadcrumb$', "/ <a href='paginavini.php'>Vini</a> / $tipologia" ,$page);
}
elseif($tipologia == "Rosso")
{
        $page=str_replace('$titolocategoria$','Vini Rossi', $page);
    $page=str_replace('$breadcrumb$', "/ <a href='paginavini.php'>Vini</a> / $tipologia" ,$page);
}
$page=str_replace('$catalogo$',$inscatalogomultiplo, $page);
$footer=file_get_contents("footer/footer.html");
$page=str_replace('$footer$', $footer ,$page);

echo $page;
?>
