<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "boodschappenservice";
    protected static $conn = NULL;

    public function __construct() {
        if (!self::$conn) {
			try{
				 self::$conn = new PDO ("mysql:host=$this->host;
						dbname=$this->dbname",
						$this->username,
						$this->password) ;

				 self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
				 self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				 //echo "Connectie is gelukt <br />" ;
			}

			catch(PDOException $e){
				 echo "Connectie mislukt: " . $e->getMessage() ;
			}
		} else {
			echo "Database is al geconnected<br>";
		}    
    }

	public function searchCustomerById($klantId) {
        $query = "SELECT * FROM klant WHERE klantid = :id";
        $stmt = self::$conn->prepare($query);
        $stmt->bindParam(':id', $klantId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}