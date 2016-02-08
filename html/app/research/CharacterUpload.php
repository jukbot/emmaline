<?php
require_once ('/var/www/html/app/model/connect.php');

function CharacterUpload(){

		if (isset($_POST)) {
			$AnimalID = $_POST['AnimalID'];
			$RecordID = $_POST['RecordID'];
			$EmpID = $_POST['EmpID'];
			$Height = $_POST['Height'];
			$Weight = $_POST['Weight'];
			$Length = $_POST['Length'];
			$Pattern = $_POST['Pattern'];
			$BodyTemperature= $_POST['BodyTemperature'];
			// an array that want to insert this can be multiple array at the time.
			$data = array($AnimalID,$RecordID ,$EmpID, $Height, $Weight, $Length, $Pattern, $BodyTemperature);
			 // print var_dump to display an array of variable data with type that prepare for query.
			 //echo var_dump($data) ."<br>";
		}

		$conn = dbConnect();
		if ($conn) {
			// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
			$sql = "INSERT INTO EMM_ZOO.ANIMAL_CHARACTORISTICS (ANIMALID, RECORDID, EMPID, HEIGHT, WEIGHT, LENGTH, PATTERN, BODYTEMP) VALUES (?,?,?,?,?,?,?,?);";
			
			echo $sql;
				// prepare statement using connection and sql
				$stmt = db2_prepare($conn, $sql);

				// If statement is valid execute it to db2
				if ($stmt) {
						//echo "SQL is valid<br>";
					$result = db2_execute($stmt, $data);
			
					if ($result) {
						$resultMessage = "Successfully added to Biological information";
						echo "Successfully added";
						 header('Location: AnimalCharacter.php');
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
}
?>