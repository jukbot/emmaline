<?php
require_once ('/var/www/html/app/model/connect.php');

function editEquipInfo() {
    if (isset($_POST)) {
        $equipid   = $_POST['update_equipid'];
        $equipname = $_POST['edit_equipname'];
        $equiptype = $_POST['edit_equiptype'];
        $status = $_POST['edit_status'];
    }

    $conn = dbConnect();
    if ($conn) {
   
        $sql = "UPDATE EMM_ZOO.SANITATION_EQUIP SET EQUIPID = '$equipid', EQUIPNAME = '$equipname' , EQUIPTYPE = '$equiptype', STATUS = '$status' WHERE EQUIPID = $equipid;";

        $result = db2_exec($conn, $sql);
        if ($result) {
             echo "<script>";
            echo "alert('Updated successfully')";
            echo "</script>";
             header('Location: sani_equip.php#car_list');
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