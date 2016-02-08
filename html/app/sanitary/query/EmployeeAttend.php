<?php
require_once ('/var/www/html/app/model/connect.php');
$conn = dbConnect();
if ($conn) {
$sql = "SELECT dates, empid, dutyname, starttime, endtime FROM EMM_ZOO.SANIEMP_ATTEND join EMM_ZOO.DUTY on EMM_ZOO.SANIEMP_ATTEND.dutyid = EMM_ZOO.DUTY.dutyid ORDER BY Dates ASC;";
$stmt = dbQuery($conn,$sql);
while ($row = dbFetchArray($conn,$stmt)) {
print "\t<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>\n";
}
db2_free_stmt($stmt);
db2_close($conn);
}
else {
echo "Connection failed" .db2_conn_errormsg($conn);
}
?>