<?php
require_once ('/var/www/html/app/model/connect.php');

function carReturn(){
$up = "Y";
if (isset($_POST)) {
	$empID = $_POST['empID'];
	$carID = $_POST['carID'];
	
	// an array that want to insert this can be multiple array at the time.

 // print var_dump to display an array of variable data with type that prepare for query.
 //echo var_dump($data) ."<br>";
}

// define $conn from model
$conn = dbConnect();

if ($conn) {
// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
$delete = "DELETE FROM EMM_ZOO.CARS_BORROWED WHERE EMM_ZOO.CARS_BORROWED.CARID = '".$carID."';";
$update = "UPDATE EMM_ZOO.CARS SET EMM_ZOO.CARS.AVAILABLE = '".$up."' WHERE EMM_ZOO.CARS.CARID = '".$carID."';";
$guanteen = "SELECT AVAILABLE FROM EMM_ZOO.CARS WHERE EMM_ZOO.CARS.CARID = '".$carID."';";


$ans = dbQuery($conn,$guanteen);
$row = dbFetchArray($conn,$ans);
if($row[0] == 'Y' || $row[0] == 'y'){
    echo "<script type='text/javascript'>alert(' This car has not been borrowed yet');</script>";
    header("Refresh:0; url=returnCar.php");
}else{
$result = db2_exec($conn, $delete);
if($result){
 $result2 = db2_exec($conn,$update);
  if($result2){
    echo "<script type='text/javascript'>alert('CAR RETURNED');</script>";
    header("Refresh:0; url=returnCar.php");
  }else{
    echo "<script type='text/javascript'>alert('You need to fill all input OR Your employeeID,carID does not exist');</script>";
    header("Refresh:0; url=TransportationEmployee.php");
  }
    
}
// If statement is valid execute it to db2
/*if ($stmt) {
	    //echo "SQL is valid<br>";
    $result = db2_execute($stmt, $data);
    if ($result) {
        $resultMessage = "Successfully added to parking reserved";
        //echo "Successfully added";
        header("Refresh:0; url=exampleK.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
    }
    else {
    	  $resultMessage = "Failed to query into database";
    }
}*/
else { // If statement is error why see the code
	 die('Critical error:' . db2_stmt_error($stmt));
}

db2_free_stmt($result);
db2_free_stmt($result2);
}
db2_free_stmt($ans);
db2_free_stmt($row);
db2_close($conn);
}
// callback alert if failed to connect to database return msg
else {
   echo db2_conn_errormsg($conn);
}

}
?>