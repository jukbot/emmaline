<?php
require_once ('/var/www/html/app/model/connect.php');

function uploadBioInfo(){
	if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
	  header('Location: ../login.php');
	  exit();
	}
	else { 
		//print_r($_POST);
		if (isset($_POST)) {
			$AnimalID = $_POST['AnimalID'];
			$species = $_POST['species'];
			$Phylum = $_POST['Phylum'];
			$Class = $_POST['Class'];
			$Order = $_POST['Order'];
			$Family= $_POST['Family'];
			$Genus= $_POST['Genus'];
			$warmblooded= $_POST['warmblooded'];
			$Cover= $_POST['Cover'];
			$Reproduction= $_POST['Reproduction']; 
			$Habitat= $_POST['Habitat'];
			$food= $_POST['food'];
			$BodyTemp= $_POST['BodyTemp'];
			$EnviTemp= $_POST['EnviTemp'];
			$LifeSpan= $_POST['LifeSpan'];
			// an array that want to insert this can be multiple array at the time.
			$data = array($AnimalID, $species, $Phylum, $Class, $Order, $Family, $Genus, $warmblooded, $Cover, $Reproduction, $Habitat, $food, $BodyTemp, $EnviTemp, $LifeSpan);
			 // print var_dump to display an array of variable data with type that prepare for query.
			 //echo var_dump($data) ."<br>";
		}
		require_once ('/var/www/html/app/model/connect.php');
		$conn = dbConnect();
		if ($conn) {
			// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
			$sql = 'INSERT INTO EMM_ZOO.BIOINFO (SPECIESID,SPECIESNAME, PHYLUM, CLASS, ORDER, FAMILY, GENUS, WARMBLOODED, BODYCOVER, REPRODUCTION, HABITAT, COMMONFOOD, BODYTEMP, ENVITEMPRANGE, LIFESPAN) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
			//echo $sql;
				// prepare statement using connection and sql
				$stmt = db2_prepare($conn, $sql);
				// If statement is valid execute it to db2
				if ($stmt) {
						//echo "SQL is valid<br>";
					$result = db2_execute($stmt, $data);
			
					if ($result) {
						$resultMessage = "Successfully added to Biological information";
						echo "Successfully added";
						 header('Location: BioInfo.php');
						 exit();
					}
					else {
						  $resultMessage = "Failed to query into database";
					}
				}
				else { // If statement is error why see the code
					 die('Critical error:' . db2_stmt_error());
				}
				db2_free_stmt($stmt);
				db2_close($conn);
			}
								// callback alert if failed to connect to database return msg
			else {
				   echo db2_conn_errormsg();
			}
}}
?>