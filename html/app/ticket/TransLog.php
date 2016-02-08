<?php
require_once ('/var/www/html/app/model/connect.php');
   if (isset($_POST['id_value'])) {
	   $transID = $_POST['id_value'];
        $conn = dbConnect(); 
    // start connect db 
    if ($conn) {
        $update = "DELETE FROM EMM_ZOO.TICKETTRANS_TRANSACTION WHERE TICKETTRANS_ID = ".$transID.";";
        //echo $update;
        $rc = db2_exec($conn, $update);

        if ($rc) {
          header("Refresh:0; url=TransLog.php");
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
<html>
    <head>
        <style>
            td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center; font-size:50px;">History of Rent</div>
        <table border="3px" style="border-collapse: collapse; margin:auto; background-color:rgba(255,255,255,0.1);">
            <tr><td>Transaction ID</td><td>Vehicle Name</td><td>Transaction Date</td><td>Transaction Time Out</td><td>Transaction Time In</td><td>Price</td><td>Delete</td></tr>
            <?php 
                $conn = dbConnect();  
                if ($conn) {
                    //echo "connection status : ".$conn;
                    //Part one select data from tickettype
                     $sql = "SELECT * FROM EMM_ZOO.TICKETTRANS_TRANSACTION  WHERE TICKETTRANS_TIMEIN IS NOT NULL ORDER BY          TICKETTRANS_DATE,TICKETTRANS_TIMEOUT ;";
                    $stmt = db2_exec($conn, $sql);
                    //echo $stmt;
                    if($stmt) {
                    while ($row = db2_fetch_assoc($stmt)) {
                        echo "<tr><td>".$row['TICKETTRANS_ID']."</td>";
                        $typeId = $row['VEHICLETRANS_ID'];
                        $sq = "SELECT * FROM EMM_ZOO.TICKETTRANS_TYPE WHERE TRANSTYPE_ID = '$typeId';";
        //echo $sq;
        
        $stm = db2_prepare($conn, $sq);
        $result = db2_execute($stm);
        $tran_type;
        $tran_price;
        while ($ro = db2_fetch_assoc($stm)) {
            $tran_price = $ro['TRANSTYPE_PRICE'];
            $tran_type = $ro['TRANSTYPE_NAME'];
            // printf ("%-5d %-16s %-32d\n", 
            //    $tran_price, $tran_type, $tran_id);
        }
                        echo "<td>".$tran_type."</td>";
                        echo "<td>".$row['TICKETTRANS_DATE']."</td>";
                        echo "<td>".$row['TICKETTRANS_TIMEOUT']."</td>";
                        echo "<td>".$row['TICKETTRANS_TIMEIN']."</td>";
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
                        echo "<td>".$price."</td>";;
                         echo "<td><form name='transid_form' method='post'>";
                        echo "<input type='hidden' name='id_value' value='".$row['TICKETTRANS_ID']."'/>";
                        echo "<input type='submit' name='submit_btn' value='delete'/></form>";
                        echo "</tr>";
                        // printf ("%-5d %-16s %-32d\n", 
                        //    $tran_price, $tran_type, $tran_id);
                    } 
                  }
                  else { // If statement is error why see the code
                    //   die('Critical error:' . db2_stmt_error($stmt));
                  }
                    db2_free_stmt($stmt);
                    db2_free_stmt($stm);
                    db2_close($conn);
               }  
                else {
                    echo db2_conn_errormsg($conn);
                } 
?>
        </table>
        <a href="index.php" style="text-decoration: none;">
                        <button>Back</button>
         </a>
    </body>
</html>