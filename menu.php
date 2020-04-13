
<?php
session_start();
include 'header.php';
echo '<div class="menu">';
echo '<div class="liensmenu">';
echo '<div class="logo"><h1>STONEFIRE TAVERN<h1></div>';
if (isset($_SESSION["login"]))
{
    echo "<a class='btn' href='profil.php'><h1>Profil</h1></a>";
}
else
{
    echo "<a class='btn' href='connexion.php'><h1>Connexion</h1></a>";
}
?>

<a class='btn' href='game.php'><h1>New game</h1></a>
<a class='btn' href='score.php'><h1>Scores</h1></a>
</div>
</div>

