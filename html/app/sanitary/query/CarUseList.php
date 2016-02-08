<?php
require_once ('/var/www/html/app/model/connect.php');
$conn = dbConnect();
if ($conn) {
$sql = "SELECT * FROM EMM_ZOO.SANI_GARBAGE";
$stmt = dbQuery($conn,$sql);
while ($row = dbFetchArray($conn,$stmt)) {
print "\t<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>\n";

}
db2_free_stmt($stmt);
db2_close($conn);
}
else {
echo "Connection failed" .db2_conn_errormsg($conn);
}
?>