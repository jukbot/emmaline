<?php
require_once ('/var/www/html/app/model/connect.php');


    
    if (isset($_POST)) {
        $shopexid = $_POST['shopexid'];
   

    }
    
    $conn=dbConnect();
    if($conn) {
        
       

                $insert = "DELETE FROM EMM_ZOO.ZOOSHOP_EXPENSE WHERE SHOPEXPENSE_ID = $shopexid ;";
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