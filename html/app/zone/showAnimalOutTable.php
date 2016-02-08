<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.ANIMAL INNER JOIN EMM_ZOO.ANIMALIN ON (EMM_ZOO.ANIMAL.ANIMALID = EMM_ZOO.ANIMALIN.ANIMALID) INNER JOIN EMM_ZOO.ANIMALOUT ON
            (EMM_ZOO.ANIMALIN.ANIMALINCAGEID = EMM_ZOO.ANIMALOUT.ANIMALINCAGEID) ; ORDER BY ANIMALINCAGEID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<form type='post' name='alter_form'>";
            print "<tr><td>" . $row['ANIMALINCAGEID']. "</td><td>" . $row['ANIMALNAME']. "</td><td>" . $row['TIMEOUT'] . "</td>";
            print "</form>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
        	echo db2_conn_errormsg($conn);
    }
?>