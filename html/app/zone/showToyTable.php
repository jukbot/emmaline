<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.TOYTYPE INNER JOIN EMM_ZOO.TOY ON (EMM_ZOO.TOYTYPE.TOYTYPEID = EMM_ZOO.TOY.TOYTYPEID) INNER JOIN EMM_ZOO.CAGE ON
            (EMM_ZOO.TOY.CAGEID = EMM_ZOO.CAGE.CAGEID) ORDER BY TOYID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>" . $row['TOYID']. "</td><td>" . $row['TOYTYPENAME']. "</td><td>" . $row['CAGENAME'] . "</td>";
            print "<td><button type='submit' name='edit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            print "<form action='deleteToyAction.php' method='post'>";
            print "<td><input type='hidden' name='deleteToy' value='".$row['TOYID']."'>";
            print "<button type='submit' name='deleteToySubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>";
            print "</form></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
        	echo db2_conn_errormsg($conn);
    }
?>