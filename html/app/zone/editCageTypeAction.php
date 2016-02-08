<?php
require_once ('/var/www/html/app/model/connect.php');

$cageTypeId = (isset($_POST['cageTypeIdEdit']) ? $_POST['cageTypeIdEdit'] : null) ;
$cageTypeName = (isset($_POST['cageTypeNameEdit']) ? $_POST['cageTypeNameEdit'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "UPDATE EMM_ZOO.CAGETYPE SET CAGETYPENAME = '" . $cageTypeName . "' WHERE CAGETYPEID = " . $cageTypeId . " ;";
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