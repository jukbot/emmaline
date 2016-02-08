<?php
require_once('/var/www/html/app/model/connect.php');

  if (isset($_GET) ) {
      $ticketID = $_GET['ticketID'];
  }

  $conn = dbConnect();
  if ($conn) {
      $update_checkout = "UPDATE EMM_ZOO.PARKCHECKINOUT SET CHECKOUT = current time WHERE TICKETPARKID = $ticketID;";
      $select_hour = "SELECT HOUR(CHECKOUT) - HOUR(CHECKIN) as hours, MINUTE(CHECKOUT) - MINUTE(CHECKOUT) as minutes FROM EMM_ZOO.PARKHISTORY WHERE VEHI_ID =".$ticketID.";";
      $checkout_delete = "DELETE FROM EMM_ZOO.PARKCHECKINOUT WHERE TICKETPARKID =".$ticketID.";";

    $stmt1 = db2_exec($conn, $update_checkout);
     if($stmt1) {
             $stmt2 = db2_exec($conn, $select_hour);
              while ($row = dbFetchAssoc($stmt2)) {
                    $hour = abs($row['HOURS']);
              }
                     switch ($hour) {
                      case $hour <= 1:
                           $fee = 0;
                          break;
                      case $hour > 1 && $hour <= 2:
                           $fee = $hour*10;
                          break;
                      case $hour > 2 && $hour <= 4:
                          $fee = $hour*20;
                          break;
                      case $hour > 4 :
                          $fee = $hour*30;
                          break;
                      default:
                          $fee = 0;
                          break;
                       }
              if($stmt2) {
                  $update_history = "UPDATE EMM_ZOO.PARKHISTORY SET CHECKOUT = current time, FEE = $fee WHERE VEHI_ID = $ticketID;";
                  $stmt3 = db2_exec($conn, $update_history);
                  $stmt4 = db2_exec($conn, $checkout_delete);
              if($stmt1 & $stmt2 & $stmt3 & $stmt4) {  
                  echo "<h2>Total hour:". $hour .  "<br>    Total fee: " . $fee . " Baht</h2>"; 
                  echo "<a href='checkinout.php'>Return</a>";
         } else {
          echo "<script>";
          echo "alert('Failed $stmt1 '  and ' $stmt2')";
          echo "</script>";
          //header("Refresh:0; url=checkinout.php"); 
        }
                 // "<script>alert('Checkout successfully , Total duration: " .$hour. " Hrs. / Total Fee: ".$fee."');</script>";
                    //echo "<script>"alert('Checkout successfully , Total duration: $hour Hrs. / Total Fee: $fee.')"</script>";
                    //header("Refresh:0; url=checkinout.php"); 
              }
    }

        db2_free_stmt($stmt1);
        db2_free_stmt($stmt2);
        db2_close($conn);
  } else {
    echo db2_conn_errormsg($conn);
  }


?>