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
        //$insert = "Update";
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