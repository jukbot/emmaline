
<?php 
require_once ('/var/www/html/app/model/connect.php');
    $conn = dbConnect();
    $sql = "SELECT MPSNO, EMM_ZOO.MAINTEGERAINPERSON.EMPID,FIRSTNAME, LASTNAME, REQUESTID FROM EMM_ZOO.EMPLOYEE, EMM_ZOO.MAINTEGERAINPERSON
WHERE EMM_ZOO.MAINTEGERAINPERSON.EMPID = EMM_ZOO.EMPLOYEE.EMPID
ORDER BY MPSNO;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            while ($row = db2_fetch_array($stmt)) {
                print "\t<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>";
                print "<td><form class='form-inline' action='' method='post'>";
                print "<input type='text' class='form-control' id='assign' name='jobAssign' placeholder='Enter new maintain job'>";
                print "<td><input type='hidden' name='empID' value='".$row[0]."'>";
                print "<button type='submit' name='updateMainJobSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-cog'></span></button>";
                print "</form></td></tr>\n";

            }
    }
    db2_free_stmt($stmt);
    db2_close($conn);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
?>
