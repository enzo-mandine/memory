<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost:3306", "enzo-mandine", "3SG1t13R", "enzo-mandine_memory");
$requestscore = 'SELECT * FROM score INNER JOIN utilisateurs ON score.id_utilisateur = utilisateurs.id ORDER BY scoretotal DESC';
$sql = mysqli_query($conn, $requestscore);
$rowscore = mysqli_fetch_all($sql);
?>
<div class="score">
    <a id="back_score" href="index.php"><img src="images/back.png"></a>
    <div class='top_scoreelement'></div>
    <?php
    $i = 1;

/*     echo date("d-m-Y", strtotime($rowscore[2][3]));
    die; */
/*     var_dump($rowscore); */
    while ($i < count($rowscore)) {
        if ($i == 1)
        {
            echo '<div class="scoreelement"><p class="gold"> ' . $i . 'er    ' . $rowscore[$i][7] .'      ' . $rowscore[$i][4] . '  pts  ' . '</p></div>';
        $i++;
        }
        else if ($i == 2)
        {
            echo '<div class="scoreelement"><p class="silver"> ' . $i . 'nd    ' . $rowscore[$i][7] .'      ' . $rowscore[$i][4] . '  pts  '  . '</p></div>';
        $i++;
        }
        else if ($i == 3)
        {
            echo '<div class="scoreelement"><p class="bronze"> ' . $i . 'eme   ' . $rowscore[$i][7]  .'      '. $rowscore[$i][4] . '  pts  '  . '</p></div>';
        $i++;
        }
        else
        {
            echo '<div class="scoreelement"><p> ' . $i . 'eme    ' . $rowscore[$i][7] .'      ' . $rowscore[$i][4] . '  pts  '  .'</p></div>';
            $i++;
        }
        
        
    }
    ?>
    <div class='btm_scoreelement'></div>
</div>
<?php
include 'footer.php'
?>