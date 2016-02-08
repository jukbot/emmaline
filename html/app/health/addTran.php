<?php
require_once ('/var/www/html/app/model/connect.php');

$treatId = ($_POST['TreatID']);
$carId = ($_POST['CarID']);
$hospital = ($_POST['HospitalName']);

$conn = dbConnect();
if ($conn) {
   $sql = "INSERT INTO EMM_ZOO.HEALTHCARE_TRANSPORT (TREATID, CARID, HOSPITAL, DATES) VALUES ('" . $treatId . "','" . $carId . "','" . $hospital . "', current timestamp);";
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