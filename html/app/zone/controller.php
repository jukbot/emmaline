<?php
require_once ('/var/www/html/app/model/connect.php');

function addZone() {
  if (isset($_POST)) {
    $zoneType = (isset($_POST['zoneTypeValueForAddZone']) ? $_POST['zoneTypeValueForAddZone'] : null);
    $zoneName = (isset($_POST['zoneNameValueForAddZone']) ? $_POST['zoneNameValueForAddZone'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.ZONE (ZONEID, ZONETYPEID, ZONENAME) VALUES (DEFAULT, '".$zoneType."', '".$zoneName."');";
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

function addZoneType() {
  if (isset($_POST)) {
    $zoneTypeName = (isset($_POST['zoneTypeNameValueForAddZoneType']) ? $_POST['zoneTypeNameValueForAddZoneType'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.ZONETYPE (ZONETYPEID, ZONETYPENAME) VALUES (DEFAULT, '".$zoneTypeName."');";
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
    $buildingName = (isset($_POST['buildingNameValueForAddBuilding']) ? $_POST['buildingNameValueForAddBuilding'] : null);
    $zone = (isset($_POST['zoneValueForAddBuilding']) ? $_POST['zoneValueForAddBuilding'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.BUILDING (BUILDINGID, BUILDINGNAME, ZONEID) VALUES (DEFAULT, '".$buildingName."', '".$zone."');";
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

function addCage() {
  if (isset($_POST)) {
    $cageName = (isset($_POST['cageNameValueForAddCage']) ? $_POST['cageNameValueForAddCage'] : null);
    $cageType = (isset($_POST['cageTypeValueForAddCage']) ? $_POST['cageTypeValueForAddCage'] : null);
    $building = (isset($_POST['buildingValueforAddCage']) ? $_POST['buildingValueforAddCage'] : null);
    $cageKeeper = (isset($_POST['cageKeeperValueForAddCage']) ? $_POST['cageKeeperValueForAddCage'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.CAGE (CAGEID, CAGETYPEID, CAGENAME, BUILDINGID, CAGEKEEPERID) VALUES (DEFAULT,'" . $cageType . "','" . $cageName . "','" . $building ."','" . $cageKeeper . "');";
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

function addCageType() {
  if (isset($_POST)) {
    $cageTypeName = (isset($_POST['cageTypeNameValueForAddCageType']) ? $_POST['cageTypeNameValueForAddCageType'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.CAGETYPE (CAGETYPEID, CAGETYPENAME) VALUES (DEFAULT, '".$cageTypeName."');";
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

function addToy() {
  if (isset($_POST)) {
    $toyType = (isset($_POST['toyTypeValueForAddToy']) ? $_POST['toyTypeValueForAddToy'] : null);
    $cage = (isset($_POST['cageValueForAddToy']) ? $_POST['cageValueForAddToy'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.TOY (TOYID, TOYTYPEID, CAGEID) VALUES (DEFAULT, '".$toyType."', '".$cage."');";
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

function addToyType() {
  if (isset($_POST)) {
    $toyTypeName = (isset($_POST['toyTypeNameValueForAddToyType']) ? $_POST['toyTypeNameValueForAddToyType'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.TOYTYPE (TOYTYPEID, TOYTYPENAME) VALUES (DEFAULT, '".$toyTypeName."');";
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

function animalIn() {
  if (isset($_POST)) {
    $animal = (isset($_POST['animalValueForAnimalIn']) ? $_POST['animalValueForAnimalIn'] : null);
    $cage = (isset($_POST['cageValueForAnimalIn']) ? $_POST['cageValueForAnimalIn'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql1 = "SELECT * FROM EMM_ZOO.ANIMAL WHERE ANIMALID = " . $animal . " AND CAGEID is NULL;";
    $stmt = db2_exec($conn, $sql1);
    if($stmt) {
      if ($row = db2_fetch_assoc($stmt)) {
        $sql2 = "INSERT INTO EMM_ZOO.ANIMALIN (ANIMALINCAGEID, ANIMALID, CAGEID, TIMEIN, OUT) VALUES (DEFAULT, " .$animal. " , " .$cage. ", current timestamp, 0);";
        $rc1 = db2_exec($conn, $sql2);
        $sql3 = "UPDATE EMM_ZOO.ANIMAL SET CAGEID = " . $cage . " WHERE ANIMALID = '" . $animal . "';";
        $rc2 = db2_exec($conn, $sql3);
        if($rc1 && $rc2) {
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
        db2_free_stmt($rc1);
        db2_free_stmt($rc2);
      }
    }
  } else {
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($stmt);
}

function animalOut() {
  if (isset($_POST)) {
    $takeOut = (isset($_POST['takeOut']) ? $_POST['takeOut'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql1 = "INSERT INTO EMM_ZOO.ANIMALOUT (ANIMALINCAGEID, TIMEOUT) VALUES (" . $takeOut .", current timestamp);";
    $rc1 = db2_exec($conn, $sql1);
    $sql2 = "UPDATE EMM_ZOO.ANIMALIN SET OUT = 1 WHERE ANIMALINCAGEID = " . $takeOut . " ;";
    $rc2 = db2_exec($conn, $sql2);
    $sql3 = "UPDATE EMM_ZOO.ANIMAL  SET CAGEID = NULL WHERE EMM_ZOO.ANIMALIN.ANIMALINCAGEID = " . $takeOut . " AND EMM_ZOO.ANIMALID = EMM_ZOO.ANIMALIN.ANIMALID;";
    $rc3 = db2_exec($conn, $sql3);
    if($rc1 && $rc2 && $rc3) {
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
}

?>