<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "memory");
$requestscore = 'SELECT * FROM score INNER JOIN utilisateurs ON score.id_utilisateur = utilisateurs.id ORDER BY scoretotal DESC';
$sql = mysqli_query($conn, $requestscore);
$rowscore = mysqli_fetch_all($sql);
?>
<div class="score">
<a id="back_score" href="menu.php"><img src="images/back.png"></a>
    <div class='top_scoreelement'></div>
    <div class='scoreelement'>
        <?php
        $i = 1;
        while ($i < count($rowscore)) {
            echo '<p> position :' . $i . '  score :  ' . $rowscore[$i][4] . '  utilisateurs :  ' . $rowscore[$i][7] . '  date : ' . $rowscore[$i][5] . '</p>';
            $i++;
        }
        ?>
                <?php
        $i = 1;
        while ($i < count($rowscore)) {
            echo '<p> position :' . $i . '  score :  ' . $rowscore[$i][4] . '  utilisateurs :  ' . $rowscore[$i][7] . '  date : ' . $rowscore[$i][5] . '</p>';
            $i++;
        }
        ?>        <?php
        $i = 1;
        while ($i < count($rowscore)) {
            echo '<p> position :' . $i . '  score :  ' . $rowscore[$i][4] . '  utilisateurs :  ' . $rowscore[$i][7] . '  date : ' . $rowscore[$i][5] . '</p>';
            $i++;
        }
        ?>        <?php
        $i = 1;
        while ($i < count($rowscore)) {
            echo '<p> position :' . $i . '  score :  ' . $rowscore[$i][4] . '  utilisateurs :  ' . $rowscore[$i][7] . '  date : ' . $rowscore[$i][5] . '</p>';
            $i++;
        }
        ?>        <?php
        $i = 1;
        while ($i < count($rowscore)) {
            echo '<p> position :' . $i . '  score :  ' . $rowscore[$i][4] . '  utilisateurs :  ' . $rowscore[$i][7] . '  date : ' . $rowscore[$i][5] . '</p>';
            $i++;
        }
        ?>
    </div>
    <div class='btm_scoreelement'></div>
</div>
<?php
include 'footer.php'
?>