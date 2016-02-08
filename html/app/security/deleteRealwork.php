<?php
require_once ('/var/www/html/app/model/connect.php');

$guardID = (isset($_POST['deleteRealworkID']) ? $_POST['deleteRealworkID'] : null) ;
$dates = (isset($_POST['dates']) ? $_POST['dates'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.GUARD_REALWORK WHERE GUARDID = " . $guardID . " and DATES = '" . $dates . "' ;";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=realWork.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=realWork.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>