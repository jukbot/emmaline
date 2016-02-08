<?php

require_once ('/var/www/html/app/model/connect.php');

if (isset($_POST)) {
    $guardID = (isset($_POST['guardId']) ? $_POST['guardId'] : null);
    $empID = (isset($_POST['empId']) ? $_POST['empId'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.GUARD (GUARDID, EMPID) VALUES ('".$empID."', '".$guardID."');";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=guard.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=guard.php"); 
    }
  } else {  
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc); 
  db2_close($conn);
?>