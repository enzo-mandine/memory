<?php

session_start();
include 'header.php';
?>
<div class='profil'>
    <a href="menu.php"><img src="images/back.png"></a>
    <div class='elementprofil'>
<?php
if (isset($_SESSION['login']))
    {
        $conn = mysqli_connect("localhost","root","","memory");
        $request = 'SELECT * FROM utilisateurs WHERE login = "'.$_SESSION['login'].'" ';
        $sql = mysqli_query($conn,$request);
        $row = mysqli_fetch_all($sql);
        $request2 = "SELECT * FROM `score` WHERE id_utilisateur=".$row[0][0]." ";
        $sql2 = mysqli_query($conn,$request2);
        $row2 = mysqli_fetch_all($sql2);

        $nbcartes = $row2[0][3];    


        echo '<h1>Bienvenue grand maitre';
        echo $row[0][1];
        echo'</h1>';

?>
<h2>Votre progression</h2>
<?php
echo $nbcartes;
echo '/24';
?>
<h2>Meilleur score</h2>
<?php
$flip = $row2[0][4];
echo $flip;
?>
<h3>modifiez vos infos </h3>

<form  action="profil.php" method="post">
    <label> Login :  </label>
    <input type="text" name="login" value = 
    <?php echo $row[0][1]; ?> />
    <label> Password :  </label></br>
    <input type="password" name="mdp" value = />
    <input type="submit" name="envoie" value="Modifier" />
</form>

<?php
        if (isset($_POST['modifier']))
        {
            $mdp = password_hash($_POST['mdp'],PASSWORD_BCRYPT,array('cost'=> 12));
            //cryptage mdp//
            $update = "UPDATE utilisateurs SET login ='".$_POST['login']."',email ='".$_POST['email']."',password = '$mdp' WHERE id = '".$row['id']."'";
            $query2 = mysqli_query($connexion,$update); 
        
        }

    }
else 
    {

        echo "Vous n'etes pas connecté veuillez vous connecté pour accédé a votre profil";
        echo '</br><a href="connexion.php">connexion</a>';

    }
?>
    </div>
</div>

