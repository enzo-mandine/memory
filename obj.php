<?php
include("cardobj.php");
session_start();

$limit = 24;
if (!isset($_SESSION["arrayCard"])) {
    $range = range(1, $limit);
    shuffle($range);
    $array = $range;
    $_SESSION["arrayCard"] = $array;
}
$limitValue = $limit / 2;
if (!isset($_SESSION["cardValue"])) {
    $rangeValue = range(1, $limitValue);
    $_SESSION["cardValue"] = $rangeValue;
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
</head>

<body>
    <form action="" method="POST">
        <input type="submit" name="newgame" value="New Game">
        <input type="submit" class="" value="reset" name="reset">
    </form>
    <form method="POST">
        <?php
        if (isset($_POST["newgame"])) {
            for ($i = 0; $i < $limitValue; $i++) {
                $_SESSION["carte"][$i] = new card();
                $_SESSION["carte"][$i]->setCard();
            }
        }
        for ($i = 0; $i < $limitValue; $i++) {
            $_SESSION["carte"][$i]->showCard();
        }
        echo "<br>session carte";
        var_dump($_SESSION["carte"]);
        ?>
    </form>
</body>

</html>