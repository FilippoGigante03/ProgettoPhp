<html>
<body background="back.jpg">
<?php
require("Gigante.Filippo_connessioneDatabase.php");

if (isset($_POST["invia"])) {
    modifica();
} else if (isset($_POST["invio"])) {
    form();
} else {
    codice_dipendente();
}

function codice_dipendente()
{
    global $connessione;
    //$nomeFile = $_SERVER['PHP_SELF']; 
    echo <<< FORM
  <form action="?scelta=modifica" method="post">
  <fieldset>
  <h1>inserisci il codice del dipendente da modificare: </h1>
  <input type="number" min="0" name="cod" /><br /><br />
  <button type="submit" name="invio" class="btn btn-primary">Inserisci</button>
  <button type="reset" name="invio" class="btn btn-danger">Annulla</button>
	</fieldset>
  </form>
FORM;
    
}
function form()
{


    //$nomeFile = $_SERVER['PHP_SELF'];
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
    <form action="?scelta=modifica"  method="post">
      <input type="hidden" name="cod_dipendente"  value ="$cod_dipendente"> 
          <fieldset>
          <legend>Modifica dipendente</legend>
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
          <button type="submit" name="invia" class="btn btn-primary">Modifica</button>
          <button type="reset" class="btn btn-danger">Annulla</button>
          </fieldset>
    </form>
  END;
  
      mysqli_free_result($risultatoQuery);
}

function modifica()
{
    global $connessione;
    global $codice;
    $codice_dipendente = $_POST["cod_dipendente"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $data_nascita = $_POST["data_n"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $citta_nascita = $_POST["citta_n"];
    $residenza = $_POST["residenza"];

    $modifica = "UPDATE dipendenti SET "
    . "nome='$nome', "
    . "cognome='$cognome', "
    . "data_nascita='$data_nascita', "
    . "email='$email', "
    . "telefono='$telefono', "
    . "citta_nascita='$citta_nascita', "
    . "residenza='$residenza' "
    . "WHERE cod_dipendente ='$codice_dipendente'; ";

mysqli_query($connessione, $modifica) or die(mysqli_error($connessione));
echo "<h2>Aggiornamento avvenuto con successo, Grazie!</h2>";
mysqli_close($connessione);
}
?>
</body>
</html>