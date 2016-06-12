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
		public function updateEmployee($imageLink, $id) {
			include 'includes/config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("UPDATE BANNER_INDEX SET image_link = :image_link WHERE id = :id");
				$stmt->bindParam(':image_link', $imageLink);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}
		public function deleteEmployee($image_id) {
			include 'includes/config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM BANNER_INDEX WHERE id = :image_id");
				$stmt->bindParam(':image_id', $image_id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
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
		public function createEmployee($imagePath, $imageUserPath, $imageLink) {
			include 'includes/config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("INSERT INTO BANNER_INDEX(admin_path, image_path, image_link, status) VALUES (:image_path, :user_path, :image_link, 'active')");
				$stmt->bindParam(':image_path', $imagePath);
				$stmt->bindParam(':user_path', $imageUserPath);
				$stmt->bindParam(':image_link', $imageLink);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}
	};

?>
