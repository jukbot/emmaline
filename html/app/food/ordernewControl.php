<?php
require_once ('/var/www/html/app/model/connect.php');
require_once ('/var/www/html/app/library/function.php');


	function ordernewfood(){
		if (isset($_POST)) {
		 $food_name = $_POST['food_name'];
		 $food_type = $_POST['food_type'];
		 $add_amount = $_POST['add_amount'];
		 $price_per = $_POST['price_per'];
		 $total = $add_amount * $price_per;
		 $username = $_POST['username'];
		 $data = array($food_name,$food_type,$add_amount,$price_per);
	   }

		$conn = dbConnect();
		if ($conn) {
			$conn = dbConnect();

		
			
			$sql0 = "INSERT INTO EMM_ZOO.FM_STOCK (FOODID,FOODNAME,TYPE,AMOUNT,PERAMOUNT) VALUES(DEFAULT,'$food_name','$food_type',$add_amount, $price_per)";
			$ca = db2_exec($conn,$sql0);
			if ($ca) {
                    $resultMessage = 1;
                    return $resultMessage;
                } else {
                    $resultMessage = 0;
                    return $resultMessage;
                }

			$sql1 = "SELECT FOODID FROM EMM_ZOO.FM_STOCK WHERE FOODNAME = '$food_name';";
			$stm = dbQuery($conn,$sql);
			while ($row = dbFetchArray($conn,$stm)) {
				$foodidx = $row[0];
			}

			$sql2 = "INSERT INTO EMM_ZOO.FOODANIMAL_EXPENSE (FOODEXPENSE_ID,DATES,FOODID,COST,RESPONPERSONID) VALUES (DEFAULT,current date,$foodidx,$total,$username);";
			$sc = db2_exec($conn,$sql2);
			if ($sc) {
                    $resultMessage = 1;
                    return $resultMessage;
                    header('Location: FoodStock.php#order_new');
                    exit();
                } else {
                    $resultMessage = 0;
                    return $resultMessage;
                }

			db2_free_stmt($stmt);
			db2_close($conn);
		}
	}
	?>   