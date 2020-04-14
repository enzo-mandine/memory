<?php
class game extends card {
    public function test(){
$limit = $_SESSION['limite'];
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
}
}
?>