<?php
require_once ('/var/www/html/app/model/connect.php');

function insertBuilding(){

if($_POST['form_token'] != $_SESSION['form_token']) {
	header('Location:index.php');
}
else { 
	//print_r($_POST);
			
if (isset($_POST)) {
	$emm = $_POST['BEmp'];
	$zone = $_POST['BZone'];
	$build = $_POST['Building'];
	$floor = $_POST['floor'];
	$room = $_POST['room'];
	// an array that want to insert this can be multiple array at the time.
   $data = array($build, $floor, $room);
 // print var_dump to display an array of variable data with type that prepare for query.
 //echo var_dump($data) ."<br>";
}

// define $conn from model
$conn = dbConnect();

if ($conn) {
// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
$sql = 'INSERT INTO EMM_ZOO.MAINTAINBUILDING (MAINTEGERAINID, BUILDINGNAME, FLOORLEVEL, ROOM) VALUES (DEFAULT,?,?,?);';
//echo $sql;
// prepare statement using connection and sql
$stmt = db2_prepare($conn, $sql);

// If statement is valid execute it to db2
if ($stmt) {
	    //echo "SQL is valid<br>";
    $result = db2_execute($stmt, $data);
    if ($result) {
        $resultMessage = "Successfully added";
        //echo "Successfully added";
         echo "<script>";
         echo "alert('Successfully')";
         echo "</script>";
         header('Location: index.php');
         exit();
    }
    else {
    	  echo "<script>";
        echo "alert('Failed')";
        echo "</script>";
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

}
?>