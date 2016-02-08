<?php
require_once ('/var/www/html/app/model/connect.php');

$empId = ($_POST['EmpID']);
$animalId = ($_POST['AnimalID']);
$status = ($_POST['Status1']);

$conn = dbConnect();
if ($conn) {
   $sql = "INSERT INTO EMM_ZOO.ANIMAL_CHECK (EMPID, ANIMALID, STATUS, DATES) VALUES ('" . $empId . "','" . $animalId . "','" . $status . "', current timestamp);";
   $rc = db2_exec($conn, $sql);
   if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=check.php");
      db2_free_stmt($rc);
  } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=check.php"); 
  }
}
  else {
     echo db2_conn_errormsg($conn);
 }

 ?>