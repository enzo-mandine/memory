<?php

session_start();

//------------------------------------- Gestion de l'emplacement des cartes -------------------------------------------------------------------//
// Method Grid ----------------------------------------------------------------------------------------------------------------------------------
echo "Method Grid<br>";
$grid = range(1, 24);                                                   // Nombre de carte en jeu

if (!isset($_SESSION["grid"])) {                                        // Si notre array n'a jamais été mélanger
    shuffle($grid);                                                     // On mélange l'array
    $_SESSION["grid"] = $grid;                                          // On stock le résultat dans une $_SESSION

} else {
    $grid = range(1, 24);                                               // Sinon on mélange l'array
}


// Affichage des résultat (facultatif)
if (!isset($_SESSION["grid"])) {
    foreach ($grid as $nombre) {
        echo $nombre . " ";
    }
} else {
    foreach ($_SESSION["grid"] as $nombre) {
        echo $nombre . " ";
    }
}

if (isset($_POST["resetGrid"]) && isset($_SESSION["grid"])) {           // Si mon boutton est clické et que $_SESSION["grid"] existe
    unset($_SESSION["grid"]);                                           // Reset l'orde de l'array
    header("location:game-function.php");                               // Renvoie sur la page
}

//-----------------------------------------------------------------------------------------------------------------------------------------------
echo "<br>";
//-----------------------------------------------------------------------------------------------------------------------------------------------
// Method shuffle($array) -----------------------------------------------------------------------------------------------------------------------
echo "Method shuffle array<br>";
$limit = 24;                                                            // Nombre de cartes en jeux
$array = range(1, ($limit - 1));                                        // Crée un array contenant tout les nombres entre 0 et $limit -1



if (!isset($_SESSION["array"])) {                                       // Si notre array n'a jamais été mélanger
    shuffle($array);                                                    // On mélange l'array
    $_SESSION["array"] = $array;                                        // On stock le résultat dans une $_SESSION
} else {
    $array = range(1, 24);                                               // Sinon on mélange l'array
}


// Affichage des résultat (facultatif)
if (!isset($_SESSION["array"])) {
    foreach ($array as $nombre) {
        echo $nombre . " ";
    }
} else {
    foreach ($_SESSION["array"] as $nombre) {
        echo $nombre . " ";
    }
}

if (isset($_POST["resetArray"]) && isset($_SESSION["array"])) {         // Si mon boutton est clické et que $_SESSION["array"] existe
    unset($_SESSION["array"]);                                          // Reset l'orde de l'array
    header("location:game-function.php");                               // Renvoie sur la page
}


?>
<!-- Formulaire de Reset -->
<form action="" method="POST">
    <input type="submit" value="reset array" name="resetGrid">
    <input type="submit" value="reset array" name="resetArray">
</form>