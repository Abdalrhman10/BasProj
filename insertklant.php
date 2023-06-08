<!DOCTYPE html>
<html>
<body>
	<h1>Voeg klant toe</h1>

	<form action="insertKlant.php" method="post">
		<input type="text" name="klantnaam" placeholder="klantnaam" required> *</br>
		<input type="text" name="klantemail" placeholder="e-Mail adres"required> *</br>
		<input type="text" name="klantadres" placeholder="Adres" required> *</br>
		<input type="text" name="klantpostcode" placeholder="Postcode" required> *</br>
		<input type="text" name="klantwoonplaats" placeholder="Woonplaats" required> *</br></br>
		<input type="submit" name="submit" value="Klant toevoegen">
	</form>

	<a href="index.php">Terug naar de hoofdpagina</a>

	<?php 

	if(isset($_POST['submit'])){
		//include "classes/Database.php";
		include 'classes/klant.php';
		//$conn = new Database();

		$naam = $_POST['klantnaam'];
		$mail = $_POST['klantemail'];
		$adres = $_POST['klantadres'];
		$postcode = $_POST['klantpostcode'];
		$woonplaats = $_POST['klantwoonplaats'];

		$klant = new Klant();
		$klant->insertKlant($naam, $mail, $adres, $postcode, $woonplaats);
	}

	if(isset($klant) && $klant == true){
		echo '<script>alert("Klant toegevoegd")</script>';
        echo "<script> location.replace('index.php'); </script>";
	} 

	?>
</body>
</html>