<?php
$conn = dbConnect();
$sqlDriver = "SELECT D.DRIVERID, E.FIRSTNAME, E.LASTNAME FROM EMM_ZOO.EMPLOYEE E, EMM_ZOO.TOUR_DRIVER D WHERE E.EMPID = D.EMPID";
$stmt = db2_prepare($conn, $sqlDriver);
$result = db2_execute($stmt);
while ($row = db2_fetch_assoc($stmt)) {
	$driverId = $row['DRIVERID'];
	$name = $row['FIRSTNAME']."  ".$row['LASTNAME'];
}
db2_free_stmt($stmt);
?>