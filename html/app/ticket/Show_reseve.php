<?php
require_once ('/var/www/html/app/model/connect.php');

function updateTicket() {
    // connect db=> stmt sql => insert => refresh page 
    if (isset($_POST)) {
	   $ticketshowID = $_POST['showid_value'];
    }

    $conn = dbConnect(); 
    // start connect db 
    if ($conn) {
        
        
         $insert = " INSERT INTO EMM_ZOO.TICKETSHOW_BUYING (TICKETSHOW_ID, SHOWID, ROUNDID , BUYING_DATE) VALUES (DEFAULT, '$ticketshowID',CURRENT TIME, CURRENT DATE);";
        echo $insert;
        $rc = db2_exec($conn, $insert);
        
        if ($rc) {
          header("Refresh:0; url=ShowList.php");
        }
        else { // If statement is error why see the code
             die('Critical error:' . db2_stmt_error($stmt));
        }
        // finish all query statement      
        db2_free_stmt($rc);
        db2_close($conn);
    }
    else {
       echo db2_conn_errormsg($conn);
    }   
}

?>