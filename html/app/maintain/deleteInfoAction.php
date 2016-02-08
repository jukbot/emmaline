<?php
require_once ('/var/www/html/app/model/connect.php');

$REQUESTID = (isset($_POST['deleteInfo']) ? $_POST['deleteInfo'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.MAINTAININFO WHERE MAINTEGERAINID = " . $REQUESTID . ";";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=info.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=info.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>