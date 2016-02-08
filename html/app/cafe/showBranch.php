<?php
    require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.CAFE_BRANCH, EMM_ZOO.EMPLOYEE WHERE MANAGERID = EMPID ORDER BY BRANCHID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        print "<tr>";
        print "<th>Branch No.</th>";
        print "<th>Open time</th>";
        print "<th>Close time</th>";
        print "<th>No. of Shops</th>";
        print "<th>Manager</th>";
        print "<th>Edit</th>";
        print "<th>Delete</th>";
        print "</tr>";
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>".$row['BRANCHID']."</td><td>".$row['OPENTIME']."</td><td>".$row['CLOSETIME']."</td><td>".$row['NUMBEROFSHOP']."</td><td>".$row['FIRSTNAME']." ".$row['LASTNAME']."</td><td><a onclick=\"return editBranch(".$row['BRANCHID'].");\">Edit</a></td><td><a onclick=\"return delBranch(".$row['BRANCHID'].");\">Delete</a></td></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
    	echo db2_conn_errormsg($conn);
    }
?>
