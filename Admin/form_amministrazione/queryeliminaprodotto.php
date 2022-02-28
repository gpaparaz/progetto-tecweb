<?php //INIZIO
session_start();
include_once '../../php/Connessione/connection.php';
if(!isset($_SESSION['uname']))
{
    header("location: ../../forbidden.php");
    exit();
}
$query=mysqli_query($conn, "SELECT *FROM prodotti") or die ("Query vuota".mysqli_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
    <head>
        <title>Gestione Prodotti | Amministrazione - Non solo Grappe</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
        <meta name="title" content="Tabella dei prodotti di Non solo grappe"/>
        <meta name="description" content="In questa pagina potrai gestire i prodotti del sito Non solo Grappe."/>
        <meta name="keywords" content="amministrazione, admin, prodotto, evento, prenotazione, modifica, inserisci, aggiungi, elimina, seleziona"/>
        <meta name="author" content="Giorgia Paparazzo, Mattia Cocco, Giulio Toffanello, Federico Consalvo"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" type="text/css" href="../amministrazione.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="icon" href="../../img/loghi/logo_sito_rid.png"/>
        <link rel="stylesheet" type="text/css" media="print" href="../stampa_amm.css"/>

        <script type="text/javascript" src="../../javascript/alert.js"></script>
        <script type="text/javascript" src="../../javascript/common.js"></script>
        <script type="text/javascript" src="../../javascript/header.js"></script>

    </head>
        
    <body>

        <div id="adm-content">
        <div id="hamburger">
                    <button type="button" title="Apri menù"><span class="fa fa-bars"></span></button>
                </div>
            
            <div class="header_amm">
                <div id="menu-mob">  
                <ul id="menu_amm">
                    <li><a href="../amministrazione.php">Amministrazione</a></li>
                    <li><a href="queryeliminaprodotto.php">Gestione Prodotti</a></li>
                    <li><a href="queryeliminaeventi.php">Gestione Eventi</a></li>
                    <li><a href="eliminaprenotazioni.php">Gestione Prenotazioni</a></li>
                    <li><a href="gestionecommenti.php">Gestione Commenti</a></li>
                </ul>
                </div>
            </div>            
            <h1>Gestione prodotti</h1>
            <h2> In questa pagina potrai: </h2>
            <p> - Inserire un nuovo prodotto <br />
                - Modificare un prodotto <br />
                - Eliminare uno o più prodotti <br />
            </p>

            <div id="reindirizzamenti">
                <a href="insertproductforb.php" class="btn_btn-success">Inserisci nuovo prodotto</a>
            </div>

            <form action="modelproduct.php" method="post" onsubmit="return check()">
                <fieldset class="adm-form">
                    <table class="tabella_eliminazione" summary="tabella dei prodotti">
                        <thead>
                            <tr>
                                <th scope="col">Id prodotto</th>
                                <th scope="col">Titolo prodotto</th>
                                <th scope="col">Seleziona</th>
                                <th scope="col">Modifica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row=mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td scope="row"><?php echo $row['idprodotto'];?></td>
                                <td><?php echo $row['titolo'];?></td>
                                <td><input type="checkbox" value="<?php echo $row['idprodotto'];?>" name="check[]"/></td>
                                <td><?php echo '<a id="modifica" href="modelproduct.php?idprodotto='.$row['idprodotto'].'">Modifica</a>' ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type="reset" value="Deseleziona tutto" class="btn_btn-success"/>
                    <input id="input_elim" type="submit" name="elimina" class="btn_btn-success" value="Elimina"/>
                    <span id="error-elem"></span>
                </fieldset>
            </form>

            <h2>Torna alla <a href="../../index.php"><span lang="en" xml:lang="en">home</span></a></h2>
            <div>
                <a href="#adm-content" id="myBtn" title="Torna su">
                    <span class="fa fa-chevron-up"></span>
                </a>
            </div>
        </div>
    </body>
</html>