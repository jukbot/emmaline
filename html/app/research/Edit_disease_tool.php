
<?php 
require_once ('/var/www/html/app/model/connect.php');
    
	
    $sql = "UPDATE EMM_ZOO.animaldisease SET DISEASEID = ". $_POST["diseaseid"] .", COMMON_NAME = '" . $_POST["name"] ."', SPREADING_PERIOD ='". $_POST["spread"] ."' WHERE DISEASEID = ". $_POST["diseaseid"] .";";	
	//echo $sql;
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
	$sql = "UPDATE EMM_ZOO.diseasesymptom SET blood = '". $_POST["blood"] ."',skin = '". $_POST["skin"] ."',mucus = '". $_POST["mucus"] ."' ,  behaviorchange = '". $_POST["behave"] ."',  infection = '". $_POST["infect"] ."',  organ1 = '". $_POST["organ"] ."' WHERE symptomid  =". $_POST["symid"] .";";
	//echo $sql;
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }

    $sql = "UPDATE EMM_ZOO.disease_link SET DISEASEID = ". $_POST["diseaseid"] .", symptomid = ". $_POST["symid"] ." WHERE DISEASEID = ". $_POST["diseaseid"] .";";	
	//echo $sql;
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }	
?>


