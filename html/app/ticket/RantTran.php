<?php
require_once ('/var/www/html/app/model/connect.php');

function updateTicket() {
    // connect db=> stmt sql => insert => refresh page 
    if (isset($_POST)) {
	   $type = $_POST['type'];
    }
    
    // start connect db
    $conn = dbConnect();  
    if ($conn) {

        //Part one select data from tickettype
        $sql = "SELECT * FROM EMM_ZOO.TICKETTRANS_TYPE WHERE TRANSTYPE_NAME = '$type';";
        //echo $sql;
        
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        while ($row = db2_fetch_assoc($stmt)) {
            $tran_price = $row['TRANSTYPE_PRICE'];
            $tran_type = $row['TRANSTYPE_NAME'];
            $tran_id = $row['TRANSTYPE_ID'];
            // printf ("%-5d %-16s %-32d\n", 
            //    $tran_price, $tran_type, $tran_id);
        }
        
        $insert = " INSERT INTO EMM_ZOO.TICKETTRANS_TRANSACTION (TICKETTRANS_ID, VEHICLETRANS_ID, TICKETTRANS_DATE , TICKETTRANS_TIMEIN ,TICKETTRANS_TIMEOUT) VALUES (DEFAULT, '$tran_id',CURRENT DATE , NULL, CURRENT TIME);";

        $rc = db2_exec($conn, $insert);

        if ($rc) {
          echo "<script>alert('1 $tran_type has rent');window.location='TranspotationTricket.php';</script>";
        }

        else { // If statement is error why see the code
             die('Critical error:' . db2_stmt_error($stmt));
        }
        // finish all query statement      
        db2_free_stmt($stmt);
        db2_close($conn);
    }
    else {
       echo db2_conn_errormsg($conn);
    }   
}

?>