<?php
require_once ('/var/www/html/app/model/connect.php');

$citizenID = (isset($_POST['deleteOffender']) ? $_POST['deleteOffender'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.OFFENDER WHERE CITIZENID = " . $citizenID . ";";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=offender.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=offender.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>


