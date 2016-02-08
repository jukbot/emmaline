<?php
require_once ('/var/www/html/app/model/connect.php');

function insertSaniEmp(){
 
	//print_r($_POST);
			
if (isset($_POST)) {
	$empid = $_POST['empid'];
	$zoneid = $_POST['zoneid'];
	$jobid = '17';
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$birthdate = $_POST['birthdate'];
	$sex = $_POST['sex'];
	$nationality = $_POST['nationality'];
	$hiredate = $_POST['hiredate'];
	$address = $_POST['address'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$salary= $_POST['salary'];
	$bonus= $_POST['bonus'];
	// an array that want to insert this can be multiple array at the time.
   $data = array($empid, $zoneid, $jobid, $firstname, $lastname, $birthdate, $sex, $nationality, $hiredate, $address, $email, $phone, $salary, $bonus);

 // print var_dump to display an array of variable data with type that prepare for query.
 //echo var_dump($data) ."<br>";
}

// define $conn from model
$conn = dbConnect();

if ($conn) {
$sql = 'INSERT INTO EMM_ZOO.EMPLOYEE (EMPID, ZONEID, JOBID, FIRSTNAME, LASTNAME, BIRTHDATE, SEX, NATIONALITY, HIREDATE, ADDRESS, EMAIL, PHONE, SALARY, BONUS) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
//$sql2 = 'INSERT INTO EMM_ZOO.EMP_SANI (EMPID) VALUES (?);';
//echo $sql;
// prepare statement using connection and sql
$stmt = db2_prepare($conn, $sql);
// If statement is valid execute it to db2
if ($stmt) {
	    //echo "SQL is valid<br>";
    $result = db2_execute($stmt, $data);
    if ($result) {
        $resultMessage = "Successfully added to sanitation employee";
        //echo "Successfully added";
        echo "<script>";
        echo "alert('Added successfully')";
        echo "</script>";
         header('Location: addEmpHome.php');
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