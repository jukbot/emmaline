<?php
require_once ('/var/www/html/app/model/connect.php');

function addRound(){
    
    if (isset($_POST)) {
        $showID = $_POST['showID'];
        $roundID = $_POST['roundID'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $showdate = $_POST['showdate'];
    }
    
    $conn=dbConnect();
    if($conn) {
        $insert = "INSERT INTO EMM_ZOO.SHOW_TIMETABLE(SHOWID, ROUNDID, STARTTIME, ENDTIME, DATES) values($showID, $roundID, '$starttime', '$endtime', '$showdate');";
        //$insert = "INSERT INTO EMM_ZOO.SHOW_TIMETABLE(SHOWID, ROUNDID, STARTTIME, ENDTIME, DATES) values(1, 3, '16:00:00', '16:30:00', '11/12/2015');";
        $rc =db2_exec($conn, $insert);
        if($rc) {
            echo "Insert Successful";
        }
        else { 
            die('Critical error: '. db2_stmt_error($rc));
        }
        
        $sql="SELECT * from EMM_ZOO.SHOW WHERE SHOWID = $showID;";

        $stmt=db2_prepare($conn, $sql);
        $result=db2_execute($stmt);

        while($row = db2_fetch_assoc($stmt)) {
            $zone = $row['BUILDINGID'];
            $name = $row['SHOWNAME'];
        }
        
        $insert = "INSERT INTO EMM_ZOO.SHOW_TICKET(SHOWID, STARTTIME, ENDTIME, DATES, SHOWNAME, ZONEID) values($showID, '$starttime', '$endtime', '$showdate', '$name', $zone);";
        $rc =db2_exec($conn, $insert);
        if($rc) {
            echo "Insert Successful";
        }
        else { 
            die('Critical error: '. db2_stmt_error($rc));
        }
        
        db2_free_stmt($stmt);
        db2_close($conn);
    } else {
        echo db2_conn_errormsg($conn);
    }
}

?>