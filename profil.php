<?php

session_start();
include 'header.php';
?>
<div class='profil'>
    <div class='elementprofil'>
        <a href="index.php"><img src="images/back.png"></a>
        <?php
        if (isset($_SESSION['login'])) {
            $conn = mysqli_connect("localhost:3306", "enzo-memory", "3SG1t13R", "enzo-mandine_memory");
            $request = 'SELECT * FROM utilisateurs WHERE id = "' . $_SESSION['id'] . '" ';
            $sql = mysqli_query($conn, $request);
            $row = mysqli_fetch_all($sql);
            $request2 = "SELECT * FROM `score` WHERE id_utilisateur=" . $row[0][0] . " ";
            $sql2 = mysqli_query($conn, $request2);
            $row42 = mysqli_fetch_all($sql2);
            $requestscore = "SELECT * FROM score  ORDER BY scoretotal DESC";
            $sql3 = mysqli_query($conn, $requestscore);
            $rowscore = mysqli_fetch_all($sql3);
            $nbcartes = 0;
            if ($row42 != null) {
                $nbcartes = $row42[0][3];
            }
            echo '<h1 id="title_profil">Bienvenue</br>';
            echo $row[0][1];
            echo '</h1>';
        ?>
            <h2>Votre progression</h2>
            <?php
            echo $nbcartes;
            echo '/24';
            ?>
            <h2>Meilleur score</h2>
            <?php
            if ($row42 != null) {
                $flip = $row42[0][4];

                echo '<p>' . $flip;
                $i = 0;


                while ($i < count($rowscore)) {
                    if ($rowscore[$i][1] == $_SESSION['id']) {
                        echo '  ' . $i;
                        if ($i == 1) {
                            echo 'er</p>';
                            break;
                        } else echo 'eme</p>';
                        break;
                    }
                    $i++;
                }
            } else {
                echo "<p>Aucun score</p>";
            }
            ?>
            <h3>modifiez vos infos </h3>

            <form action="profil.php" method="post">
                <label> Login : </label></br>
                <input type="text" name="login" class="type_texte" value=<?php echo $row[0][1]; ?> /></br>
                <label> Password : </label></br>
                <input type="password" class="type_texte" name="mdp" value= /></br>
                <input type="submit" class="submit_btn" name="modifier" value="Modifier" />
            </form>

        <?php
            if (isset($_POST['modifier'])) {
                $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT, array('cost' => 12));
                //cryptage mdp//
                $update = "UPDATE utilisateurs SET login ='" . $_POST['login'] . "',password = '$mdp' WHERE id = " . $row[0][0] . " ";
                $query2 = mysqli_query($conn, $update);
            }
        } else {

            echo "Vous n'etes pas connecté veuillez vous connecté pour accédé a votre profil";
            echo '</br><a href="connexion.php">connexion</a>';
        }
        ?>
    </div>
</div>

<?php
include 'footer.php'
?>