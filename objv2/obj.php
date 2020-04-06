<?php
include("cardobj.php");
session_start();

if (!isset($_SESSION["flip"])) {
    $_SESSION["flip"] = 0;
}

$limit = 24;
if (!isset($_SESSION["showCard"])) {
    $range = range(1, $limit);
    shuffle($range);
    $_SESSION["showCard"] = $range;
}

$limitValue = $limit / 2;
if (!isset($_SESSION["cardValue"])) {
    $rangeValue = range(1, $limitValue);
    $_SESSION["cardValue"] = array_merge($rangeValue, $rangeValue);
}

if (isset($_POST["reset"])) {
    session_destroy();
    session_start();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <form action="" method="POST">
        <input type="submit" name="newgame" value="New Game">
        <input type="submit" class="" value="reset" name="reset">
    </form>
    <form method="POST" class="grid">
        <?php
        // Génération du jeu
        if (isset($_POST["newgame"])) {
            for ($i = 1; $i < $limit + 1; $i++) {
                $_SESSION["carte"][$i] = new card();
                $_SESSION["carte"][$i]->setCard();
            }
        }
        // Affichage des cartes mélangées
        foreach ($_SESSION["showCard"] as $key => $value) {
            $_SESSION["carte"][$value]->showCard();
        }
        ?>
    </form>
</body>

</html>

<?php
for ($i = 1; $i < $limit + 1; $i++) {
    if (isset($_POST[$i])) {
        $_SESSION["flip"]++;
        $_SESSION["flippedCard"][] = $_SESSION["carte"][$i]->getValue();
        var_dump($_SESSION["carte"][$i]);
        var_dump($_SESSION["flippedCard"]);
        var_dump($_SESSION["flip"]);
    }
}

// var_dump($_SESSION);
