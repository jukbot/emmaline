<?php
require_once ('/var/www/html/app/model/connect.php');

function addEmp() {
  if (isset($_POST)) {
    $EmpName = (isset($_POST['EmployeeAdd']) ? $_POST['EmployeeAdd'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.MAINTEGERAINPERSON (MPSNO, EMPID, REQUESTID) VALUES (DEFAULT, 1111 ,".$EmpName.");";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    }
  } else {
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc);
  db2_close($conn);
}

function addBuilding() {
  if (isset($_POST)) {
    $floorBuild = (isset($_POST['FloorValueAdd']) ? $_POST['FloorValueAdd'] : null);
    $roomBuild = (isset($_POST['RoomValueAdd']) ? $_POST['RoomValueAdd'] : null);
    $BuildName = (isset($_POST['BuildNameSelect']) ? $_POST['BuildNameSelect'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO MAINTAINBUILDING (MAINTEGERAINID, BUILDINGNAME, FLOORLEVEL, ROOM) VALUES (4, '".$BuildName."',".$floorBuild.",".$roomBuild.");";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    }
  } else {
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc);
  db2_close($conn);
} 

function addRequest() {
  if (isset($_POST)) {
    $Emp = (isset($_POST['EmpSelect']) ? $_POST['EmpSelect'] : null);
    $Zone = (isset($_POST['ZoneSelect']) ? $_POST['ZoneSelect'] : null);
    $reDate = date("Y-m-j");
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO MAINTAINANCEREQUEST (REQUESTID, REQUESTPSNO, ZONEID, REQUESTDATE) VALUES (DEFAULT, '".$Emp."','".$Zone."','".$reDate."');";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    }
  } else {
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc);
  db2_close($conn);
} 

function addZone() {
  if (isset($_POST)) {
    $zoneType = (isset($_POST['zoneTypeValueForAddZone']) ? $_POST['zoneTypeValueForAddZone'] : null);
    $zoneName = (isset($_POST['zoneNameValueForAddZone']) ? $_POST['zoneNameValueForAddZone'] : null);
    $reDate = date("Y-m-j");
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO MAINTAINANCEREQUEST (REQUESTID, REQUESTPSNO, ZONEID, REQUESTDATE) VALUES (DEFAULT, '".$zoneType."', '".$zoneName."','".$reDate."');";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    }
  } else {
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc);
  db2_close($conn);
} 

?>