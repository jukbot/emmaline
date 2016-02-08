<?php
require_once ('/var/www/html/app/model/connect.php');


    
    if (isset($_POST)) {
        $empid = $_POST['empid'];
   

    }
    
    $conn=dbConnect();
    if($conn) {
        
       

                $insert = "DELETE FROM EMM_ZOO.TICKETGATE_TRANSACTION WHERE TICKETGATE_ID = $empid;";
                print $insert;
                $rc =db2_exec($conn, $insert);

                if($rc) {
                                echo "sucessfull";
                                header('Location:insert.php');
                        }

                    
                    else { 
                        die('Critical error: '. db2_stmt_error($stmt));
                    }
                  
        db2_free_stmt($stmt);
        db2_close($conn);
    } else {
        echo db2_conn_errormsg($conn);
    }


?>