<?php
require_once ('/var/www/html/app/model/connect.php');

$checkId = (isset($_POST['checkIdEdit']) ? $_POST['checkIdEdit'] : null) ;
$statusA = (isset($_POST['statusA']) ? $_POST['statusA'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "UPDATE EMM_ZOO.ANIMAL_CHECK SET STATUS = '" . $statusA . "' WHERE CHECKID = " . $checkId . " ;";
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