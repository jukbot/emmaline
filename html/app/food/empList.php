<?php
require_once ('/var/www/html/app/model/connect.php');
require_once ('/var/www/html/app/library/function.php');

$conn = dbConnect();
if ($conn) {
	$sql = "SELECT * FROM EMM_ZOO.EMPLOYEE WHERE JOBID = '35' ORDER BY EMPID;";
	$stmt = dbQuery($conn,$sql);
	$count = 0;
	while ($row = dbFetchArray($conn,$stmt)) {
	$count++;
	print "\t<tr><td>$row[0]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td>$row[4]</td>
	<td>$row[5]</td>
	<td>$row[10]</td>
	</tr>\n";
	}

	if($count == 0) {
	print "\t<tr><td colspan='6' class='center brown-text'>;
	No staff found</tr>\n";
	}

	db2_free_stmt($stmt);
	db2_close($conn);
}

?>