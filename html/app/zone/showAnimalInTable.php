<?php 
require_once ('/var/www/html/app/model/connect.php');



$sql = "SELECT * FROM EMM_ZOO.ANIMAL INNER JOIN EMM_ZOO.ANIMALIN ON (EMM_ZOO.ANIMAL.ANIMALID = EMM_ZOO.ANIMALIN.ANIMALID) INNER JOIN EMM_ZOO.CAGE ON
(EMM_ZOO.ANIMALIN.CAGEID = EMM_ZOO.CAGE.CAGEID) ORDER BY OUT;";

if ($conn) {
	$stmt = db2_exec($conn, $sql);
	if($stmt) {
		while ($row = db2_fetch_assoc($stmt)) {
			print "<form action='animalOutAction.php' method='post'>";
			print "<tr><td>" . $row['ANIMALINCAGEID']. "</td><td>" . $row['ANIMALNAME']. "</td><td>" . $row['CAGENAME'] . "</td><td>" . $row['TIMEIN'] . "</td>";
			if($row['OUT'] == 0){
				print "<td><input type='hidden' name='takeOut' value='".$row['ANIMALINCAGEID']."'>";
				print "<button type='submit' name='takeOutSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-share-alt'></span></button></td>";
			} else {
				print "<td>&nbsp;</td>";
			}
			print "</tr></form>";
		}
	}
	db2_free_stmt($stmt);
} 
else {
	echo db2_conn_errormsg($conn);
}
?>