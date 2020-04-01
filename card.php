<?php
include("cardobj.php");
session_start();
$limit = 24;
$range = range(1, $limit);
var_dump($range);
if (isset($_POST["newgame"])) {
    if (!isset($_SESSION["arrayCard"])) {
        shuffle($range);
        $array = $range;
        $_SESSION["arrayCard"] = $array;
    } else {
        $array = range(1, 24);
    }
}
$toto = new card();
$toto->setCard();
// $toto->showCard();
echo "session arrayCard";
if (isset($_SESSION["arrayCard"])) {
    var_dump($_SESSION["arrayCard"]);
}

// State button -----------------------------
if (isset($_POST["carte1"])) {
    $check = "1";
    $value = "carte1";

    $_SESSION["current"][] = $value;
    $_SESSION["check"][] = $check;
}

if (isset($_POST["carte2"])) {
    $check = "2";
    $value = "carte2";

    $_SESSION["current"][] = $value;
    $_SESSION["check"][] = $check;
}

if (isset($_POST["carte3"])) {
    $check = "1";
    $value = "carte3";

    $_SESSION["current"][] = $value;
    $_SESSION["check"][] = $check;
}

if (isset($_POST["carte4"])) {
    $check = "2";
    $value = "carte4";

    $_SESSION["current"][] = $value;
    $_SESSION["check"][] = $check;
}
// SESSION
if (!isset($_SESSION["valide"])) {
    $_SESSION["valide"] = [];
}

if (!isset($_SESSION["current"])) {
    $_SESSION["current"] = [];
}
if (!isset($_SESSION["check"])) {
    $_SESSION["check"] = [];
}
// if (count($_SESSION["current"]) == 3) {
//     unset($_SESSION["current"]);
//     $_SESSION["current"] = [];
// }

// if (count($_SESSION["check"]) == 3) {
//     unset($_SESSION["check"]);
//     $_SESSION["check"] = [];
// }

if (!isset($_SESSION["flip"])) {
    $_SESSION["flip"] = 0;
}

for ($i = 0; $i < 5; $i++) {
    if (isset($_POST["carte" . $i])) {
        $_SESSION["flip"]++;
        $_SESSION["carte" . $i]["face"] = "visible";
        $_SESSION["carte" . $i]["back"] = "hidden";
    }
}

if (isset($_SESSION["check"][0]) && isset($_SESSION["check"][1])) {
    if ($_SESSION["check"][0] != null && $_SESSION["check"][1] != null) {
        if ($_SESSION["check"][0] == $_SESSION["check"][1]) {
            $_SESSION["valide"][] = [$_SESSION["check"][0], $_SESSION["check"][1]];
            $_SESSION["check"] = [];
        } else {
            unset($_SESSION[$_SESSION["current"][0]]);
            unset($_SESSION[$_SESSION["current"][1]]);
            $_SESSION["check"] = [];
        }
    }
}


if (isset($_POST["reset"])) {
    session_destroy();
    header("location:card.php");
}
echo 'valide';
var_dump($_SESSION["valide"]);
echo 'flip session';
var_dump($_SESSION["flip"]);
echo 'check session';
var_dump($_SESSION["check"]);
echo 'check current';
var_dump($_SESSION["check"]);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="submit" name="newgame" value="New Game" />
    </form>
    <form action="" method="POST" class="flex">
        <div id="grid">
            <div class="card1">
                <input type="submit" class="<?php if (isset($_SESSION["carte1"]["back"])) {
                                                echo $_SESSION["carte1"]["back"];
                                            } ?>" value="carte1" name="carte1">
                <div class="card">
                    <div class="face <?php if (isset($_SESSION["carte1"]["face"])) {
                                            echo $_SESSION["carte1"]["face"];
                                        } ?>"></div>
                    <div class="back <?php if (isset($_SESSION["carte1"]["back"])) {
                                            echo $_SESSION["carte1"]["back"];
                                        } ?>"></div>
                </div>
            </div>
            <div class="card2">
                <input type="submit" class="<?php if (isset($_SESSION["carte2"]["back"])) {
                                                echo $_SESSION["carte2"]["back"];
                                            } ?>" value="carte2" name="carte2">
                <div class="card">
                    <div class="face <?php if (isset($_SESSION["carte2"]["face"])) {
                                            echo $_SESSION["carte2"]["face"];
                                        } ?>"></div>
                    <div class="back <?php if (isset($_SESSION["carte2"]["back"])) {
                                            echo $_SESSION["carte2"]["back"];
                                        } ?>"></div>
                </div>
            </div>
            <div class="card3">
                <input type="submit" class="<?php if (isset($_SESSION["carte3"]["back"])) {
                                                echo $_SESSION["carte3"]["back"];
                                            } ?>" value="carte3" name="carte3">
                <div class="card">
                    <div class="face <?php if (isset($_SESSION["carte3"]["face"])) {
                                            echo $_SESSION["carte3"]["face"];
                                        } ?>"></div>
                    <div class="back <?php if (isset($_SESSION["carte3"]["back"])) {
                                            echo $_SESSION["carte3"]["back"];
                                        } ?>"></div>
                </div>
            </div>
            <div class="card4">
                <input type="submit" class="<?php if (isset($_SESSION["carte4"]["back"])) {
                                                echo $_SESSION["carte4"]["back"];
                                            } ?>" value="carte4" name="carte4">
                <div class="card">
                    <div class="face <?php if (isset($_SESSION["carte4"]["face"])) {
                                            echo $_SESSION["carte4"]["face"];
                                        } ?>"></div>
                    <div class="back <?php if (isset($_SESSION["carte4"]["back"])) {
                                            echo $_SESSION["carte4"]["back"];
                                        } ?>"></div>
                </div>
            </div>
        </div>
        <input type="submit" class="" value="reset" name="reset">
    </form>
</body>

</html>