<?php
session_start();
include 'header.php';
if (isset($_POST["envoie"])) {
	$conn = mysqli_connect("localhost", "root", "", "memory");
	$request = "SELECT * FROM utilisateurs WHERE login ='" . htmlspecialchars($_POST["login"]) . "'";
	$sql = mysqli_query($conn, $request);
	$row = mysqli_fetch_assoc($sql);
	if ($sql == TRUE) {
		if (password_verify($_POST["mdp"], $row["password"])) {
			$_SESSION["id"] = $row["id"];
			$_SESSION["login"] = $row["login"];
			$_SESSION["rang"] = $row["rang"];
			$_SESSION["connected"] = true;
			header("location:index.php");
		} else {
			echo "Mauvais password";
		}
	} else {
		echo "login inconnu";
	}
}
?>
<div class='connexionbg center'>
<a href="index.php"><img src="images/back.png"></a>
		<form class="form connexionelement" action="" method="post">
			<label for="login">Votre pseudo</label></br><br>
			<input class="type_texte" type="text" name="login" /><br></br>
			<label for="mdp">Votre mot de passe</label></br><br>
			<input class="type_texte" type="password" name="mdp" /></br>
			<p>pas encore de compte ?<a href='inscription.php'><br>inscrivez vous</a></p>
			<input id="submit_connexion" class="submit_btn" type="submit" value="Se connecter" name="envoie" />
		</form>
</div>

<?php
include 'footer.php'
?>