<?php
require_once ('/var/www/html/app/model/connect.php');

$allegID = (isset($_POST['deleteAllegation']) ? $_POST['deleteAllegation'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.ALLEGETION WHERE ALLEGID = " . $allegID . ";";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=allegation.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=allegation.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>