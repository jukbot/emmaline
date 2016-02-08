<?php
require_once ('/var/www/html/app/model/connect.php');

//$EMPLOYID = (isset($_POST['empID']) ? $_POST['empID'] : null) ;
$EMPLOYID = $_POST['empID'];
//$JOBSELCET = (isset($_POST['jobAssign']) ? $_POST['jobAssign'] : null);
$JOBSELECT = $_POST['jobAssign'];
  $conn = dbConnect();
  if ($conn) {
    $sql = "UPDATE EMM_ZOO.MAINTEGERAINPERSON SET REQUESTID= ".$JOBSELECT." WHERE EMPID= ".$EMPLOYID."; ";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Location: team.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Location: team.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>