<?php
session_start();
include_once '../../php/connessione/connection.php';
if(!isset($_SESSION['uname']))
{
    header("location: ../../forbidden.php");
    exit();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it-IT" lang="it-IT">
    <head>
        <title>Nuovo evento | Amministrazione - Non solo Grappe</title>
        <meta charset="utf-8"/>
        <meta name="title" content="Nuovo evento | Amministrazione - Non solo Grappe"/>
        <meta name="description" content="In questa pagina potrai compilare i campi per inserire un nuovo evento nel sito. Cosa c'è di nuovo oggi?"/>
        <meta name="keywords" content="amministrazione, admin, prodotto, evento, prenotazione, modifica, inserisci, aggiungi, elimina, seleziona" />
        <meta name="author" content="Giorgia Paparazzo, Mattia Cocco, Giulio Toffanello, Federico Consalvo" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" type="text/css" media="screen" href="../amministrazione.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="icon" href="../../img/loghi/logo_sito_rid.png"/>
        <link rel="stylesheet" type="text/css" media="print" href="../stampa_amm.css"/>

    </head>
        
    <body>
    
        <section id="nuovoevento">
            <div id="corpoform">
                
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
                
                <h1>Form di inserimento eventi:</h1>
                <p>Compila tutti i campi sottostanti.</p>
                <form action="insertevent.php" method="post" enctype="multipart/form-data">
                    <fieldset class="adm-form">  
                        <legend class="ie" >Inserire la data nel formato anno - mese - giorno</legend>  
                        <label for="input12">Titolo:</label>
                        <input id="input12" type="text" name="evento" required>
                        
                        <label for="input14">Data:</label>
                        <input id="input14" type="date" name="dataZ" required>
                        
                        <label for="input15">Posti disponibili:</label>
                        <input id="input15" type="number" name="posti" required>

                        <label for="desc">Descrizione immagine:</label>
                        <input id="desc" type="text" name="alt" required>
                          
                        <label for="image">Immagine:</label>
                        <input id="image" type="file" name="image" required> 
                          
                        <label for="input13">Descrizione evento:</label>
                        <textarea id="input13" name="desc_evento" required></textarea>
                              
                        <input class="btn_btn-success" type="submit" value="Carica Evento" name="upload">
                    </fieldset>
                </form>

                
                <h2>Torna alla <a href="../../index.php"><span lang="en">home</span></a></h2>

                <div>
                <a href="#corpoform" id="myBtn" title="Torna su">
                    <span class="fa fa-chevron-up"></span>
                </a>
                </div>
            </div>
        </section>

    </body>
</html>