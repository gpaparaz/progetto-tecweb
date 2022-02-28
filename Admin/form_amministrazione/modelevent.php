<?php //INIZIO
session_start();
include_once '../../php/Connessione/connection.php';


if(isset($_POST['elimina'])){
    if(isset($_POST['check'])){
            foreach ($_POST['check'] as $id){
              $check=mysqli_query($conn, "SELECT * FROM eventi WHERE idevento='$id'") or die ("non esiste l'evento".mysqli_error());

              if(mysqli_num_rows($check)>0){
                $delete_prenotazioni=mysqli_query($conn, "DELETE prenotazioni FROM prenotazioni JOIN eventi ON(eventi.dataZ=prenotazioni.dataevento) WHERE prenotazioni.dataevento=eventi.dataZ");
                $delete=mysqli_query($conn, "DELETE FROM eventi WHERE idevento='$id'") or die ("non eliminato".mysqli_error());

                header('location: queryeliminaeventi.php');
            }
        }
    }
    header('location: queryeliminaeventi.php');
    exit();
}

//MODIFICA
else{
$id=$_GET['idevento'];
$catalogo=array();

$query=mysqli_query($conn, "SELECT * FROM eventi WHERE idevento='$id'");
//stripslashes($query);
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
$ins_mod_event="";
$mod_event=file_get_contents("modificaevento.html");
foreach($catalogo as $catalogomultiplo)
{
	$mod_event=str_replace('$idevento$', $catalogomultiplo["idevento"], $mod_event);
	$mod_event=str_replace('$evento$', $catalogomultiplo["evento"], $mod_event);
	$mod_event=str_replace('$desc_evento$', $catalogomultiplo["desc_evento"], $mod_event);
	$mod_event=str_replace('$dataZ$', $catalogomultiplo["dataZ"], $mod_event);
	$mod_event=str_replace('$posti$', $catalogomultiplo["posti"], $mod_event);
	$mod_event=str_replace('$alt$', $catalogomultiplo["alt"], $mod_event);
	$mod_event=str_replace('$imgeventi$', $catalogomultiplo["imgeventi"], $mod_event);
	$ins_mod_event=$ins_mod_event.$mod_event;
}

echo $mod_event;
}
?>