<?php
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/style.css">
    <title>Memory</title>
</head>

<?php
if (isset($_POST["carte1"])) {
    $cardfront = "visible";
    $cardback = "hidden";
} else {
    $cardfront = "hidden";
    $cardback = "visible";
}
?>

<body>

    <main class="flexr center">
        <!-- <div class="game-wrapper"> -->
            <form action="" method="POST">
                <div class="grid">
                    <div>
                        <input id="carte1" type="submit" value="" class="input" name="carte1">
                        <div class="card-back <?php echo $cardback; ?>"></div>
                        <div class="card-front-1 <?php echo $cardfront; ?>"></div>
                    </div>
                    <input id="carte2" type="submit" value="" class="card-back" name="carte2">
                    <input id="carte3" type="submit" value="" class="card-back" name="carte3">
                    <input id="carte4" type="submit" value="" class="card-back" name="carte4">
                    <input id="carte5" type="submit" value="" class="card-back" name="carte5">
                    <input id="carte6" type="submit" value="" class="card-back" name="carte6">
                    <input id="carte7" type="submit" value="" class="card-back" name="carte7">
                    <input id="carte8" type="submit" value="" class="card-back" name="carte8">
                    <input id="carte9" type="submit" value="" class="card-back" name="carte9">
                    <input id="carte10" type="submit" value="" class="card-back" name="carte10">
                    <input id="carte11" type="submit" value="" class="card-back" name="carte11">
                    <input id="carte12" type="submit" value="" class="card-back" name="carte12">
                    <input id="carte13" type="submit" value="" class="card-back" name="carte13">
                    <input id="carte14" type="submit" value="" class="card-back" name="carte14">
                    <input id="carte15" type="submit" value="" class="card-back" name="carte15">
                    <input id="carte16" type="submit" value="" class="card-back" name="carte16">
                    <input id="carte16" type="submit" value="" class="card-back" name="carte17">
                    <input id="carte18" type="submit" value="" class="card-back" name="carte18">
                    <input id="carte19" type="submit" value="" class="card-back" name="carte19">
                    <input id="carte20" type="submit" value="" class="card-back" name="carte20">
                    <input id="carte21" type="submit" value="" class="card-back" name="carte21">
                    <input id="carte22" type="submit" value="" class="card-back" name="carte22">
                    <input id="carte23" type="submit" value="" class="card-back" name="carte23">
                    <input id="carte24" type="submit" value="" class="card-back" name="carte24">
                </div>
            </form>
        </div>
    </main>
</body>

</html>