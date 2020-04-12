<?php
include("cardobj.php");
session_start();

if (!isset($_SESSION["flip"])) {
    $_SESSION["flip"] = 0;
}
if (!isset($_SESSION["validatedCard"])) {
    $_SESSION["validatedCard"] = [];
}
$limit = 2;
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


for ($i = 1; $i < $limit + 1; $i++) {
    if (isset($_POST[$i])) {
        $_SESSION["flip"]++;
        $_SESSION["validatedCard"][] = $_SESSION["carte"][$i]->showName();
        $_SESSION["flippedCard"][] = $_SESSION["carte"][$i]->showName();
        $_SESSION["flippedCard"][] = $_SESSION["carte"][$i]->getValue();

        if (count($_SESSION["flippedCard"]) < 2) {
            $_SESSION["carte"][$_SESSION["flippedCard"][0]]->changeStatusTo1();
        }
        
        if (count($_SESSION["flippedCard"]) > 2) {
            if ($_SESSION["flippedCard"][1] != $_SESSION["flippedCard"][3]) {
                $_SESSION["carte"][$_SESSION["flippedCard"][0]]->changeStatusTo0();
                $_SESSION["carte"][$_SESSION["flippedCard"][2]]->changeStatusTo0();
                unset($_SESSION["flippedCard"]);
                $_SESSION["flippedCard"] = [];
            } else {
                $_SESSION["carte"][$_SESSION["flippedCard"][0]]->changeStatusTo1();
                $_SESSION["carte"][$_SESSION["flippedCard"][2]]->changeStatusTo1();
                unset($_SESSION["flippedCard"]);
                $_SESSION["flippedCard"] = [];
            }
        }
        header("location:obj.php");
    }
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
            $_SESSION["flippedCard"] = [];
            for ($i = 1; $i < $limit + 1; $i++) {
                $_SESSION["carte"][$i] = new card();
                $name = $i;
                $_SESSION["carte"][$i]->getName($name);
                $_SESSION["carte"][$i]->setCard();
            }
        }
        // Affichage des cartes mélangées
        foreach ($_SESSION["showCard"] as $key => $value) {
            $_SESSION["carte"][$value]->showCard();
        }
        if (count($_SESSION["validatedCard"]) == $limit) {
            echo "GG MEC !";
        }
        ?>
    </form>
</body>

</html>

<?php

?>