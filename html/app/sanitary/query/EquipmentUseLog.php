<?php
require_once ('/var/www/html/app/model/connect.php');
$conn = dbConnect();
if ($conn) {
$sql = "SELECT EMM_ZOO.SANI_EQUIPUSELOG.EQUIPID, EQUIPNAME, EMPID, WORKZONEID, BORROWDATE, RETURNDATE FROM EMM_ZOO.SANI_EQUIPUSELOG join EMM_ZOO.SANITATION_EQUIP on EMM_ZOO.SANI_EQUIPUSELOG.EQUIPID = EMM_ZOO.SANITATION_EQUIP.EQUIPID ORDER BY USENO ASC;";
$stmt = dbQuery($conn,$sql);
while ($row = dbFetchArray($conn,$stmt)) {
print "\t<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>\n";

}
db2_free_stmt($stmt);
db2_close($conn);
}
else {
echo "Connection failed" .db2_conn_errormsg($conn);
}
?>