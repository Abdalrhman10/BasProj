<?php 

include_once 'Database.php';

class Leverancier extends Database{

	public function insertLeverancier($conn, $naam, $inkoop, $verkoop, $voorraad, $minVoorraad, $maxVoorraad, $locatie, $levId){

        $sql = "INSERT INTO klant (artOmschrijving, artInkoop, artVerkoop, arVoorraad, artMinVoorraad, artMaxVoorraad, artLocatie, levid) VALUES ('$naam', '$inkoop', '$verkoop', '$voorraad', '$minVoorraad', '$maxVoorraad', '$levId')";

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectLeverancier(){

		$lijst = self::$conn->query("select * from 	artikel")->fetchAll();
		return $lijst;
        
	}

	public function getLeveranciers(){

		$sql = "SELECT DISTINCT klantnaam FROM klant";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getLeverancier($klant){

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

	public function deleteLeverancier($levId){

		$sql = "DELETE FROM leverancier WHERE levid = '$levId'";
		$stmt = self::$conn->prepare($sql);
        $stmt->execute();
 	}


}
?>