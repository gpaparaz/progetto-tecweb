<?php //INIZIO
session_start();
include_once '../../php/Connessione/connection.php';


if(isset($_POST['elimina'])){
    if(isset($_POST['check'])){
    	foreach ($_POST['check'] as $id){

        $check=mysqli_query($conn, "SELECT * FROM prodotti WHERE idprodotto='$id'") or die ("non esiste il prodotto".mysqli_error());

        if(mysqli_num_rows($check)>0){
            $delete=mysqli_query($conn, "DELETE FROM prodotti WHERE idprodotto='$id'") or die ("non eliminato".mysqli_error());
            header('location:queryeliminaprodotto.php');
            exit();
            }
        }
    }
    header('location: queryeliminaprodotto.php');
    exit();
}



//MODIFICA
else{
	$id=$_GET['idprodotto'];
    $catalogo=array();
	$query=mysqli_query($conn, "SELECT * FROM prodotti WHERE idprodotto='$id'");
	

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
	$ins_mod_prod="";
	$mod_prod=file_get_contents("modificaproduct.html");

	foreach($catalogo as $catalogomultiplo)
	{
		$mod_prod=str_replace('$idprodotto$', $catalogomultiplo["idprodotto"], $mod_prod);
		$mod_prod=str_replace('$titolo$', $catalogomultiplo["titolo"], $mod_prod);
		$mod_prod=str_replace('$tipoalc$', $catalogomultiplo["tipoalc"], $mod_prod);
		$mod_prod=str_replace('$tipologia$', $catalogomultiplo["tipologia"], $mod_prod);
		$mod_prod=str_replace('$gradazione$', $catalogomultiplo["gradazione"], $mod_prod);
		$mod_prod=str_replace('$regione$', $catalogomultiplo["regione"], $mod_prod);
		$mod_prod=str_replace('$temp$', $catalogomultiplo["temp"], $mod_prod);
		$mod_prod=str_replace('$aroma$', $catalogomultiplo["aroma"], $mod_prod);
		$mod_prod=str_replace('$desc_prod$', $catalogomultiplo["desc_prod"], $mod_prod);
		$mod_prod=str_replace('$alt$', $catalogomultiplo["alt"], $mod_prod);
		$mod_prod=str_replace('$img$', $catalogomultiplo["immagini"], $mod_prod);
		$ins_mod_prod=$ins_mod_prod.$mod_prod;
	}

echo $mod_prod;
}
?>