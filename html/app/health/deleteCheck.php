<?php
require_once ('/var/www/html/app/model/connect.php');

$delID = (isset($_POST['deleteCheckID']) ? $_POST['deleteCheckID'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.ANIMAL_CHECK WHERE CHECKID = " . $delID . ";";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=check.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=check.php");
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>