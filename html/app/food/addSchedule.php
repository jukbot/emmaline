<?php
require_once ('/var/www/html/app/model/connect.php');
require_once ('/var/www/html/app/library/function.php');

function uploadSchedule() {
	if (isset($_POST)) {
		$food_id = $_POST['food_id'];
		$food_name = $_POST['food_name'];
		$food_type = $_POST['food_type'];
		$amount = $_POST['amount'];
		$animal = $_POST['animal'];
		$start = $_POST['feed_start'];
		$end = $_POST['feed_end'];
	}
	$conn = dbConnect();
    if ($conn) {
   	$sql  = "INSERT INTO EMM_ZOO.FOOD_SCHEDULE(SCHEDULE_ID,FOODID,FOODNAME,FOODTYPE,AMOUNT,ANIMAL,FEED_START,FEED) VALUES (DEFAULT,$food_id,'$food_name','$food_type',$amount,'$animal',$start,$end)";
   	$ent = db2_exec($conn,$sql);
			if ($ent) {
                    $resultMessage = 1;
                    return $resultMessage;
                } else {
                    $resultMessage = 0;
                    return $resultMessage;
                }
                db2_free_stmt($stmt);
			db2_close($conn);  
}
?>