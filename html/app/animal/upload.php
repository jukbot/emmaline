<?php
require_once ('/var/www/html/app/model/connect.php');

function addanimal(){

			if (isset($_POST)) {
				$id = $_POST['aniid'];
				$name = $_POST['name'];
				$height = $_POST['height'];
				$weight = $_POST['weight'];
				$sex = $_POST['sex'];
				$health= $_POST['health'];
				$birth= $_POST['birth'];
				// $die= $_POST['die'];
				// an array that want to insert this can be multiple array at the time.

			 // print var_dump to display an array of variable data with type that prepare for query.
			 //echo var_dump($data) ."<br>";


			 // Upload Picture File Funciton
			   $target_dir = "upload/"; // folder name path to upload here
			   $uploadOk = 1; // upload status tracking
				 $temp = explode(".", $_FILES["imgfile"]["name"]);
				 $filename = "id" . $id . '.' . end($temp);
			   $target_file = $target_dir . $filename;
			   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				  if($_FILES["imgfile"]["size"] <= 0) {
				 	 $data = array($id ,$name ,$height , $weight , $sex , $health, $birth, "'/app/animal/upload/id0.jpg'");
				  } else {
				  		$data = array($id ,$name ,$height , $weight , $sex , $health, $birth, "'/app/animal/upload/id". $id . '.' .end($temp) . "'");
				  }
					//		$data = array($id ,$name ,$height , $weight , $sex , $health, $birth, "'/app/animal/upload/id". $id . '.' .end($temp) . "'");
			   // Check if image file is a actual image or fake image
			    if(isset($_POST["submit"])) {
			     $check = getimagesize($_FILES["imgfile"]["tmp_name"]);
			     if($check !== false) {
			         echo "File type:" . $check["mime"] . ".";
			         $uploadOk = 1;
			     } else {
			         echo "Error: This file is not an image type.";
			         $uploadOk = 0;
			     }
			 }

			      // Check file size
			     if($_FILES["imgfile"]["size"] > 500000) {
			     echo "Sorry, your file is too large.";
			     $uploadOk = 0;
			     }
			     // Allow certain file formats
			     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			     echo "Sorry, only JPG, JPEG, PNG & GIF files  are allowed.";
			     $uploadOk = 0;
			     }
			     // Check if file already exists
			     if (file_exists($target_file)) {
			     echo "Sorry, file already exists.";
			     $uploadOk = 0;
			     }
			     // Check if $uploadOk is set to 0 by an error
			     if ($uploadOk == 0) {
			     echo "Upload failed.";
			     // if everything is ok, try to upload file
			     }
			     else {
			     if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)) {
			         echo "<br>The file ". basename( $_FILES["imgfile"]["name"]). " uploaded successfully.
			         <a href='upload/$filename'>Click here</a> to view the uploaded image";
			         //
			     } else {
			         echo "Sorry, there was an error uploading your file.";
			         // debug path upload file
			         var_dump($_FILES["imgfile"]);
			       }
			     }
           ////
			}

			// define $conn from model
			$conn = dbConnect();

			if ($conn) {
			// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
			$sql = 'INSERT INTO EMM_ZOO.ANIMAL (ANIMALID, ANIMALNAME, HEIGHT, WEIGHT, SEX, HEALTHSTATUS, BIRTHDATE, ANIMALPICTURE) VALUES (?,?,?,?,?,?,?,?);';

			// prepare statement using connection and sql
			$stmt = db2_prepare($conn, $sql);

			// If statement is valid execute it to db2
			if ($stmt) {
				    //echo "SQL is valid<br>";
			    $result = db2_execute($stmt, $data);
			    if ($result) {
			        $resultMessage = "Successfully added animal";
			        // header("Refresh:0; url=aniInfo.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
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

function addspecies(){

			if (isset($_POST)) {
			 $data = array($_POST['aniid'] ,$_POST['species']);

			}
			$conn = dbConnect();

			if ($conn) {
			$sql = 'INSERT INTO EMM_ZOO.ANIMALSPECIES (ANIMALID, SPECIESID) VALUES (?,?);';

			$stmt = db2_prepare($conn, $sql);

			if ($stmt) {
			    $result = db2_execute($stmt, $data);
			    if ($result) {
			        $resultMessage = "Successfully added animal";
			    }
			    else {
			    	  $resultMessage = "Failed to query into database";
			    }
			}
			else {
				 die('Critical error:' . db2_stmt_error($stmt));
			}
			db2_free_stmt($stmt);

			}
			else {
			   echo db2_conn_errormsg($conn);
			}

}

function animaldie(){
	if (isset($_POST['die'])) {
	 $data = array($_POST['diedate'], $_POST['dieid']);

	}
	$conn = dbConnect();

	if ($conn) {
	$sql = 'UPDATE EMM_ZOO.ANIMAL SET DIEDATE=? WHERE ANIMALID=?;';

	$stmt = db2_prepare($conn, $sql);

	if ($stmt) {
			$result = db2_execute($stmt, $data);
			if ($result) {
					$resultMessage = "Successfully added animal";
			}
			else {
					$resultMessage = "Failed to query into database";
			}
	}
	else {
		 die('Critical error:' . db2_stmt_error($stmt));
	}
	db2_free_stmt($stmt);

	}
	else {
		 echo db2_conn_errormsg($conn);
	}
}
?>
