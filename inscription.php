<?php
session_start();
include 'header.php';
$_SESSION["validation"] = true;

if (isset($_POST["envoie"])) {
	if ($_POST["mdp"] == $_POST['remdp']) {
		echo "test";
		$conn     = mysqli_connect("localhost", "root", "", "memory");
		$request  = "SELECT login FROM utilisateurs";
		$query    = mysqli_query($conn, $request);
		$response = mysqli_fetch_all($query);

		$count = 0;
		while ($count < count($response)) {
			if ($response[$count][0] == $_POST["login"]) {
				$_SESSION["validator"] = false;
				header("location:inscription.php");
			}
			$count++;
		}

		if ($_SESSION["validation"]) {
			$request = "INSERT INTO utilisateurs (`id`,`login`,`password`) VALUES (NULL,'" . $_POST["login"] . "','" . password_hash($_POST["mdp"], PASSWORD_BCRYPT) . "');";
			mysqli_query($conn, $request);
			header("location:connexion.php");
		}
	}
}

?>
<div class='inscriptionbg center'>
	<a href="menu.php"><img src="images/back.png"></a>
	<form id="form_inscription" class="form" name="inscription" method="post" action="">
		<label for="login">Pseudo</label>
		<input class="type_texte" type="text" name="login" />
		<br>
		<label for="mdp">Mot de passe</label>
		<input class="type_texte" type="password" name="mdp" />
		<br>
		<label for="remdp">Confirmez votre mot de passe</label>
		<input class="type_texte" type="password" name="remdp" />
		<input id="submit_inscription" class="submit_btn" type="submit" name="envoie" value="Se connecter" />
	</form>
</div>
<?php
include 'footer.php'
?>