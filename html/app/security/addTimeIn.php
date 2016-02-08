<?php

require_once ('/var/www/html/app/model/connect.php');

if (isset($_POST)) {
    $empID = (isset($_POST['empid']) ? $_POST['empid'] : null);
    
    
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.GUARD_REALWORK (GUARDID,DATES,WORKIN,WORKOUT) VALUES ('".$empID."', current date, current time, null);";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=realWork.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=realWork.php"); 
    }
  } else {  
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc); 
  db2_close($conn);
?>