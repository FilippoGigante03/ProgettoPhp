<html>
<body background="back.jpg">
<?php
require("Gigante.Filippo_connessioneDatabase.php");

if (isset($_POST["invia_form"])) {
    cancella();
} else if (isset($_POST["invio_codice"])) {
    form();
} else {
    codice_dipendente();
}

function codice_dipendente()
{
    global $connessione;
    echo <<< FORM
  <form action="?scelta=cancella" method="post">
  <fieldset>
  <h1>inserisci il codice del dipendente da eliminare: </h1>
  <input type="number" size="30" name="cod" /><br /><br />
  <button type="submit" name="invio_codice" class="btn btn-primary">Inserisci</button>
  <button type="reset" class="btn btn-danger">Annulla</button>
	</fieldset>
  </form>
FORM;
    
}
function form()
{


    global $connessione;
    global $codice;
    $id_dip=$_POST["cod"];
    $codice = "SELECT * FROM dipendenti WHERE cod_dipendente= '$id_dip'";
    $risultatoQuery = mysqli_query($connessione, $codice);
    $tabella = mysqli_fetch_array($risultatoQuery) 
               or die("<h1>non esiste nessun dipendente con codice= a $id_dip:</h1>" . mysqli_error($connessione));
    $cod_dipendente = $tabella["cod_dipendente"];
    $nome = $tabella["nome"];
    $cognome = $tabella["cognome"];
    $data_nascita = $tabella["data_nascita"];
    $email = $tabella["email"];
    $telefono = $tabella["telefono"];
    $citta_nascita = $tabella["citta_nascita"];
    $residenza = $tabella["residenza"];

echo <<< END
    <form action="?scelta=cancella"  method="post">
      <input type="hidden" name="cod_dipendente"  value ="$cod_dipendente"> 
          <fieldset>
          <legend>Cancella dipendente</legend>
          <label>Nome:</label>
          <input type="text" size="30"  name="nome" value="$nome" required /><br /><br />
          <label>Cognome:</label>
          <input type="text" size="30" name="cognome" value="$cognome" /><br /><br />
          <label>data nascita:</label>
          <input type="date" name="data_n" value="$data_nascita" /><br /><br />     
          <label>email</label>
          <input type="text" size="45" name="email" value="$email" /><br /> <br />
          <label>telefono</label>
          <input type="text" size="30" name="telefono" value="$telefono" /><br /> <br />
          <label>citta nascita:</label>
          <input type="text" size="30" name="citta_n" value="$citta_nascita" /><br /> <br />
          <label>residenza:</label>
          <input type="text" size="30" name="residenza" value="$residenza" /><br /> <br />
          <h1 class="text-danger">SEI SICURO DI ELIMINARE IL DIPENDENTE?</h1>
          <button type="submit" name="invia_form" class="btn btn-primary">Si,Cancella</button>
          <button type="submit" name="" class="btn btn-danger">No, Annulla</button>
          </fieldset>
    </form>
END;
  
      mysqli_free_result($risultatoQuery);
}

function cancella() {
    global $connessione;
    $cod_dipendente = $_POST["cod_dipendente"];

    $sqlString = "DELETE FROM dipendenti WHERE cod_dipendente='$cod_dipendente'";

    mysqli_query($connessione, $sqlString) or die(mysqli_error($connessione));
    echo "<h2>dipendente eliminato,Grazie!</h2>";
    mysqli_close($connessione);
}
?>
</body>
</html>