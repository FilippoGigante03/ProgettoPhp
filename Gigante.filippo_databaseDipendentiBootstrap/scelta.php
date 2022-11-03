<?php




$scelta = filter_input(INPUT_GET, 'scelta', FILTER_SANITIZE_STRING);


switch ($scelta) {
    case "inserimento":
        require 'Gigante.Filippo_inserimento.php';
        break;
    case "modifica":
        require 'Gigante.Filippo_modifica.php';
        break;
    case "cancella":
        require 'Gigante.Filippo_cancella.php';
        break;
    default:
        require 'elenco.php';
}