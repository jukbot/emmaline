<?php
require_once ('/var/www/html/app/model/connect.php');

$zoneTypeId = (isset($_POST['zoneTypeIdEdit']) ? $_POST['zoneTypeIdEdit'] : null) ;
$zoneTypeName = (isset($_POST['zoneTypeNameEdit']) ? $_POST['zoneTypeNameEdit'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "UPDATE EMM_ZOO.ZONETYPE SET ZONETYPENAME = '" . $zoneTypeName . "' WHERE ZONETYPEID = " . $zoneTypeId . " ;";
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