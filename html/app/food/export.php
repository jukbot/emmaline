<?php
require_once ('/var/www/html/app/model/connect.php');
require_once ('/var/www/html/app/library/function.php');

	function exportfood(){
		if (isset($_POST)) {

		 $food_id = $_POST['food_id2'];
		 $food_name = $_POST['food_name2'];
		 $food_type = $_POST['food_type2'];
		 $out_amount = $_POST['out_amount'];
		 $username = $_SESSION['current_user_name'];
	   }

	   $conn = dbConnect();
	   if ($conn) {
			$sql0 = "SELECT AMOUNT FROM EMM_ZOO.FM_STOCK WHERE FOODID = $food_id;";
			$stm = dbQuery($conn,$sql0);
			while ($row = dbFetchArray($conn,$stm)) {
				$amountx = $row[0];
			}
			$amount_now = $amountx - $out_amount;
			if($amount_now > 0){
				$sql1 = "UPDATE EMM_ZOO.FM_STOCK SET AMOUNT = $amount_now WHERE FOODID = $food_id;";
				$cz = db2_exec($conn,$sql1);

				$sql2 = "INSERT INTO EMM_ZOO.FOOD_GIVE(GIVENO,FOODID,EMPID,FOODNAME,FOODTYPE,AMOUNT,GIVETIME,ANIMAL) VALUES (DEFAULT,'$food_id','5678','$food_name','$food_type',$out_amount,NULL,NULL);";
				$cb = db2_exec($conn,$sql2);
				if ($cb && $cz) {
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
			else{
				echo "<script language='javascript'>alert('Not enough food!');</script>";
			}
	}
}
?>