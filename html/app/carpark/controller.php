<?php
require_once ('/var/www/html/app/model/connect.php');

function uploadReserve() {
    if ($_POST['form_token'] != $_SESSION['form_token']) {
        header('Location:reserved.php');
    } else {
        //print_r($_POST);
        
        if (isset($_POST)) {
            $name         = $_POST['reserved_name'];
            $resered_date = $_POST['reserved_date'];
            $mobile       = $_POST['mobile'];
            $vehi_type    = $_POST['type'];
            $quantity     = $_POST['quantity'];
            $email        = $_POST['email'];
            // an array that want to insert this can be multiple array at the time.
            $data         = array($name, $resered_date,$mobile,$vehi_type,$quantity,$email);
            // print var_dump to display an array of variable data with type that prepare for query.
            //echo var_dump($data) ."<br>";
        }
        // define $conn from model
        $conn = dbConnect();
        if ($conn) {
            // DEFAULT if you set generated as identify with specifier this will auto increament for integer.
            $sql  = 'INSERT INTO EMM_ZOO.PARKRESERVETOUR (PARKRESERVENO, RESERVE_NAME, RESERVE_DATE, PHONE, VEHI_TYPE, AMOUNT, EMAIL) VALUES (DEFAULT,?,?,?,?,?,?);';
            //echo $sql;
            // prepare statement using connection and sql
            $stmt = db2_prepare($conn, $sql);
            // If statement is valid execute it to db2
            if ($stmt) {
                //echo "SQL is valid<br>";
                $result = db2_execute($stmt, $data);
                if ($result) {
                    $resultMessage = 1;
                    return $resultMessage;
                    header('Location: reserved.php#reserve_list');
                    exit();
                } else {
                    $resultMessage = 0;
                    return $resultMessage;
                }
            } else { // If statement is error why see the code
                die('Critical error:' . db2_stmt_error());
            }
            db2_free_stmt($stmt);
            db2_close($conn);
        }
        // callback alert if failed to connect to database return msg
        else {
            echo db2_conn_errormsg();
        }
    }
}

function editReserved() {
    if (isset($_POST)) {
        $reservedID   = $_POST['update_id'];
        $reservedName = $_POST['edit_reserved_name'];
        $reservedDate = $_POST['edit_reserved_date'];
        $reservedQuantity = $_POST['edit_reserved_amount'];
    }

    $conn = dbConnect();
    if ($conn) {
   
        $sql = "UPDATE EMM_ZOO.PARKRESERVETOUR SET RESERVE_NAME = '$reservedName', RESERVE_DATE = '$reservedDate', AMOUNT = $reservedQuantity WHERE PARKRESERVENO = $reservedID;";

        $result = db2_exec($conn, $sql);
        if ($result) {
             //echo $sql;
             header("Refresh:0; url=reserved.php"); 
            exit();
        } else {
            $resultMessage = 0;
            return $resultMessage;
        }
        db2_free_stmt($stmt);
        db2_close($conn);
    }
    else {
        echo db2_conn_errormsg();
    }
}

function checkIn() {
  if (isset($_POST) ) {
  	  $carregno = $_POST['carregno'];
  	  $carzone = $_POST['parkzone'];
  }
  $conn = dbConnect();
  if ($conn) {
    $insert_checkinout = "INSERT INTO EMM_ZOO.PARKCHECKINOUT (TICKETPARKID, CARREGNO, ZONES, DATES, CHECKIN, CHECKOUT) VALUES (DEFAULT, '$carregno', '$carzone', current date, current time, null);";
    //echo $insert_checkinout;
    $stmt1 = db2_exec($conn, $insert_checkinout);
     if($stmt1) {
        $insert_his = "INSERT INTO EMM_ZOO.PARKHISTORY (VEHI_ID, VEHI_REGNO, CHECKIN, CHECKOUT, DATES, FEE) VALUES (DEFAULT, '$carregno', current time, null, current date, 0.00);";
        $stmt2 = db2_exec($conn, $insert_his);
       // $sql3 = "UPDATE EMM_ZOO.ANIMAL SET CAGEID = " . $cage . " WHERE ANIMALID = '" . $animal . "';";
        //$rc2 = db2_exec($conn, $sql3);
      }
         if($stmt1 & $stmt2) {
          header("Refresh:0; url=checkinout.php"); 
         } else {
          header("Refresh:0; url=checkinout.php"); 
        }
        db2_free_stmt($stmt1);
        db2_free_stmt($stmt2);
        db2_close($conn);
 
  } else {
    echo db2_conn_errormsg($conn);
  }
  db2_free_stmt($stmt1);
}



?>