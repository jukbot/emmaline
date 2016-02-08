<?php
require_once ('/var/www/html/app/model/connect.php');

    
    if (isset($_POST)) {
        if (isset($_POST['ShowID']) && isset($_POST['RoundID']) && !( empty($_POST['ShowID']) || empty($_POST['RoundID']) )){
            $showID = $_POST['ShowID'];
            $roundID = $_POST['RoundID'];
        }
        else {
            $showID = null;
            $roundID = null;
        }
    
    $conn=dbConnect();
    if($conn) {
            if($roundID != null && $showID != null){
            $delete = "DELETE FROM EMM_ZOO.SHOW_TIMETABLE WHERE SHOWID = $showID AND ROUNDID = $roundID;";
            //$insert = "INSERT INTO EMM_ZOO.SHOW_TIMETABLE(SHOWID, ROUNDID, STARTTIME, ENDTIME, DATES) values(1, 3, '16:00:00', '16:30:00', '11/12/2015');";

            $rc =db2_exec($conn, $delete);
            if($rc) {
                echo "Delete Successful";
                header("Location:index.php");
            }
            else { 
                //die('Critical error: '. db2_stmt_error($stmt));
            }
            } else {
                echo "<h1>Wrong Input.</h1>";
            }
        db2_close($conn);
    } else {
        echo db2_conn_errormsg($conn);
    }
    
    }

?>