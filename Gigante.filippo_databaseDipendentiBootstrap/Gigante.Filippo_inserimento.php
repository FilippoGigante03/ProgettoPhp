<html>
<body background="back.jpg">
<?php

require("Gigante.Filippo_connessioneDatabase.php");

    if (isset($_POST["invia"]))
        Inserimento();
    else
        Form();



function Form(){
    //$nomeFile = $_SERVER['PHP_SELF']; 
    echo <<< FORM
  <form action="?scelta=inserimento" method="post">
  <fieldset>
		<legend>Inserimento Dipendente:</legend>
		<label>Nome:</label>
		<input type="text" size="30"  name="nome" required /><br /><br />
		<label>Cognome:</label>
		<input type="text" size="30" name="cognome" /><br /><br />
		<label>data di nascita:</label>
		<input type="date" name="data_n" /><br /><br />     
		<label>email</label>
        <input type="text" size="45" name="email" /><br /> <br />
        <label>telefono</label>
        <input type="text" size="30" name="telefono" /><br /> <br />
        <label>citta di nascita:</label>
        <input type="text" size="30" name="citta_n" /><br /> <br />
        <label>residenza:</label>
        <input type="text" size="30" name="residenza" /><br /> <br />
        <button type="submit" name="invia" class="btn btn-primary">Inserisci</button>
        <button type="reset" class="btn btn-danger">Annulla</button> 
	</fieldset>
  </form>
FORM;
}
function Inserimento(){
    global $connessione;
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $data_nascita = $_POST["data_n"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $citta_nascita = $_POST["citta_n"];
    $residenza = $_POST["residenza"];

    $sqlString = "INSERT INTO dipendenti"
            . "(cod_dipendente, nome, cognome, data_nascita, email,"
            . " telefono, citta_nascita,residenza)"
            . " VALUES (NULL, '$nome', '$cognome', '$data_nascita','$email',"
            . "'$telefono', '$citta_nascita','$residenza')";

    mysqli_query($connessione, $sqlString) or die(mysqli_error($connessione));
    echo "<h2>dipendente registrato, Grazie!</h2>";
    mysqli_close($connessione);
}
?>
</body>
</html>