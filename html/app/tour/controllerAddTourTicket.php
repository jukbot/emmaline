<?php
require_once ('/var/www/html/app/model/connect.php');
    if (isset($_POST)) {
        $strtime = $_POST['strtime'];
        $endtime = $_POST['endtime'];
        $type = $_POST['type'];
        $today = date("Y-m-d");
        $conn = dbConnect();  
        if ($conn) {
            $sql = "INSERT INTO EMM_ZOO.TOUR_TICKET (TOURTICKETID,DATES,STARTTIME,ENDTIME,TYPE) VALUES (DEFAULT,'".$today."','".$strtime."','".$endtime."','".$type."');"; 
            echo $sql;  
            $rc = db2_exec($conn, $sql);
            if ($rc) {
                echo "<script>alert('Added');window.location='add_tour_ticket.php';</script>";
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
        echo "<script>alert('Undefined Variable');window.location='add_tour_ticket.php';</script>";
    }
?>