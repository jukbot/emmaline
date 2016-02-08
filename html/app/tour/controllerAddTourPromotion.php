<?php
require_once ('/var/www/html/app/model/connect.php');
    if (isset($_POST)) {
        $type = $_POST['type'];
        $price = $_POST['price'];
    }
    $conn = dbConnect();  
    if ($conn) {
        $sql = "INSERT INTO EMM_ZOO.TOUR_PROMOTION (TOURPROMOID,TOURPROMOTYPE,PRICE) VALUES (DEFAULT,'".$type."',".$price.");"; 
        echo $sql;  
        $rc = db2_exec($conn, $sql);
        if ($rc) {
            echo "<script>alert(Added');window.location='add_tour_promotion.php';</script>";
        }
        else {
            // die('Critical error:' . db2_stmt_error($insert));
        }
        db2_close($conn);
    }
    else {
       echo db2_conn_errormsg($conn);
    }
?>