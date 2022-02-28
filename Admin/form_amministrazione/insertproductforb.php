<?php
session_start();
include_once '../../php/connessione/connection.php';
if(!isset($_SESSION['uname']))
{
    header("location: ../../forbidden.php");
    exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="it" xml:lang="it">
    <head>
        <title>Nuovo prodotto | Amministrazione - Non solo Grappe</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="title" content="Nuovo prodotto | Amministrazione - Non solo Grappe" />
        <meta name="description" content="In questa pagina potrai inserire un nuovo prodotto nel sito" />
        <meta name="keywords" content="amministrazione, admin, prodotto, evento, prenotazione, modifica, inserisci, aggiungi, elimina, seleziona" />
        <meta name="author" content="Giorgia Paparazzo, Mattia Cocco, Giulio Toffanello, Federico Consalvo" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" type="text/css" media="handheld, screen" href="../amministrazione.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="icon" href="../../img/loghi/logo_sito_rid.png"/>
        <link rel="stylesheet" type="text/css" media="print" href="../stampa_amm.css"/>

    </head>

    <body>
    
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
            
            <h1>Form di inserimento prodotti:</h1>
            <p>Compila tutti i campi sottostanti.</p>
            <form action="insertproduct.php" method="post" enctype="multipart/form-data">
                <fieldset class="adm-form">
                    <label for="input1">Nome prodotto:</label>
                    <input id="input1" type="text" name="titolo" value="" />
                
                    <p>Caratteristiche:</p>
                
                    <label for="tipo">Categoria:</label>
                    <select id="tipo" name="tipoalc">
                        <option value="Grappa">Grappa</option>
                        <option value="Liquore">Liquore</option>
                        <option value="Vino">Vino</option>
                    </select>
                
                    <label for="tipologia">Tipologia:</label>
                    <select id="tipologia" name="tipologia">
                        <option value="Barricata">Barricata</option>
                        <option value="Aromatizzata">Aromatizzata</option>
                        <option value="Giovane">Giovane</option>
                        <option value="Fruttato">Fruttato</option>
                        <option value="Speziato">Speziato</option>
                        <option value="Distillato">Distillato</option>
                        <option value="Rosso">Rosso</option>
                        <option value="Bianco">Bianco</option>
                    </select>
                
                    <label for="input2">Gradazione alcolica:</label>
                    <input id="input2" type="text" name="gradazione" value="" />
                
                    <label for="input3">Regione:</label>
                    <input id="input3" type="text" name="regione" value="" />
                
                    <label for="input4">Temperatura:</label>
                    <input id="input4" type="text" name="temp" value=""/>
                
                    <label for="input5">Aroma:</label>
                    <input id="input5" type="text" name="aroma" value=""/>
                
                    <label for="input6">Descrizione prodotto:</label>
                    <textarea id="input6" name="desc_prod" rows="8" cols="50"></textarea>
                
                    <label for="desc">Descrizione immagine:</label>
                    <input id="desc" type="text" name="alt" value=""/>
                
                    <label for="image">Immagine:</label>
                    <input id="image" type="file" name="image" />        
                    
                    <input class="btn_btn-success" type="submit" value="Carica Prodotto" name="upload"/>
                </fieldset>
            </form>
            
            <h2>Torna alla <a href="../../index.php"><span lang="en" xml:lang="en">home</span></a></h2>
            <div>
                <a href="#corpoform" id="myBtn" title="Torna su">
                    <span class="fa fa-chevron-up"></span>
                </a>
            </div>
        </div>   
    
    </body>
</html>