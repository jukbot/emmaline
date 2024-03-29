<?php
require_once ('/var/www/html/app/model/connect.php');

function addempani(){
            echo "addempani() called";
			if (isset($_POST)) {
				$empid = $_POST['empid'];
				$aniid = $_POST['aniid'];
				$start = $_POST['std'];
                $end   = $_POST['end'];
				// an array that want to insert this can be multiple array at the time.
			   $data = array($empid ,$aniid ,$start, $end);
			 // print var_dump to display an array of variable data with type that prepare for query.
			 //echo var_dump($data) ."<br>";
			}

			// define $conn from model
			$conn = dbConnect();

			if ($conn) {
			// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
			$sql = 'INSERT INTO EMM_ZOO.EMPFORANIMAL (EMPID, ANIMALID, EMPCARESTART, EMPCAREEND) VALUES (?,?,?,?);';

			// prepare statement using connection and sql
			$stmt = db2_prepare($conn, $sql);

			// If statement is valid execute it to db2
			if ($stmt) {
				    //echo "SQL is valid<br>";
			    $result = db2_execute($stmt, $data);
			    if ($result) {
			        $resultMessage = "Successfully added employee responsibility";
			        // header("Refresh:0; url=index.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
			    }
			    else {
			    	  $resultMessage = "Failed to query into database";
			    }
			}
			else { // If statement is error why see the code
				 die('Critical error:' . db2_stmt_error($stmt));
			}
			db2_free_stmt($stmt);
			// db2_close($conn);
			}
			// callback alert if failed to connect to database return msg
			else {
			   echo db2_conn_errormsg($conn);
			}

}
?>
