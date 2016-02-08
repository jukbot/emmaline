<?php
require_once ('/var/www/html/app/model/connect.php');

$id = (isset($_POST['aniid']) ? $_POST['aniid'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.ANIMAL WHERE ANIMALID = " . $id . ";";
      echo($sql);
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=aniInfo.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=aniInfo.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>