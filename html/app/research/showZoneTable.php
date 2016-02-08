<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.ZONETYPE INNER JOIN EMM_ZOO.ZONE ON (EMM_ZOO.ZONETYPE.ZONETYPEID = EMM_ZOO.ZONE.ZONETYPEID) ORDER BY ZONEID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<form type='post' name='alter_form'>";
            print "<tr><td>" . $row['ZONEID']. "</td><td>" . $row['ZONETYPENAME']. "</td><td>" . $row['ZONENAME']. "</td>";
            print "<td><button type='submit' name='edit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            print "<td><button type='submit' name='delete' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
            print "</form>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
    	echo db2_conn_errormsg($conn);
    }
?>