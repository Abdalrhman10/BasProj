<?php 

include_once 'Database.php';

class Inkoop extends Database{

	public function insertInkoop($levId, $artId, $aantal){

		$datum = date("Y-m-d");

        $sql = "INSERT INTO inkooporder (levid, artid, inkOrdDatum, inkOrdBestAantal, inkOrdStatus) VALUES ('$levId', '$artId', '$datum', '$aantal', 1 )";

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function inkoopSelect($data, $subject){

	?><select name="<?=$data?>" required><?php
		foreach($subject as $subject){
			foreach ($subject as $row){ ?>
	   	<option><?=$row?></option>
		<?php }}?>
	</select></br><?php
	

	}

	public function deleteInkoop($conn, $data){

		$sql = "DELETE * FROM inkooporder WHERE inkOrdId = '$data'";

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();
	}


}
?>