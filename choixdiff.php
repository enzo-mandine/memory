<?php
session_start();
include 'header.php';
if (isset($_SESSION['login']))
{
    echo'<div class="choixdiff"><div class="elementchoixdiff"><a href="menu.php"><img src="images/back.png"></a>';
    ?>
    <h1>choix de la dificultée</h1>
    <form method="post">
        <select name="option" >
            <?php
                $i=3;
                while($i<=50)
                {
                    $ii = $i*2;
                    echo"<option name='$i' value='$ii'>$i paires</option> ";
                    $i++;
                }
            ?>
        </select>
        
        <input type="submit" name="caca" />
    </form>
</div></div>
    <?php

if (isset($_POST['caca']))
{

    $_SESSION['limite']=$_POST['option'];
    var_dump($_SESSION['limite']);
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
}
else{
    echo '<p> veillez vous connecter </p>';
}
include 'footer.php';
?>