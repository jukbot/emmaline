<?php
require_once ('/var/www/html/app/model/connect.php');

$medName = ($_POST['medname']);
$dose = ($_POST['dose']);

$conn = dbConnect();
if ($conn) {
   $sql = "INSERT INTO EMM_ZOO.MEDICINEORDER (MEDICINEID, DOSE) VALUES ('" . $medName . "','" . $dose . "');";
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