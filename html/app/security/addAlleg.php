<?php

require_once ('/var/www/html/app/model/connect.php');

if (isset($_POST)) {
    $allegid = (isset($_POST['allegid']) ? $_POST['allegid'] : null);
    $nameOfAlleg = (isset($_POST['nameOfAlleg']) ? $_POST['nameOfAlleg'] : null);
    $citizenid = (isset($_POST['citizenid']) ? $_POST['citizenid'] : null);
    $guardid = (isset($_POST['guardid']) ? $_POST['guardid'] : null);
    $zone = (isset($_POST['zone']) ? $_POST['zone'] : null);
    $date = (isset($_POST['date']) ? $_POST['date'] : null);
    $finePrice = (isset($_POST['finePrice']) ? $_POST['finePrice'] : null);
  }
  $conn = dbConnect();
  if ($conn) { 
    $sql1 = "INSERT INTO EMM_ZOO.ALLEGETION (ALLEGID, NAMEOFALLEG, OFDCITIZENID, GUARDID, ZONEID, DATES, FINDPRICE) VALUES (DEFAULT, '".$nameOfAlleg."', '".$citizenid."', '".$guardid."', '".$zone."', '".$date."', '".$finePrice."');";
    $rc1 = db2_exec($conn, $sql1);
    $sql2 = "INSERT INTO EMM_ZOO.OFFENDERALLEG (ALLEGID, CITIZENID) VALUES (DEFAULT, '".$citizenid."');";
    $rc2 = db2_exec($conn, $sql2);
          
    if($rc1 && $rc2) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>"; 
      header("Refresh:0; url=allegation.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=allegation.php"); 
    }
  } else {  
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc); 
  db2_close($conn);
?>