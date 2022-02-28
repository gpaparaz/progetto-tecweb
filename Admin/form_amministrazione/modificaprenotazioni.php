<?php
include_once '../../php/Connessione/connection.php';


if(isset($_POST['upload'])){
	$id=$_GET['idprenotazione'];
	$newdataevento=$_POST['dataevento'];
	$newnominativo=mysqli_real_escape_string($conn, $_POST['nominativo']);
	$newemail=$_POST['email'];
	$newnposti=$_POST['nposti'];

	$postievento=mysqli_query($conn, "SELECT posti FROM eventi WHERE dataZ='$newdataevento'");
	$postivecchi=mysqli_query($conn, "SELECT nposti FROM prenotazioni WHERE idprenotazione='$id'");
	$resultposti=mysqli_fetch_array($postivecchi);
	$postieventof=mysqli_fetch_array($postievento);
	$postifinali=$resultposti[0]-$newnposti;

	if(empty($newnominativo)){
		$page=file_get_contents("modificaprenotazione.html");
		$page=str_replace('$idprenotazione$',   $id, $page);
		$page=str_replace('$dataevento$',   $newdataevento, $page);
		$page=str_replace('$nominativo$',  $newnominativo, $page);
		$page=str_replace('$email$',  $newemail, $page);
		$page=str_replace('$nposti$',  $newnposti, $page);
		$page=str_replace('$errornome$', "Inserisci Nome e Cognome *", $page);
		$page=str_replace('$errormail$', "", $page);
		$page=str_replace('$errornum$', "", $page);
		echo $page;
	}
	
	else if(empty($newemail) || !filter_var($newemail, FILTER_VALIDATE_EMAIL)){
		$page=file_get_contents("modificaprenotazione.html");
		$page=str_replace('$idprenotazione$', $id, $page);
		$page=str_replace('$dataevento$', $newdataevento, $page);
		$page=str_replace('$nominativo$', $newnominativo, $page);
		$page=str_replace('$email$', $newemail, $page);
		$page=str_replace('$nposti$', $newnposti, $page);
		$page=str_replace('$errornome$', "", $page);
		$page=str_replace('$errormail$', "Inserire un indirizzo mail valido", $page);
		$page=str_replace('$errornum$', "", $page);
		echo $page;
	}
	
	else if(empty($newnposti)){
		$page=file_get_contents("modificaprenotazione.html");		
		$page=str_replace('$idprenotazione$', $id, $page);
		$page=str_replace('$dataevento$', $newdataevento, $page);
		$page=str_replace('$nominativo$', $newnominativo, $page);
		$page=str_replace('$email$', $newemail, $page);
		$page=str_replace('$nposti$', $newnposti, $page);
		$page=str_replace('$errornome$', "", $page);
		$page=str_replace('$errormail$', "", $page);
		$page=str_replace('$errornum$', "Inserire un numero di posti valido", $page);
		echo $page;
	}

	else{
	
		mysqli_query($conn, "DELETE dataevento, nominativo, email, nposti FROM prenotazioni WHERE idprenotazione='$id'");
	
		mysqli_query($conn, "UPDATE prenotazioni SET dataevento='$newdataevento', nominativo='$newnominativo', email='$newemail', nposti=$newnposti WHERE idprenotazione='$id'");
	
		mysqli_query($conn, "UPDATE eventi SET posti=posti+'$postifinali' WHERE dataZ='$newdataevento'");

		header("location: eliminaprenotazioni.php");
        exit();
	}
}

?>