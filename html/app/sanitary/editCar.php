<?php
require_once ('/var/www/html/app/model/connect.php');

function editCarPlate() {
    if (isset($_POST)) {
        $carid   = $_POST['update_carid'];
        $carplate = $_POST['edit_carplate'];
    }

    $conn = dbConnect();
    if ($conn) {
   
        $sql = "UPDATE EMM_ZOO.SANICAR SET CARID = '$carid', CARPLATE = '$carplate' WHERE CARID = $carid;";

        $result = db2_exec($conn, $sql);
        if ($result) {
             echo "<script>";
            echo "alert('Updated successfully')";
            echo "</script>";
             header('Location: sani_garbage.php#car_list');
            exit();
        } else {
            $resultMessage = 0;
            echo "<script>";
            echo "alert('Updated unsuccessfully')";
            echo "</script>";
            return $resultMessage;
        }
        db2_free_stmt($stmt);
        db2_close($conn);
    }
    else {
        echo db2_conn_errormsg();
    }
}
?>