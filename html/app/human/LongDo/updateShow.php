<?php
require_once ('/var/www/html/app/model/connect.php');


    
    if (isset($_POST)) {
        $responid = $_POST['responid'];
        $shopexid = $_POST['shopexid'];

    }
    
    $conn=dbConnect();
    if($conn) {
        
       

                $insert = "UPDATE EMM_ZOO.TICKETTRANS_TRANSACTION SET TICKETTRANS_TIMEIN = current time WHERE TICKETTRANS_ID=$shopexid;";
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