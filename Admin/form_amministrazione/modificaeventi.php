<?php
include_once '../../php/Connessione/connection.php';


if(isset($_POST['upload'])){
	$id=$_GET['idevento'];
	$newevento=mysqli_real_escape_string($conn, $_POST['evento']);
	$newdesc= mysqli_real_escape_string($conn, $_POST['desc_evento']);
	$newdataz=$_POST['dataZ'];
	$newposti=$_POST['posti'];
	$newalt=mysqli_real_escape_string($conn, $_POST['alt']);
	$newimg=$_FILES['image']['name'];

	$modev=mysqli_query($conn, "UPDATE eventi SET evento='$newevento', desc_evento='$newdesc', dataZ='$newdataz', posti='$newposti', alt='$newalt', imgeventi='$newimg' WHERE idevento='$id'");
	

	//var_dump($bla);
	if(!$modev){
		header('location: errmodev.html');
        exit();
    }
	else{
		header("location: queryeliminaeventi.php");
        exit();
	}
}

?>