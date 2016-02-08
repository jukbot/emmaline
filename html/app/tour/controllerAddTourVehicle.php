<?php
require_once ('/var/www/html/app/model/connect.php');
    if (isset($_POST)) {
        $guideId = $_POST['guideId'];
        $driverId = $_POST['driverId'];
        $carId = $_POST['carId'];
        $amount = $_POST['amount'];
        $conn = dbConnect();  
        if ($conn) {
            $sql = "INSERT INTO EMM_ZOO.TOUR_VEHICLE (CARID,GUIDEID,DRIVERID,MAXAMOUNT) VALUES (".$carId.",".$guideId.",".$driverId.",".$amount.");";
            $rc = db2_exec($conn, $sql);
            if ($rc) {
                echo "<script>alert('Added');window.location='add_tour_driver.php';</script>";
            }
            else {
                // die('Critical error:' . db2_stmt_error($insert));
            }
            db2_close($conn);
        }
        else {
           echo db2_conn_errormsg($conn);
        }
    }else{
        echo "<script>alert('Undefined Variable');window.location='add_tour_driver.php';</script>";
    }
    header( "location: add_tour_vehicle.php" );
    exit(0);
?>