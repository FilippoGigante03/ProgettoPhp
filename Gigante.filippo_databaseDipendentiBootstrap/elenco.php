<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> prova database </title>
</head>
<body background="back.jpg">
    <?php
        require("Gigante.Filippo_connessioneDatabase.php");
        global $connessione;
        //Esecuzione della Query
        $query = "SELECT * FROM dipendenti";
        $result = mysqli_query($connessione , $query)
                or die("Query fallita");

        // mostra i risultati in una Tabella HTML

        echo "<table border=\"1\" class='table table-success table-striped'>\n";
    echo<<< TABELLA
        <thead>
        <tr>
            <th scope="col">Codice dipendente</th>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Data di nascita</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Citta di nascita</th>
            <th scope="col">Residenza</th>
        </tr>
        </thead>
    TABELLA;
        // Per ogni riga del RISULTATO della Query
        echo "\t<tbody>\n";
        while ($tabella = mysqli_fetch_assoc($result)) {
            echo "\t<tbody>\n";
            echo "\t<tr class='table-active'>\n";
                echo "\t\t<th scope='row'>" . $tabella["cod_dipendente"] . "</td>\n";
                echo "\t\t<td>" . $tabella["nome"] . "</td>\n";
                echo "\t\t<td>" . $tabella["cognome"] . "</td>\n";
                echo "\t\t<td>" . $tabella["data_nascita"] . "</td>\n";
                echo "\t\t<td>" . $tabella["email"] . "</td>\n";
                echo "\t\t<td>" . $tabella["telefono"] . "</td>\n";
                echo "\t\t<td>" . $tabella["citta_nascita"] . "</td>\n";
                echo "\t\t<td>" . $tabella["residenza"] . "</td>\n";
                echo "\t</tr>\n";
        }
        echo "\t<tbody>\n";
        echo"</tbody>";
        echo "</table>\n";

        /* Libera la memoria del risultato della query */
        mysqli_free_result($result);

        mysqli_close($connessione);
    ?>
</body>
</html>