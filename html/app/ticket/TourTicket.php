<?php 
   require_once ('/var/www/html/app/model/connect.php');
   require_once ('TourList.php');
   if (isset($_POST['submit_btn'])) {
     updateTicket();
    //header("Refresh:0");
   }
                
?>
<html>
    <head>
        <style>
            td {
                padding: 10px;
            }
            .center_text {   
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center; font-size:50px;">Tour List</div>
        <table border="3px" style="border-collapse: collapse; margin:auto; background-color:rgba(255,255,255,0.1);">
            <tr><td>Tour ID</td><td>DATE</td><td>Start Time</td><td>End Time</td><td>Type</td><td>Price</td><td>Reseve</td></tr>
            <?php 
                $conn = dbConnect();  
                if ($conn) {
                    //echo "connection status : ".$conn;
                    //Part one select data from tickettype
                    $sql = "SELECT TOURTICKETID , DATES , STARTTIME , ENDTIME , TYPE , TOURTICK_PRICE FROM EMM_ZOO.TOUR_TICKET, EMM_ZOO.TOUR_TICKET_TYPE WHERE DATES >= CURRENT DATE AND ENDTIME <= CURRENT TIME";
                    $stmt = db2_exec($conn, $sql);
                    //echo $stmt;
                    
                    if($stmt) {
                    while ($row = db2_fetch_assoc($stmt)) {
                        echo "<tr><td>".$row['TOURTICKETID']."</td>";
                        echo "<td>".$row['DATES']."</td>";
                        echo "<td>".$row['STARTTIME']."</td>";
                        echo "<td>".$row['ENDTIME']."</td>";
                        echo "<td>".$row['TYPE']."</td>";
                        echo "<td>".$row['TOURTICK_PRICE']."</td>";
                        echo "<td><form name='tourid_form' method='post'>";
                        echo "<input type='hidden' name='tourid_value' value='".$row['TOURTICKETID']."'/>";
                        echo "<input type='submit' name='submit_btn' value='reseve'/></form>";
                        echo "</tr>";
                        // printf ("%-5d %-16s %-32d\n", 
                        //    $tran_price, $tran_type, $tran_id);
                    }
                        if(empty($row)) {
                        echo "<tr><td colspan='7' class='center_text'>No Tour available.</td></tr>"; 
                        };
                  }
                  else { // If statement is error why see the code
                      echo db2_stmt_error($stmt);
                  }
                    db2_free_stmt($stmt);
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

