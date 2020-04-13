<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost","root","","memory");
$requestscore ='SELECT * FROM score ORDER BY scoretotal DESC';
$sql = mysqli_query($conn,$requestscore);
$rowscore = mysqli_fetch_all($sql);

$requestnbrcartes = 'SELECT DISTINCT(nbrcartes) FROM score ORDER BY nbrcartes DESC';
$sql3 = mysqli_query($conn,$requestnbrcartes);
$rownbrcartes = mysqli_fetch_all($sql3);

$requestutt = 'SELECT * FROM utilisateurs';
$sql2 = mysqli_query($conn,$requestutt);
$rowutt = mysqli_fetch_assoc($sql2);
$i = 0;
$ii = 0;
/* var_dump($rownbrcartes); 
var_dump($rowscore); 
var_dump($rowutt); 
 var_dump($rowscore[0][3]);
var_dump($rownbrcartes[0][0]);  */
?>
<div class="score">
<a href="menu.php"><img src="images/back.png"></a>
    <div class='scoreelement'>
<?php
while($i<count($rownbrcartes))
{

    echo $rownbrcartes[$i][0];
    if($rownbrcartes[$i][0] != 24)
    {
        echo '</p>LES SOUS MERDE</p> </br>';
        
    }
    while ($rowscore[0][3]==$rownbrcartes[$ii][0])
    {
        if($rownbrcartes[$i][0] == 24)
        {
            echo '<p> TOP 1/2/3</p></br>';
            

            
        }
        $ii = $ii+1;
    }
    $i = $i+1;
}

?>
    </div></div>