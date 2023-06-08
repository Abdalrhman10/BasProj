<?php 

include 'Database.php';

class Artikel extends Database{

	public function insertArtikel($conn, $naam, $inkoop, $verkoop, $voorraad, $minVoorraad, $maxVoorraad, $locatie, $levId){

        $sql = "INSERT INTO artikel (artOmschrijving, artInkoop, artVerkoop, arVoorraad, artMinVoorraad, artMaxVoorraad, artLocatie, levid) VALUES ('$naam', '$inkoop', '$verkoop', '$voorraad', '$minVoorraad', '$maxVoorraad',$locatie, '$levId')";

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectArtikel(){

		$lijst = self::$conn->query("select * from 	artikel")->fetchAll();
		return $lijst;
        
	}

	public function getArtikelen(){

		$sql = "SELECT DISTINCT artOmschrijving FROM artikel";

		$stmt = self::$conn->query($sql);

		$artikel = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $artikel;
	}

	public function getArtiekl($conn,$naam){

		$sql = "SELECT * FROM artikel WHERE artOmschrijving = '$naam'";

		$stmt = self::$conn->query($sql);

        $artikel = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $artikel;
	}

	public function getIds($conn){

		$sql = "SELECT artid FROM artikel";

		$stmt = self::$conn->query($sql);

        $artikel = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $artikel;
	}

	public function getId($conn,$id){

		$sql = "SELECT * FROM artikel WHERE `artid` = '$id'";

		$stmt = self::$conn->query($sql);

        $artikel = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $artikel;
	}

	public function deleteKlant($nr){

		try{
			$sql = "DELETE FROM `Klant` WHERE `klantid` = '$nr'";
			$stmt = self::$conn->prepare($sql);
        	$stmt->execute();

        	echo '<script>alert("Klant verwijderd")</script>';

       	 	echo "<script> location.replace('selectklant.php'); </script>";
   	 	} catch(Exception) {
   	 		echo '<script>alert("Er staat nog een verkooporder open onder deze klant")</script>';
   	 	}
 	}

	public function showTable($lijst){
		
		
		echo "<table>";
		echo "<tr><th>ID</th><th>Naam</th><th>Verkoop</th><th>Voorraad</th><th>MinVoorraad</th><th>MaxVoorraad</th><th>Locatie</th></th></tr>";
		foreach($lijst as $row) {
			
			
			echo "<tr>";
			echo "<td>" . $row["artid"] . "</td>";
			echo "<td>" . $row["artOmschrijving"] . "</td>";
			//echo "<td>" . $row["artInkoop"] . "</td>";
			echo "<td>" . $row["artVerkoop"] . "</td>";
			echo "<td>" . $row["artVoorraad"] . "</td>";
			echo "<td>" . $row["artMinVoorraad"] . "</td>";
			echo "<td>" . $row["artMaxVoorraad"] . "</td>";
			echo "<td>" . $row["artLocatie"] . "</td>";
			//echo "<td>" . $row["levid"] . "</td>";
			echo "</tr>";
			
		
			
		}
		echo "</table>";
	}

}
?>