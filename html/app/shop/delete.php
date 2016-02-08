<?php
require_once ('/var/www/html/app/model/connect.php');

$promotion = (isset($_POST['promotionId']) ? $_POST['promotionId'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.PROMOTION WHERE PROMOID = " . $promotion . ";";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=promotion.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=promotion.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>