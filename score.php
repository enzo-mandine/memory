<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "memory");
$requestscore = 'SELECT * FROM score INNER JOIN utilisateurs ON score.id_utilisateur = utilisateurs.id ORDER BY scoretotal DESC';
$sql = mysqli_query($conn, $requestscore);
$rowscore = mysqli_fetch_all($sql);
?>
<div class="score">
    <a href="menu.php"><img src="images/back.png"></a>
    <div class='scoreelement'>
        <?php
        $i = 1;
        while ($i < count($rowscore)) {
            echo '<p> position :' . $i . '  score :  ' . $rowscore[$i][4] . '  uttilisateurs :  ' . $rowscore[$i][7] . '  date : ' . $rowscore[$i][5] . '</p>';
            $i++;
        }
        ?>
    </div>
</div>
<?php
include 'footer.php'
?>