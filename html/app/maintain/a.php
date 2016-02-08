<?php
require_once ('/var/www/html/app/model/connect.php');
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO MAINTAINANCEREQUEST (REQUESTID, REQUESTPSNO, ZONEID, REQUESTDATE) VALUES (DEFAULT, 1007,0,'2015-12-11');";
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