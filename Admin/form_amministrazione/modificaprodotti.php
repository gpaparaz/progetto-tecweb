<?php
include_once '../../php/Connessione/connection.php';

if(isset($_POST['upload'])){
	$id=$_GET['idprodotto'];
	$newtit=mysqli_real_escape_string($conn, $_POST['titolo']);
	$newtipoalc=$_POST['tipoalc'];
	$newtipologia=$_POST['tipologia'];
	$newgradazione=$_POST['gradazione'];
	$newregione=mysqli_real_escape_string($conn, $_POST['regione']);
	$newtemp=$_POST['temp'];
	$newaroma=mysqli_real_escape_string($conn, $_POST['aroma']);
	$newdesc=mysqli_real_escape_string($conn, $_POST['desc_prod']);
	$newalt=mysqli_real_escape_string($conn, $_POST['alt']);
	$newimg=$_FILES['image']['name'];

	$modprod=mysqli_query($conn, "UPDATE prodotti SET titolo='$newtit', tipoalc='$newtipoalc', tipologia='$newtipologia', gradazione='$newgradazione', regione='$newregione', temp='$newtemp', aroma='$newaroma', desc_prod='$newdesc', alt='$newalt', immagini='$newimg' WHERE idprodotto='$id'");
	if(!$modprod)
    {
		header('location: errmodpr.html');
        exit();
    }
	else
    {
		header("location: queryeliminaprodotto.php");
        exit();
    }
}
?>