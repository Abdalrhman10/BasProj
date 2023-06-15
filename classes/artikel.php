<?php 

include 'Database.php';

class Artikel extends Database{

	public function insertArtikel($conn, $naam, $inkoop, $verkoop, $voorraad, $minVoorraad, $maxVoorraad, $locatie, $levId){

        $sql = "INSERT INTO klant (artOmschrijving, artlnkoop, artVerkoop, arVoorraad, artMinVoorraad, artMaxVoorraad, artLocatie, levid) VALUES ('$naam', '$inkoop', '$verkoop', '$voorraad', '$minVoorraad', '$maxVoorraad', '$levId')";

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectArtikel(){

		$lijst = self::$conn->query("select * from 	artikel")->fetchAll();
		return $lijst;
        
	}

	public function getArtikelen(){

		$sql = "SELECT DISTINCT klantnaam FROM klant";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getArtiekl($klant){

		$sql = "SELECT * FROM klant WHERE klantnaam = '$klant'";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getIds(){

		$sql = "SELECT klantid FROM klant";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getId($id){

		$sql = "SELECT * FROM klant WHERE `klantid` = '$id'";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}



	public function deleteArtikel($artId){

		$sql = "DELETE FROM artikel WHERE artid = '$artId'";
		$stmt = self::$conn->prepare($sql);
        $stmt->execute();
 	}

	public function showTable($lijst){
		
		
		echo "<table>";
		echo "<tr><th>ID</th><th>Naam</th><th>Inkoop</th><th>Verkoop</th><th>Voorraad</th><th>MinVoorraad</th><th>MaxVoorraad</th><th>Locatie</th><th>levId</th></th></tr>";
		foreach($lijst as $row) {
			
			
			echo "<tr>";
			echo "<td>" . $row["artid"] . "</td>";
			echo "<td>" . $row["artOmschrijving"] . "</td>";
			echo "<td>" . $row["artlnkoop"] . "</td>";
			echo "<td>" . $row["artVerkoop"] . "</td>";
			echo "<td>" . $row["artVoorraad"] . "</td>";
			echo "<td>" . $row["artMinVoorraad"] . "</td>";
			echo "<td>" . $row["artMaxVoorraad"] . "</td>";
			echo "<td>" . $row["artLocatie"] . "</td>";
			echo "<td>" . $row["levid"] . "</td>";
			echo "</tr>";
			
		
			
		}
		echo "</table>";
	}

}
?>