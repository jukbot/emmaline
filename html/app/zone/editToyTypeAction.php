<?php
require_once ('/var/www/html/app/model/connect.php');

$toyTypeId = (isset($_POST['toyTypeIdEdit']) ? $_POST['toyTypeIdEdit'] : null) ;
$toyTypeName = (isset($_POST['toyTypeNameEdit']) ? $_POST['toyTypeNameEdit'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "UPDATE EMM_ZOO.TOYTYPE SET TOYTYPENAME = '" . $toyTypeName . "' WHERE TOYTYPEID = " . $toyTypeId . " ;";
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