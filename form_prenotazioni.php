<?php 
include_once("php/Connessione/connection.php");
include_once("prenotazioni.php");
$data=date('y-m-d');
$query="SELECT * FROM eventi WHERE dataZ>'$data' ORDER BY dataZ";
$result1=mysqli_query($conn, $query);
if(!$result1)
  echo 'query sbagliata';
?>


<div id="contenutoP">
    <div class="prenotazioni">
        <p> Compila il form sottostante per prenotare dei posti agli eventi a cui partecipiamo. I posti disponibili per ogni evento sono limitati.</p>

        <div class="container_prenotazioni">
            <form id="formPrenotazioni" action="insprenotazioni.php" method="post" onsubmit=" return emptyFieldPrenotazioni();">
                <fieldset class="site-form">
                    <legend id="campi">Tutti i campi sono obbligatori</legend>
                    <label for="evento">Seleziona l'evento in cui desideri partecipare:</label>
                    <select id="evento" name="evento">
                        <?php
                        while($row1=mysqli_fetch_array($result1)){?>
                        <option value="<?php echo $row1[1];?>"><?php echo $row1[3], str_repeat('&nbsp;', 6), $row1[1], str_repeat('&nbsp;', 5), 'posti disponibili: ', $row1[4];?></option>
                        <?php } ?>
                    </select>
                    <label for="input1">Nominativo (Nome e Cognome):</label> <span id="error-nome"></span>
                    <input id="input1" type="text" name="nominativo"  />
                    <label for="input2">Numero posti:</label> <span id="error-posti"></span>
                    <input id="input2" type="text" name="nposti"  />
                    <label for="input8" xml:lang="en" lang="en">E-mail:</label> <span id="error-mail"></span>
                    <input id="input8" type="text" name="email"  />
                    <input id="prenotati" type="submit" name="submit" value="Prenota"/>
                </fieldset>
            </form>
        </div>
    </div> <!-- div di prenotazioni-->
</div>
<?php include_once("footer/footer.html");?>

</body>
</html>