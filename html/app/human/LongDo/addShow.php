<?php
require_once ('/var/www/html/app/model/connect.php');


    
    if (isset($_POST)) {
        $shopexid = $_POST['shopexid'];
        $date = $_POST['date'];
        $shopexlist = $_POST['shopexlist'];
        $price = $_POST['price'];
        $responid = $_POST['responid'];

    }
    
    $conn=dbConnect();
    if($conn) {
        
       

                $insert = "INSERT INTO EMM_ZOO.ZOOSHOP_EXPENSE(SHOPEXPENSE_ID, DATES, SHOPEXPENSE_LIST,PRICE, RESPONPERSONID) values($shopexid,  '$date', '$shopexlist',  $price , $responid);";
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