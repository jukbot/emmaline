<?php
require_once ('/var/www/html/app/model/connect.php');

function addShow(){
    
    if (isset($_POST)) {
        $showName = $_POST['showName'];
        $animalID = $_POST['animalID'];
        $staffID = $_POST['staffID'];
        $buildingID = $_POST['buildingID'];
        $seat = $_POST['seat'];
        $price = $_POST['price'];
    }
    
    $conn=dbConnect();
    if($conn) {
        
        $sql="SELECT EMPID FROM EMM_ZOO.EMPLOYEE WHERE EMPID = ".$staffID;

        $stmt=db2_prepare($conn, $sql);
        $result=db2_execute($stmt);
        
        $count = 0;
        while($row = db2_fetch_assoc($stmt)) {
            $count++;
        }
        
        if($count <= 0){
            echo "Wrong Staff ID.";
        } else {
            // Query
            db2_free_stmt($stmt);
            
            $sql="SELECT ANIMALID FROM EMM_ZOO.ANIMAL WHERE ANIMALID = ".$animalID;
            $stmt=db2_prepare($conn, $sql);
            $result=db2_execute($stmt);
            
            $count = 0;
            
            while($row = db2_fetch_assoc($stmt)) {
                $count++;
            }
            
            if($count <= 0){
                echo "Wrong Animal ID.";
            } else {
                
                $insert = "INSERT INTO EMM_ZOO.SHOW(SHOWID, SHOWNAME, BUILDINGID, SEAT_AMOUNT, PRICE) values(DEFAULT, '$showName', $buildingID, $seat, $price);";
                $rc =db2_exec($conn, $insert);

                if($rc) {
                    db2_free_stmt($stmt);
                    
                    $sql="SELECT SHOWID from EMM_ZOO.SHOW;";

                    $stmt=db2_prepare($conn, $sql);
                    $result=db2_execute($stmt);

                    while($row = db2_fetch_assoc($stmt)) {
                        $show_showID=$row['SHOWID'];
                    }

                    $insert = "INSERT INTO EMM_ZOO.SHOW_ANIMAL (SHOWID, ANIMALID) VALUES ($show_showID, $animalID);";
                    $rc=db2_exec($conn, $insert);

                    if($rc) {
                        echo "Insert Successful";
                    }
                    else { 
                        die('Critical error: '. db2_stmt_error($stmt));
                    }

                    $insert = "INSERT INTO EMM_ZOO.SHOW_STAFF (SHOWID, EMPID) VALUES ($show_showID, $staffID);";
                    $rc=db2_exec($conn, $insert);

                    if($rc) {
                        echo "Insert Successful";
                    }
                    else { 
                        die('Critical error: '. db2_stmt_error($stmt));
                    }
                    /*
                    $insert = "INSERT INTO EMM_ZOO.SHOW_TICKET (SHOWID, SHOWNAME, BUILDINGID) VALUES ($show_showID, '$showName', $buildingID);";
                    $rc=db2_exec($conn, $insert);

                    if($rc) {
                        echo "Insert Successful";
                    }
                    else { 
                        die('Critical error: '. db2_stmt_error($stmt));
                    }*/
                }
                else { 

                }
                
            }
        }
        db2_free_stmt($stmt);
        db2_close($conn);
    } else {
        echo db2_conn_errormsg($conn);
    }
}

?>