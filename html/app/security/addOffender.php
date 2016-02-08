<?php

require_once ('/var/www/html/app/model/connect.php');

if (isset($_POST)) {
    $citizenID = (isset($_POST['citizenId']) ? $_POST['citizenId'] : null);
    $firstname = (isset($_POST['firstname']) ? $_POST['firstname'] : null);
    $lastname = (isset($_POST['lastname']) ? $_POST['lastname'] : null);
    $sex = (isset($_POST['sex']) ? $_POST['sex'] : null);
    $nationality = (isset($_POST['nationality']) ? $_POST['nationality'] : null);
    $dateOfBirth = (isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : null);
    $phone = (isset($_POST['phone']) ? $_POST['phone'] : null);
    $pic = (isset($_POST['pic']) ? $_POST['pic'] : null);
  }
  $conn = dbConnect();
  if ($conn) {
    $sql = "INSERT INTO EMM_ZOO.OFFENDER (CITIZENID, FIRSTNAME, LASTNAME, SEX, NATIONALITY, DATEOFBIRTH, PHONE, PIC) VALUES ('".$citizenID."', '".$firstname."', '".$lastname."', '".$sex."', '".$nationality."', '".$dateOfBirth."', '".$phone."', '".$pic."');";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=offender.php"); 
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=offender.php"); 
    }
  } else {  
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($rc); 
  db2_close($conn);
?>