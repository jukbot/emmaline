<?php

require_once ('/var/www/html/app/model/connect.php');

if (isset($_POST)) {
    $empID = (isset($_POST['empid']) ? $_POST['empid'] : null);
    $dates = (isset($_POST['dates']) ? $_POST['dates'] : null);
    $timeIn = (isset($_POST['timeIn']) ? $_POST['timeIn'] : null);
    $timeOut = (isset($_POST['timeOut']) ? $_POST['timeOut'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.GUARD_TIMETABLE (GUARDID,DATES,TIMEIN,TIMEOUT) VALUES ('".$empID."', '".$dates."', '".$timeIn."', '".$timeOut."');";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=timeTable.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=timeTable.php"); 
    }
  } else {  
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc); 
  db2_close($conn);
?>