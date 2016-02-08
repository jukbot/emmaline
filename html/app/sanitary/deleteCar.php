<?php
require_once ('/var/www/html/app/model/connect.php');

    $carID = (isset($_GET['delete_id']) ? $_GET['delete_id'] : null);

    $conn = dbConnect();
    if ($conn) {
        $sql = "DELETE FROM EMM_ZOO.SANICAR WHERE CARID =".$carID.";";
        $result = db2_exec($conn, $sql);
        if ($result) {
            echo "<script>";
            echo "alert('Deleted Successfully')";
            echo "</script>";
            header("Refresh:0; url=sani_garbage.php#car_list");
            exit();
        } else { 
            $resultMessage = 0;
            return $resultMessage;
        }
        db2_free_stmt($stmt);
        db2_close($conn);
    }
    else {
        echo db2_conn_errormsg();
    }
?>