<?php
require_once ('/var/www/html/app/model/connect.php');

$buildingID = (isset($_POST['deleteBuilding']) ? $_POST['deleteBuilding'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.BUILDING WHERE BUILDINGID = " . $buildingID . ";";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=index.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>