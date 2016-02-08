<?php
require_once ('/var/www/html/app/model/connect.php');

$guardID = (isset($_POST['deleteGuard']) ? $_POST['deleteGuard'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.GUARD WHERE GUARDID = " . $guardID . ";";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=guard.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=guard.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>