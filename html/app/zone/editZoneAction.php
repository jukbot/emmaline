<?php
require_once ('/var/www/html/app/model/connect.php');

$checkId = ($_POST['checkIdEdit']) ;
$statusA = ($_POST['status'] ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "UPDATE EMM_ZOO.ANIMAL_CHECK SET STATUS = '" . $statusA . "' WHERE ZONEID = " . $checkId . " ;";
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