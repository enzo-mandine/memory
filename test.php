<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            if (!isset($_SESSION["carte" . $i])) {
                $_SESSION["carte" . $i] = [];
            }
            echo "<input type='submit' class='' name='btn" . $i . "'</input>";
            if (isset($_POST["btn" . $i])) {
                $_SESSION["carte" . $i]["status"] = "flipped";
            }
        }
        ?>
    </form>

</body>

</html>
<?php var_dump($_SESSION); ?>