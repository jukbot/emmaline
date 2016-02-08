<?php 
   require_once ('/var/www/html/app/model/connect.php');
   require_once ('trans_return.php');
   if (isset($_POST['submit_btn'])) {
     updateTicket();
    header("Refresh:0");
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
        <div style="text-align:center; font-size:50px;">Rent List</div>
        <table border="3px" style="border-collapse: collapse; margin:auto; background-color:rgba(255,255,255,0.1);">
            <tr><td>Transaction ID</td><td>Vehicle Name</td><td>Transaction Date</td><td>Transaction Time Out</td><td>Return</td></tr>
            <?php
                $conn = dbConnect();  
                if ($conn) {
                    //echo "connection status : ".$conn;
                    //Part one select data from tickettype
                    $sql = "SELECT * FROM EMM_ZOO.TICKETTRANS_TRANSACTION JOIN EMM_ZOO.TICKETTRANS_TYPE ON VEHICLETRANS_ID = TRANSTYPE_ID  WHERE TICKETTRANS_TIMEIN IS NULL;";
                    $stmt = db2_exec($conn, $sql);
                    //echo $stmt;
                     while ($row = db2_fetch_assoc($stmt)) {
            $tran_price = $row['TRANSTYPE_PRICE'];
            $tran_type = $row['TRANSTYPE_NAME'];
             $hourOut = (int)substr($row['TICKETTRANS_TIMEOUT'],0,2);
            $hourIn = date('H');//(int)substr($row['TICKETTRANS_TIMEIN'],0,2);
            $extraOut = (int)substr($row['TICKETTRANS_TIMEOUT'],3,2);
            $extraIn = date('i');//(int)substr($row['TICKETTRANS_TIMEIN'],3,2);
             $price = (($hourIn - $hourOut) * $tran_price); // ราคาต้องดึงมาจาก trans_Type table
                        if(($extraIn - $extraOut)  > 0){
                            $price += $tran_price;
                        }
                        if(($extraIn - $extraOut) == 0 && ($hourIn - $hourOut) == 0 && (int)substr($row['TICKETTRANS_TIMEOUT'],6,2) !=  date('s') ){
                            $price += $tran_price;
                        }
                    
                    if($stmt) {
                    while ($row = db2_fetch_assoc($stmt)) {
                        echo "<tr><td>".$row['TICKETTRANS_ID']."</td>";
                        echo "<td>".$row['TRANSTYPE_NAME']."</td>";
                        echo "<td>".$row['TICKETTRANS_DATE']."</td>";
                        echo "<td>".$row['TICKETTRANS_TIMEOUT']."</td>";
                        echo "<td><form name='transid_form' method='post'>";
                        echo "<input type='hidden' name='id_value' value='".$row['TICKETTRANS_ID']."'/>";
                        echo "<input type='submit' title = $price name='submit_btn' value='return'/></form>";
                        echo "</tr>";
                        // printf ("%-5d %-16s %-32d\n", 
                        //    $tran_price, $tran_type, $tran_id);
                    } 
                  }
                  else { // If statement is error why see the code
                       //die('Critical error:' . db2_stmt_error($stmt));
                  }
                    db2_free_stmt($stmt);
                     }
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

