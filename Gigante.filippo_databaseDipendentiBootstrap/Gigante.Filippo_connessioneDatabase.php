<?php
$nomehost='localhost';
$username='root';
$password='';
$database='5a_filippo.gigante_dipendenti';
$connessione = mysqli_connect($nomehost, $username, $password, $database) 
    or die(mysqli_error($connessione));

?>