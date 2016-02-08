<?php
require_once ('/var/www/html/app/model/connect.php');
require_once ('/var/www/html/app/library/function.php');

	function orderoldfood(){
		if (isset($_POST)) {
		 $food_id = $_POST['food_id'];
		 $food_name = $_POST['food_name'];
		 $food_type = $_POST['food_type'];
		 $add_amount = $_POST['add_amount'];
		 $price_per = $_POST['price_per'];
		 $total = $add_amount * $price_per;
	   }

		$conn = dbConnect();
		if ($conn) {
			$sql0 = "SELECT AMOUNT FROM EMM_ZOO.FM_STOCK WHERE FOODID = $food_id;";
			$stm = dbQuery($conn,$sql0);
			while ($row = dbFetchArray($conn,$stm)) {
				$amountx = $row[0];
			}
			$amount_now = $amountx + $add_amount;
			

			$sql1 = "INSERT INTO EMM_ZOO.FOODANIMAL_EXPENSE (FOODEXPENSE_ID,DATES,FOODID,COST,RESPONPERSONID) VALUES (DEFAULT,CURRENT DATE,$food_id,$total,'5678');";
			$cb = db2_exec($conn,$sql1);
			

			$sql2 = "UPDATE EMM_ZOO.FM_STOCK SET AMOUNT = $amount_now WHERE FOODID = $food_id;";
			$cc = db2_exec($conn,$sql2);
			if ($cc && $cb) {
                    $resultMessage = 1;
                    return $resultMessage;
                    header('Location: FoodStock.php#food_list');
                } else {
                    $resultMessage = 0;
                    return $resultMessage;
                }
			db2_free_stmt($stmt);
			db2_close($conn);
	}
		

}
?>