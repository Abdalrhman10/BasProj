<?php 

include 'Database.php';

class Klant extends Database{

	public function insertKlant($naam, $mail, $adres, $postcode, $woonplaats){

        $sql = "INSERT INTO klant (klantnaam, klantemail, klantadres, klantpostcode, klantwoonplaats) VALUES ('$naam', '$mail', '$adres', '$postcode', '$woonplaats')";

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectKlant(){
		$lijst = self::$conn->query("select * from 	klant")->fetchAll();
		return $lijst;
        
	}

	public function getKlanten(){

		$lijst = self::$conn->query("select * from 	klant")->fetchAll();
		return $lijst;
	}

	public function getKlant($conn, $klant){

		$sql = "SELECT * FROM klant WHERE klantnaam = '$klant'";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getIds($conn){

		$sql = "SELECT klantid FROM klant";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getId($conn, $id){

		$sql = "SELECT * FROM klant WHERE `klantid` = '$id'";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function deleteKlant($nr, $conn){

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
		echo "<tr><th>ID</th><th>Naam</th><th>Email</th><th>Adres</th><th>Postcode</th><th>Woonplaats</th></tr>";
		foreach($lijst as $row) {
			
			
			echo "<tr>";
			echo "<td>" . $row["klantid"] . "</td>";
			echo "<td>" . $row["klantnaam"] . "</td>";
			echo "<td>" . $row["klantemail"] . "</td>";
			echo "<td>" . $row["klantadres"] . "</td>";
			echo "<td>" . $row["klantpostcode"] . "</td>";
			echo "<td>" . $row["klantWoonplaats"] . "</td>";
			echo "</tr>";
			
		
			
		}
		echo "</table>";
	}

}


?>