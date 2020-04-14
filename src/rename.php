<form action="" method="POST">
    <input type="submit" name="submit" value="">
</form>
<?php
$dir = "C:/wamp64/www/projets/memory/objv2/src/card/";
$array = scandir($dir);
// array_splice($array, 0, 2);
var_dump($array);

if (isset($_POST["submit"])) {
    foreach ($array as $key => $value) {
        rename("C:/wamp64/www/projets/memory/objv2/src/card/" . $value, "C:/wamp64/www/projets/memory/objv2/src/card/" . $key . ".png");
    }
}
// $value = "macarte.png";
// $key = 1;
// $toto = "C:/wamp64/www/projets/memory/objv2/src/card".$value;
// $tata = "C:/wamp64/www/projets/memory/objv2/src/card".$key.".png";
// echo '<p>'.$toto.'</p>';
// echo '<p>'.$tata.'</p>';
?>