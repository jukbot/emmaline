<?php
require_once ('/var/www/html/app/model/connect.php');

function updateTicket() {
    // connect db=> stmt sql => insert => refresh page 
    if (isset($_POST)) {
	$type[0] = $_POST['typeC'];
    $type[1] = $_POST['typeA'];
    $type[2] = $_POST['typeF'];
    $num[0] = intval($_POST['TicketNumC']);
    $num[1] = intval($_POST['TicketNumA']);
    $num[2] = intval($_POST['TicketNumF']);
      //$num = $_POST['TicketNum'];
    }
    
    // start connect db
    $conn = dbConnect();  
    if ($conn) {

//Part one select data from tickettype
        for($i = 0 ; $i <=2 ; $i++){
            if($num[$i] == 0){
                continue;
            }
$sql = "SELECT * FROM EMM_ZOO.TICKETGATE_TYPE WHERE TICKETGATE_TYPE = '$type[$i]';";

        
$stmt = db2_prepare($conn, $sql);
$result = db2_execute($stmt);
while ($row = db2_fetch_assoc($stmt)) {
    $ticket_price = $row['TICKETGATETYPE_PRICE'];
    $ticket_type = $row['TICKETGATE_TYPE'];
    $ticket_id = intval($row['TICKETGATETYPE_ID']);
     //printf ("%-5d %-16s %-32d\n", 
     //   $ticket_price, $ticket_type, $ticket_id);
}
$insert = "INSERT INTO EMM_ZOO.TICKETGATE_TRANSACTION (TICKETGATE_ID, TICKETGATETYPE_ID, TICKETGATE_DATE, TICKETGATE_NUM, TICKETGATE_PRICE) VALUES (DEFAULT, $ticket_id, CURRENT DATE, $num[$i]".",". $ticket_price*$num[$i] .");";
        //echo $insert;     
$rc = db2_exec($conn, $insert); // ตรงนี้ error ยังไม่เสร็จ
            
      
if ($rc) {
 // echo "Insert successfully!!";
echo "<script>alert('$num[$i] $type[$i] ticket has sole  in price ".($ticket_price*$num[$i])."');window.location='GateTricket.php';</script>";
}

else { // If statement is error why see the code
	 die('Critical error:' . db2_stmt_error($stmt));
}

// finish all query statement      
db2_free_stmt($stmt);
}
db2_close($conn);
}
else {
   echo db2_conn_errormsg($conn);
}   
}

?>