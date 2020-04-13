<?php
include("cardobj.php");
session_start();
// Limit a remplacer par $_SESSION["limite"]
$limit = 24;
$limitValue = $limit / 2;

if (!isset($_SESSION["flip"])) {
    $_SESSION["flip"] = 0;
}

if (!isset($_SESSION["gameStart"])) {
    $_SESSION["gameStart"] = 'stop';
}

if (!isset($_SESSION["randBg"])) {
    $range = range(1, 100);
    $nrange = array_rand($range, $limitValue);
    $_SESSION["randBg"] = array_merge($nrange, $nrange);
}
if (!isset($_SESSION["validatedCard"])) {
    $_SESSION["validatedCard"] = [];
}
if (!isset($_SESSION["showCard"])) {
    $range = range(1, $limit);
    shuffle($range);
    $_SESSION["showCard"] = $range;
}
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
        $_SESSION["flippedCard"][] = $_SESSION["carte"][$i]->showName();
        $_SESSION["flippedCard"][] = $_SESSION["carte"][$i]->getValue();
        $_SESSION["carte"][$_SESSION["flippedCard"][0]]->changeStatusTo1();
        if (count($_SESSION["flippedCard"]) > 2) {
            if ($_SESSION["flippedCard"][1] != $_SESSION["flippedCard"][3]) {
                $_SESSION["carte"][$_SESSION["flippedCard"][2]]->changeStatusTo1();
                if (count($_SESSION["flippedCard"]) > 4) {
                    $_SESSION["carte"][$_SESSION["flippedCard"][0]]->changeStatusTo0();
                    $_SESSION["carte"][$_SESSION["flippedCard"][2]]->changeStatusTo0();
                    $_SESSION["carte"][$_SESSION["flippedCard"][4]]->changeStatusTo1();
                    array_splice($_SESSION["flippedCard"], 0, 4);
                }
            } else {
                $_SESSION["carte"][$_SESSION["flippedCard"][0]]->changeStatusTo1();
                $_SESSION["carte"][$_SESSION["flippedCard"][2]]->changeStatusTo1();
                $_SESSION["validatedCard"][] = $_SESSION["carte"][$_SESSION["flippedCard"][0]]->showName();
                $_SESSION["validatedCard"][] = $_SESSION["carte"][$_SESSION["flippedCard"][2]]->showName();
                array_splice($_SESSION["flippedCard"], 0, 4);
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
    <link rel="stylesheet" href="style.css">
</head>

<body class="gameBg">
    <div class="center">
        <form action="" method="POST">
            <input type="submit" name="newgame" value="New Game">
            <input type="submit" class="" value="reset" name="reset">
        </form>
        <form method="POST" class="grid">
            <?php
            // Génération du jeu
            if (($_SESSION["gameStart"]) == 'stop') {
                $_SESSION["flippedCard"] = [];
                for ($i = 1; $i < $limit + 1; $i++) {
                    $_SESSION["carte"][$i] = new card();
                    $name = $i;
                    $_SESSION["carte"][$i]->getName($name);
                    $_SESSION["carte"][$i]->setCard();
                }
                $_SESSION["gameStart"] = 'start';
            }
            // Affichage des cartes mélangées
            foreach ($_SESSION["showCard"] as $key => $value) {
                $_SESSION["carte"][$value]->showCard();
            }
            if (count($_SESSION["validatedCard"]) == $limit) {
                echo "GG MEC !";
                // sleep(3);
                // header("location:score.php");
            }
            ?>
        </form>
    </div>
</body>

</html>