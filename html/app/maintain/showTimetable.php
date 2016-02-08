<?php 
require_once ('/var/www/html/app/model/connect.php');

   $sql =  "SELECT MPSNO, EMM_ZOO.MAINTEGERAINPERSON.EMPID,FIRSTNAME, LASTNAME, REQUESTID FROM EMM_ZOO.EMPLOYEE, EMM_ZOO.MAINTEGERAINPERSON
    WHERE EMM_ZOO.MAINTEGERAINPERSON.EMPID = EMM_ZOO.EMPLOYEE.EMPID
    ORDER BY MPSNO;";
    
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            while ($row = db2_fetch_assoc($stmt)) {
                print "\t<tr><td>".$row['MPSNO']."</td><td>".$row['EMPID']."</td><td>".$row['FIRSTNAME']."</td></td><td>".$row['LASTNAME']."</td></td><td>".$row['REQUESTID']."</td></tr>\n";
            }
			
      
            
		}
         db2_free_stmt($stmt);
	}
} 
else {
	echo db2_conn_errormsg($conn);
}
?>