<?php
include '../core/db_connect.php';
class PetConnection extends dbConn {

		public function getPets() {
			include '../core/config.php';
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
			include '../core/config.php';
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
			include '../core/config.php';
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
