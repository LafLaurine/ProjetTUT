<?php 
session_start();
if (!isset($_SESSION['nickname'])) {
    header("Location: ./index.php");
}?>

<!DOCTYPE html>
<html>
<head>
	<link href="./CSS/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<h2>Questionnaire</h2>
		<form action="./Traitements/traitementForm.php" class="formu" method="post">
			<div>
				<label for="name">Langue(s) parlé(es)</label><br>
				<input name="language" type="checkbox" value="Fr">Français<br>
				<input name="language" type="checkbox" value="Eng">Anglais<br>
				<input name="language" type="checkbox" value="All">Allemand<br>
				<input name="language" type="checkbox" value="Italien">Italien<br>
            </div>

            <div>
				<label for="temp">Température</label><br>
				<input name="temp" type="text">
            </div>

			<div>
				<div>
					<input name="submit" type="submit" value="Valider">
				</div>
			</div>
		</form>
	</div>
</body>
</html>