<?php 
require_once ('/var/www/html/app/model/connect.php');
    $sql = "SELECT * FROM EMM_ZOO.MAINTAINANCEREQUEST INNER join EMM_ZOO.MAINTAININFO ON (EMM_ZOO.MAINTAININFO.MAINTEGERAINID = EMM_ZOO.MAINTAINANCEREQUEST.REQUESTID);";
        
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            while ($row = db2_fetch_assoc($stmt)) {
                print "<tr><td>".$row['REQUESTID']."</td><td>".$row['REQUESTPSNO']."</td><td>".$row['STARTDATE']."</td></td><td>".$row['ENDDATE']."</td></td><td>".$row['COST']."</td>";
                print "<form action='deleteInfoAction.php' method='post'>";
                print "<td><input type='hidden' name='deleteInfo' value='".$row['REQUESTID']."'>";
                print "<button type='submit' name='deleteInfoSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>";
                print "</form></tr>";
            }
    }
    db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
?>
