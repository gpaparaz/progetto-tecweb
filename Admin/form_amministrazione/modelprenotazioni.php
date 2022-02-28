<?php
session_start();
include_once '../../php/Connessione/connection.php';


//ELIMINA
if(isset($_POST['elimina'])){
    if(isset($_POST['check'])){
    	foreach ($_POST['check'] as $id){
            $check=mysqli_query($conn, "SELECT * FROM prenotazioni WHERE idprenotazione='$id'") or die ("non esiste la prenotazione".mysqli_error());
            
            $addposti=array();
            $dataeve=array();
            
            $posti_prenotazione=mysqli_query($conn, "SELECT nposti FROM prenotazioni WHERE idprenotazione='$id'");
            $addposti=mysqli_fetch_array($posti_prenotazione);
            
            $data=mysqli_query($conn, "SELECT dataevento FROM prenotazioni WHERE idprenotazione='$id'");
            $dataeve=mysqli_fetch_array($data);
              
            if(mysqli_num_rows($check)>0){
	            $update=mysqli_query($conn, "UPDATE eventi SET posti=posti+'$addposti[0]' WHERE dataZ='$dataeve[0]'");
                $delete=mysqli_query($conn, "DELETE FROM prenotazioni WHERE idprenotazione='$id'") or die ("prenotazione non eliminata".mysqli_error());
            
                header('location: eliminaprenotazioni.php');
                exit();
            }
        }
    }
    else
    {     header('location: eliminaprenotazioni.php');
            exit();
    }
    exit();
}

//MODIFICA
else{
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

    if(!filter_var($catalogomultiplo["email"], FILTER_VALIDATE_EMAIL))
    {
        echo 'Email non valida';
        exit();
    }

//Se invece la query è valida e l'array ha almeno un elemento
    $ins_mod_pren="";
    $mod_pren=file_get_contents("modificaprenotazione.html");

    foreach($catalogo as $catalogomultiplo)
    {
	   $mod_pren=str_replace('$idprenotazioni$', $catalogomultiplo["idprenotazione"], $mod_pren);
	   $mod_pren=str_replace('$dataevento$', $catalogomultiplo["dataevento"], $mod_pren);
	   $mod_pren=str_replace('$nominativo$', $catalogomultiplo["nominativo"], $mod_pren);
	   $mod_pren=str_replace('$email$', $catalogomultiplo["email"], $mod_pren);
	   $mod_pren=str_replace('$nposti$', $catalogomultiplo["nposti"], $mod_pren);
	   $ins_mod_pren=$ins_mod_pren.$mod_pren;
    }

    echo $mod_pren;
}

?>