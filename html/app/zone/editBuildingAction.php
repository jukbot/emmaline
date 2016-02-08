<?php
require_once ('/var/www/html/app/model/connect.php');

$buildingId = (isset($_POST['buildingIdEdit']) ? $_POST['buildingIdEdit'] : null) ;
$buildingName = (isset($_POST['buildingNameEdit']) ? $_POST['buildingNameEdit'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "UPDATE EMM_ZOO.BUILDING SET BUILDINGNAME = '" . $buildingName . "' WHERE BUILDINGID = " . $buildingId . " ;";
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