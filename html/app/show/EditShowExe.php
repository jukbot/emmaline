<?php
require_once ('/var/www/html/app/model/connect.php');

function editShow(){
    
    if (isset($_POST)) {
        $showID = $_POST['showID'];
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
                echo "<script>alert(Wrong Animal ID.);</script>";
                header("Location:index.php");
            } else {
                
                $insert = "UPDATE EMM_ZOO.SHOW SET SHOWNAME='$showName', BUILDINGID=$buildingID, SEAT_AMOUNT=$seat, PRICE=$price WHERE SHOWID = $showID;";
                $rc =db2_exec($conn, $insert);

                if($rc) {
                        echo "Update Successful";
                    }
                    else { 
                        die('Critical error: '. db2_stmt_error($stmt));
                    }

                    $insert = "UPDATE EMM_ZOO.SHOW_ANIMAL SET ANIMALID = $animalID WHERE SHOWID = $showID";
                    $rc=db2_exec($conn, $insert);

                    if($rc) {
                        echo "Update Successful";
                    }
                    else { 
                        die('Critical error: '. db2_stmt_error($stmt));
                    }

                    $insert = "UPDATE EMM_ZOO.SHOW_STAFF SET EMPID = $staffID WHERE SHOWID = $showID;";
                    $rc=db2_exec($conn, $insert);

                    if($rc) {
                        echo "Update Successful";
                    }
                    else { 
                        die('Critical error: '. db2_stmt_error($stmt));
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