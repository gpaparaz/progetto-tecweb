<?php

include_once 'php/Connessione/connection.php';
$tipo=$_POST['category'];

if($tipo=='prodotti'){
	$catalogo=array();
	$result=mysqli_query($conn, "SELECT * FROM prodotti WHERE (desc_prod LIKE '%$_POST[cerca]%') 
														 OR (titolo LIKE '%$_POST[cerca]%') 
														 OR (tipoalc LIKE '%$_POST[cerca]%')
														 OR (regione LIKE '%$_POST[cerca]%')
														 OR (aroma LIKE '%$_POST[cerca]%')
														 OR (tipologia LIKE '%$_POST[cerca]%')");

	if(!$result){
		echo 'mysqli_error($conn)';
		exit();
	}
	if(mysqli_num_rows($result)==0){
		header("location: pagina404.php");
	}
	else{
		while($row=mysqli_fetch_assoc($result))
		{
			$catalogo[]=$row;
		}

		$insresult="";
		foreach($catalogo as $result)
		{
			$get_result=file_get_contents("html/catalogomultiplo.html");
			$get_result=str_replace('$idprodotto$', $result["idprodotto"], $get_result);
			$get_result=str_replace('$titolo$', $result["titolo"], $get_result);
			$get_result=str_replace('$tipoalc$', $result["tipoalc"], $get_result);
			$get_result=str_replace('$tipologia$', $result["tipologia"], $get_result);
			$get_result=str_replace('$gradazione$', $result["gradazione"], $get_result);
			$get_result=str_replace('$regione$', $result["regione"], $get_result);
			$get_result=str_replace('$temp$', $result["temp"], $get_result);
			$get_result=str_replace('$aroma$', $result["aroma"], $get_result);
			$get_result=str_replace('$desc_prod$', $result["desc_prod"], $get_result);
			$get_result=str_replace('$alt$', $result["alt"], $get_result);
			$get_result=str_replace('$img$', $result["immagini"], $get_result);
			$insresult=$insresult.$get_result;
		}

		$page=file_get_contents("html/catalogo.html");
		$page=str_replace('$titolocategoria$','Risultati Ricerca',$page);
		$page=str_replace('$catalogo$',$insresult, $page);

	}
}
else if($tipo=='eventi'){
		$catalogo=array();
		$result=mysqli_query($conn, "SELECT * FROM eventi WHERE (desc_evento LIKE '%$_POST[cerca]%')
															OR (evento LIKE '%$_POST[cerca]%') ORDER BY dataZ");

		if(!$result){
		echo 'mysqli_error($conn))';
		exit();
		}
		if(mysqli_num_rows($result)==0){
		header("location: pagina404.php");
		}
		else{
			while ($row=mysqli_fetch_assoc($result)){
				$catalogo[]=$row;
			}
			$insresult="";
			foreach ($catalogo as $result){
				$get_result=file_get_contents("html/catalogoEventi.html");
				$get_result=str_replace('$evento$', $result["evento"], $get_result);
				$get_result=str_replace('$desc_evento$', $result["desc_evento"], $get_result);
				$get_result=str_replace('$dataZ$', $result["dataZ"], $get_result);
				$get_result=str_replace('$img$', $result["imgeventi"], $get_result);
				$insresult=$insresult.$get_result;
			}

			$page=file_get_contents("html/eventi.html");
			$page=str_replace('$titolopagina$','Risultati Ricerca',$page);
			$page=str_replace('$catalogo$',$insresult, $page);
		}
	}
	
else{
	$page=file_get_contents("footer/footer.html");
	$footer=file_get_contents("footer/footer.html");
	$header=file_get_contents("header/header.html");
	$page=str_replace('$header$', $header ,$page);
	$page=str_replace('$footer$', $footer ,$page);
	$page=str_replace('$breadcrumb$', "/ Ricerca" ,$page);

}
	$footer=file_get_contents("footer/footer.html");
	$header=file_get_contents("header/header.html");
	$page=str_replace('$header$', $header ,$page);
	$page=str_replace('$footer$', $footer ,$page);
	$page=str_replace('$breadcrumb$', "/ Ricerca" ,$page);

	echo $page;
?>