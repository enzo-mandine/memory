<?php
session_start();
include 'header.php';
if (isset($_SESSION['login']))
{
    echo'<div class="choixdiff"><div class="elementchoixdiff"><a href="menu.php"><img src="images/back.png"></a>';
    ?>
    <h1>choix de la dificultéE</h1>
    <form method="post">
        <select name="option" >
            <?php
                $i=3;
                while($i<=50)
                {
                    echo"<option name='$i' value='$i'>$i paires</option> ";
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
    header('Location:objv2/obj.php');
}
}
else{
    echo '<p> veillez vous connecter </p>';
}
include 'footer.php';
?>