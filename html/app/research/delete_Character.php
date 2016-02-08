<?php 
require_once ('/var/www/html/app/model/connect.php');
    $id = $_POST['delete_Character'];
	echo $id;
    $sql = "DELETE FROM EMM_ZOO.ANIMAL_CHARACTORISTICS WHERE RECORDID = $id;";
    echo $sql;
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
                echo "<script>";
				echo "alert('Deleted successfully')";
				echo "</script>";
				header("Location: AnimalCharacter.php"); 
            }
    db2_free_stmt($stmt);
	db2_close($conn);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
?>