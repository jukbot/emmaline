<?php
require_once ('/var/www/html/app/model/connect.php');

function addEmp() {
  if (isset($_POST)) {
    $EmpName = (isset($_POST['employeeAdd']) ? $_POST['employeeAdd'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.MAINTEGERAINPERSON (MPSNO, EMPID, REQUESTID) VALUES ( $EmpName, $EmpName,0);";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=team.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=team.php"); 
    }
  } else {
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc);
  db2_close($conn);
}


function addEmp2(){
  if (isset($_POST)) {
  $EmpID = $_POST['employeeAdd'];
  // an array that want to insert this can be multiple array at the time.

}

$conn = dbConnect();

if ($conn) {
$sql = "INSERT INTO EMM_ZOO.MAINTEGERAINPERSON (MPSNO, EMPID, REQUESTID) VALUES ($EmpID, $EmpID ,0);";
//$sql2 = 'INSERT INTO EMM_ZOO.EMP_SANI (EMPID) VALUES (?);';
//echo $sql;
// prepare statement using connection and sql

// If statement is valid execute it to db2

      //echo "SQL is valid<br>";
    $result = db2_exec($conn, $sql);
    if ($result) {
        $resultMessage = "Successfully added to maintainance personel";
        //echo "Successfully added";
        echo "<script>";
        echo "alert('Added successfully')";
        echo "</script>";
         header("Refresh:0; url=team.php");
         exit();
    }
    else {
        $resultMessage = "Failed to query into database";
         echo "<script>";
        echo "alert('Failed to query into database')";
        echo "</script>";
        header("Refresh:0; url=team.php"); 
    }
    db2_free_stmt($result);
    db2_close($conn);
    }
    else {
        echo db2_conn_errormsg();
      }
}
// callback alert if failed to connect to database return msg

?>