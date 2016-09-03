<?php

	class dbConn {
		public $conn;
		public function __construct(){

			include 'includes/config.php';
			// Connect to server and select database.
			$this->conn = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $username, $password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	};

	class PetConnection extends dbConn {

		public function getPets() {
			include 'includes/config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * FROM PET");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getPet($petid) {
			include 'includes/config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * FROM PET where PET_ID = :petid"  );
				$stmt->bindParam(':petid', $petid);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getOwner($ownerid) {
			include 'includes/config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * FROM OWNER where OWNER_ID = :ownerid"  );
				$stmt->bindParam(':ownerid', $ownerid);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
	};

?>
