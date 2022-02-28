<?php //INIZIO
session_start();
include_once '../../php/Connessione/connection.php';
if(!isset($_SESSION['uname']))
{
    header("location: ../../forbidden.php");
    exit();
}

$query=mysqli_query($conn, "SELECT * FROM commenti ORDER BY datacommento DESC");
$catalogo=array();
if(!$query)
{
	echo 'mysqli_error($conn))';
	exit();
}
else
{
    while($row=mysqli_fetch_assoc($query))
    {
        $catalogo[]=$row;
    }
    if(!$catalogo) //Non ci sono commenti
    {
        $page=file_get_contents('catalogo_commenti.html');
        $page=str_replace('$riga_commenti$', 'Nessun commento da visualizzare' , $page);
        echo $page;
    }

    else
    {   //Se invece l'array contiene ALMENO un commento
        $ins_vis_commmenti="";

        foreach($catalogo as $catalogomultiplo)
        {
            $vis_commmenti=file_get_contents("riga_commenti.html");
            $vis_commmenti=str_replace('$data$', $catalogomultiplo["datacommento"], $vis_commmenti);
            $vis_commmenti=str_replace('$nominativo$', $catalogomultiplo["nominativo"], $vis_commmenti);
            $vis_commmenti=str_replace('$email$', $catalogomultiplo["email"], $vis_commmenti);
            $vis_commmenti=str_replace('$oggetto$', $catalogomultiplo["oggetto"], $vis_commmenti);
            $ins_vis_commmenti=$ins_vis_commmenti.$vis_commmenti;
        }

        $page=file_get_contents('catalogo_commenti.html');
        $page=str_replace('$riga_commenti$', $ins_vis_commmenti, $page);
        echo $page;
    }
}
?>