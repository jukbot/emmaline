<?php
require_once ('/var/www/html/app/model/connect.php');

function updateTicket() {
    // connect db=> stmt sql => insert => refresh page 
    if (isset($_POST['id_value'])) {
	   $transID = $_POST['id_value'];
    }

    $conn = dbConnect(); 
    // start connect db 
    if ($conn) {
        $update = "UPDATE EMM_ZOO.TICKETTRANS_TRANSACTION SET TICKETTRANS_TIMEIN = CURRENT TIME WHERE TICKETTRANS_ID = ".$transID.";";
        //echo $update;
        $rc = db2_exec($conn, $update);

        if ($rc) {
          //header("Refresh:0; url=TranspotationIN.php");
        }
        else { // If statement is error why see the code
             die('Critical error:' . db2_stmt_error($stmt));
        }
        
        // finish all query statement      
        db2_free_stmt($rc);
        $sql = "SELECT * FROM EMM_ZOO.TICKETTRANS_TRANSACTION JOIN EMM_ZOO.TICKETTRANS_TYPE ON VEHICLETRANS_ID = TRANSTYPE_ID WHERE TICKETTRANS_ID = ".$transID.";";
        $stmt = db2_exec($conn, $sql);
         while ($row = db2_fetch_assoc($stmt)) {
            $tran_price = $row['TRANSTYPE_PRICE'];
            $tran_type = $row['TRANSTYPE_NAME'];
             $hourOut = (int)substr($row['TICKETTRANS_TIMEOUT'],0,2);
            $hourIn = (int)substr($row['TICKETTRANS_TIMEIN'],0,2);
            $extraOut = (int)substr($row['TICKETTRANS_TIMEOUT'],3,2);
            $extraIn = (int)substr($row['TICKETTRANS_TIMEIN'],3,2);
             $price = (($hourIn - $hourOut) * $tran_price); // ราคาต้องดึงมาจาก trans_Type table
                        if(($extraIn - $extraOut)  > 0){
                            $price += $tran_price;
                        }
                        if(($extraIn - $extraOut) == 0 && ($hourIn - $hourOut) == 0 && (int)substr($row['TICKETTRANS_TIMEOUT'],6,2) !=  (int)substr($row['TICKETTRANS_TIMEIN'],6,2) ){
                            $price += $tran_price;
                        }
             if ($stmt) {
 // echo "Insert successfully!!";
echo "<script>alert('Price of $tran_type is $price');window.location='TranspotationIN.php';</script>";
                 //header("Refresh:0; url=TranspotationIN.php");
}

else { // If statement is error why see the code
	 die('Critical error:' . db2_stmt_error($stmt));
}

         }
        db2_free_stmt($rc);
        db2_close($conn);
    }
    else {
       echo db2_conn_errormsg($conn);
    }
}

?>