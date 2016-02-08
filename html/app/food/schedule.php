<?php
require_once ('/var/www/html/app/model/connect.php');
require_once ('/var/www/html/app/library/function.php');

if (isset($_POST['schedule_date'])) {
  $schedule_date = $_POST['schedule_date'];
  echo $schedule_date;
}

$conn = dbConnect();
if ($conn) {
	$sql = "SELECT * FROM EMM_ZOO.FOOD_SCHEDULE ORDER BY FEED_START;";
	$stmt = dbQuery($conn,$sql);
	$count = 0;
	while ($row = dbFetchArray($conn,$stmt)){
		$count++;
		print "\t<tr><td>$row[0]</td>
		<td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[5]</td>
		<td>$row[6]</td>
		<td>$row[7]</td>
		</tr>\n";
	}
		
if($count == 0) {
	print "\t<tr><td colspan='8' class='center brown-text'>
	No food found</tr>\n";
	}

db2_free_stmt($stmt);
db2_close($conn);
}

?>