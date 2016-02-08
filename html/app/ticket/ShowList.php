<?php 
   require_once ('/var/www/html/app/model/connect.php');
   require_once ('Show_reseve.php');
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
        <div style="text-align:center; font-size:50px;">Show List</div>
        <table border="3px" style="border-collapse: collapse; margin:auto; background-color:rgba(255,255,255,0.1);">
            <tr><td>SHOW TICKET ID</td><td>DATE</td><td>SHOW ID</td><td>ZONE ID</td><td>SHOW NAME</td><td>Start Time</td><td>End Time</td><td>Reseve</td></tr>
            <?php 
                $conn = dbConnect();  
                if ($conn) {
                    //echo "connection status : ".$conn;
                    //Part one select data from tickettype
                    $sql = "SELECT * FROM EMM_ZOO.SHOW_TICKET WHERE DATES >= CURRENT DATE  AND ENDTIME >= CURRENT TIME;";
                    $stmt = db2_exec($conn, $sql);
                    //echo $stmt;
                    
                    if($stmt) {
                    while ($row = db2_fetch_assoc($stmt)) {
                        echo "<tr><td>".$row['SHOW_TICKETID']."</td>";
                        echo "<td>".$row['DATES']."</td>";
                        echo "<td>".$row['SHOWID']."</td>";
                        echo "<td>".$row['ZONEID']."</td>";
                        echo "<td>".$row['SHOWNAME']."</td>";
                        echo "<td>".$row['STARTTIME']."</td>";
                        echo "<td>".$row['ENDTIME']."</td>";
                        echo "<td><form name='showid_form' method='post'>";
                        echo "<input type='hidden' name='showid_value' value='".$row['SHOW_TICKETID']."'/>";
                        echo "<input type='submit' name='submit_btn' value='reseve'/></form>";
                        echo "</tr>";
                        // printf ("%-5d %-16s %-32d\n", 
                        //    $tran_price, $tran_type, $tran_id);
                    }
                        if(empty($row)) {
                        echo "<tr><td colspan='8' class='center_text'>No Show available.</td></tr>"; 
                        };
                  }
                  else { // If statement is error why see the code
                    //   die('Critical error:' . db2_stmt_error($stmt));
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

