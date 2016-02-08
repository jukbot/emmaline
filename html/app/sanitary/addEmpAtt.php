<?php
require_once ('/var/www/html/app/model/connect.php');

function insertEmpAtt(){
 
	//print_r($_POST);
			
if (isset($_POST)) {
	$attno = $_POST['attno'];
	$dates = $_POST['dates'];
    $empid = $_POST['empid'];
    $workzoneid = $_POST['workzoneid'];
    $dutyid = $_POST['carplate'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

	// an array that want to insert this can be multiple array at the time.
   $data = array($attno, $dates, $empid, $workzoneid, $dutyid, $starttime, $endtime);

 // print var_dump to display an array of variable data with type that prepare for query.
 //echo var_dump($data) ."<br>";
}

// define $conn from model
$conn = dbConnect();

if ($conn) {
$sql = 'INSERT INTO EMM_ZOO.SANIEMP_ATTEND (ATTENDNO, DATES, EMPID, WORKZONEID, DUTYID, STARTTIME, ENDTIME) VALUES (?,?,?,?,?,?,?);';

// prepare statement using connection and sql
$stmt = db2_prepare($conn, $sql);
// If statement is valid execute it to db2
if ($stmt) {
	    //echo "SQL is valid<br>";
    $result = db2_execute($stmt, $data);
    if ($result) {
        $resultMessage = "Successfully added to sanitation car";
        //echo "Successfully added";
        echo "<script>";
        echo "alert('Added successfully')";
        echo "</script>";
         header('Location: addCarHome.php');
         exit();
    }
    else {
    	  $resultMessage = "Failed to query into database";
    	   echo "<script>";
        echo "alert('Failed to query into database')";
        echo "</script>";
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