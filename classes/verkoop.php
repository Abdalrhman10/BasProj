<?php

require_once 'Database.php';

class Verkoop extends Database{

	public function insertVerkoop($klantId, $artId, $aantal){

		$datum = date("Y-m-d");

        $sql = "INSERT INTO verkoopoder (klantid, artid, verkOrdDatum, verkOrdBestAantal, verkOrdStatus) VALUES ('$klantId', '$artId', '$datum', '$aantal', 1 )";

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectVerkoop(){

		$lijst = self::$conn->query("select * from 	verkoopoder")->fetchAll();
		return $lijst;
        
	}

	public function printTable($verkoop){
		echo "<table border=1px>";
		echo "<tr>";
			echo "<th>VerkoopId</th>";
			echo "<th>KlantId</th>";
			echo "<th>ArtikelId</th>";
			echo "<th>VerkoopOrderDatum</th>";
			echo "<th>Aantal</th>";
			echo "<th>Status</th>";
		echo "</tr>";
		foreach($verkoop as $row){
			echo "<tr>";
				echo "<td>" . $row["verkOrdId"] . "</td>";
				echo "<td>" . $row["klantid"] . "</td>";
				echo "<td>" . $row["artid"] . "</td>";
				echo "<td>" . $row["verkOrdDatum"] . "</td>";
				echo "<td>" . $row["verkOrdBestAantal"] . "</td>";
				echo "<td>" . $row["verkOrdStatus"] . "</td>";
				echo "<td><form action='updateVerkoop.php' method='POST'><input type='hidden' name='verkoopId' value='$row[verkOrdId]'><input type='submit' name='bewerken' value='Bewerken'></form></td>";
				echo "<td><form action='selectVerkoop.php' method='POST'><input type='hidden' name='verkoopId' value='$row[verkOrdId]'><input type='submit' name='verwijderen' value='Verwijderen'></form></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	public function getOrders(){

		$sql = "SELECT * FROM verkoopoder";

		$stmt = self::$conn->query($sql);

        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

   	   return $orders;
	}

	public function getKlant($data){

		$sql = "SELECT * FROM inkooporder WHERE $data =" ;

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();
	}

	public function getKlanten(){

		$sql = "SELECT DISTINCT klant.klantnaam FROM klant INNER JOIN verkoopoder ON klant.klantid = verkoopoder.klantid";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function deleteVerkoop($klantid){

		$sql = "DELETE FROM verkoopoder WHERE klantid = '$klantid'";
		$stmt = self::$conn->prepare($sql);
        $stmt->execute();

 	}

 	public function updateVerkoop($id, $klantid, $artId, $verkOrdDatum, $verkOrdStatus){

 		$sql = "UPDATE verkoopoder SET Klantid = '$klantid', artid = '$artId', verkOrdDatum = '$verkOrdDatum', verkOrdStatus = '$verkOrdStatus' WHERE verkOrdId  = '$id'";

		$stmt = self::$conn->prepare($sql);

    	$stmt->execute();
 	}

	 public function showTable($lijst){
		
		
		echo "<table>";
		echo "<tr><th>VerkoopID</th><th>Klant ID</th><th>Artikel ID</th><th>Datum</th><th>Aantal</th><th>Status</th></tr>";
		foreach($lijst as $row) {
			
			
			echo "<tr>";
			echo "<td>" . $row["verkOrdId"] . "</td>";
			echo "<td>" . $row["klantid"] . "</td>";
			echo "<td>" . $row["artid"] . "</td>";
			echo "<td>" . $row["verkOrdDatum"] . "</td>";
			echo "<td>" . $row["verkOrdBestAantal"] . "</td>";
			echo "<td>" . $row["verkOrdStatus"] . "</td>";
			echo "</tr>";
			
		
			
		}
		echo "</table>";
	}

	public function getOrderList() {
        $query = "SELECT * FROM verkoopoder";
        $stmt = self::$conn->query($query);
        return $stmt->fetchAll();
    }
    
    public function updateOrderStatus($orderId, $statusId) {
        $query = "UPDATE verkoopoder SET verkOrdStatus = :status WHERE klantid = :id";
        $stmt = self::$conn->prepare($query);
        $stmt->bindParam(':status', $statusId, PDO::PARAM_INT);
        $stmt->bindParam(':id', $orderId, PDO::PARAM_INT);
        $stmt->execute();
    }

	
}