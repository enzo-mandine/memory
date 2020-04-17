<?php
session_start();
include 'header.php';
$_SESSION["validation"] = true;
function sql_request(string $request, bool $mdata = false, bool $sdata = false)
{
	$conn = mysqli_connect("localhost:3306", "enzo-mandine", "3SG1t13R", "enzo-mandine_memory");
	$query = mysqli_query($conn, $request);
	if ($mdata) {
		if ($sdata) {
			return mysqli_fetch_row($query);
		} else {
			return mysqli_fetch_all($query);
		}
	}
	mysqli_close($conn);
}
function required($form)
{
	foreach ($form as $input) {
		if (empty($input)) {
			return false;
		}
	}
	return true;
}
?>
<div class='inscriptionbg center'>
	<a href="index.php"><img src="images/back.png"></a>
	<form id="form_inscription" class="form" name="inscription" method="post" action="">
		<label for="login">Pseudo</label><br>
		<input class="type_texte" type="text" name="login" />
		<br>
		<label for="mdp">Mot de passe</label><br>
		<input class="type_texte" type="password" name="mdp" />
		<br>
		<label for="remdp">Confirmez votre mot de passe</label><br>
		<input class="type_texte" type="password" name="remdp" />
		<input id="submit_inscription" class="submit_btn" type="submit" name="envoie" value="Se connecter" />
	</form>
	<?php
	if (isset($_POST["envoie"])) {
		if (required($_POST)) {
			if ($_POST["mdp"] == $_POST["remdp"]) {
				$result = sql_request("SELECT * FROM `utilisateurs` WHERE login = '" . $_POST["login"] . "'", true);
				if (empty($result[0])) {
					sql_request("INSERT INTO utilisateurs (`id`, `login`, `password`) VALUES (NULL, '" . htmlspecialchars($_POST["login"]) . "', '" . password_hash($_POST["mdp"], PASSWORD_DEFAULT) . "');");
					echo "<p class='loghref'>Inscription validée</p>";
					header("Refresh: 1;url=connexion.php");
				} else {
					echo '<p class="err">Pseudo déjà pris</p>';
				}
			} else {
				echo '<p class="err">Mots de passes différents</p>';
			}
		} else {
			echo '<p class="err">Veuillez remplir tout les champs</p>';
		}
	}
	?>
</div>
<?php
include 'footer.php'
?>