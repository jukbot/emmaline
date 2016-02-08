<?php
require_once ('/var/www/html/app/model/connect.php');

function uploadPubMedInfo(){
	if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
	  header('Location: ../login.php');
	  exit();
	}
	else { 
		//print_r($_POST);
		if (isset($_POST)) {
			$PUBMEDID = $_POST['PUBMEDID'];
			$Title = $_POST['Title'];
			$Year = $_POST['Year'];
			$Author = $_POST['Author'];
			$Journal = $_POST['Journal'];
			$ResearchType= $_POST['ResearchType'];
			$data = array($PUBMEDID,$Title,$Year,$Author,$Journal,$ResearchType);
			 // print var_dump to display an array of variable data with type that prepare for query.
			 //echo var_dump($data) ."<br>";
		}
		require_once ('/var/www/html/app/model/connect.php');
		$conn = dbConnect();
		if ($conn) {
			// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
			$sql = 'INSERT INTO EMM_ZOO.PUBMEDREFERENCES (PUBMEDID,TITLE,YEAR,AUTHOR,JOURNAL,RESEARCH_TYPE) VALUES (?,?,?,?,?,?);';
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
						 header('Location: PubMedRef.php');
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