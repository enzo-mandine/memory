<?php
session_start();
include 'header.php';
if (isset($_SESSION['login'])) {
?>
    <div id="wrapper_lvl">
        <div id="wrapperform_lvl">
        </div>
        <a id="back_lvl" href="index.php"><img src="images/back.png"></a>
        <form method="post" id="form_lvl">
            <h1 id="titre_form_lvl">choix de la dificultée</h1>
            <br>
            <br>
            <select id="submit_lvl" name="option" class="submit_btn">
                <?php
                $i = 3;
                while ($i <= 50) {
                    $ii = $i * 2;
                    echo "<option name='$i' value='$ii'>$i paires</option> ";
                    $i++;
                }
                ?>
            </select>
            <input type="submit" class="submit_btn" name="dif_select" />
        </form>
    </div>
<?php

    if (isset($_POST['dif_select'])) {

        $_SESSION['limite'] = $_POST['option'];
        var_dump($_POST["option"]);
        var_dump($_SESSION['limite']);
        // die;
        unset($_SESSION['flip']);
        unset($_SESSION['gameStart']);
        unset($_SESSION['randBg']);
        unset($_SESSION['showCard']);
        unset($_SESSION['cardValue']);
        unset($_SESSION['flippedCard']);
        unset($_SESSION['validatedCard']);
        unset($_SESSION['carte']);
        header('Location:obj.php');
    }
} else {
    echo '<p> veillez vous connecter </p>';
}
include 'footer.php';
?>