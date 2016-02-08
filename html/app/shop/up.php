<?php
require_once ('/var/www/html/app/model/connect.php');

function uploadProduct(){

if (isset($_POST)) {
	$product_id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$price = $_POST['price'];
	$amount = $_POST['amount'];
	$type = $_POST['type'];
	$expr= $_POST['expr'];
    $location= $_POST['location'];
	// an array that want to insert this can be multiple array at the time.
$data = array($product_id ,$product_name ,$type ,$price , $expr);
$data2= array($location ,$product_id ,$product_name ,$amount);
 // print var_dump to display an array of variable data with type that prepare for query.
 //echo var_dump($data) ."<br>";
}

// define $conn from model
$conn = dbConnect();

if ($conn) {
// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
$sql = 'INSERT INTO EMM_ZOO.PRODUCT(PRODUCTNO, PRODUCTNAME, TYPE, PRICE,EXPDATE) VALUES (?,?,?,?,?);';
$sql2= 'INSERT INTO EMM_ZOO.SHOP_STOCK(SHOPLOCATION, PRODUCTNO, PRODUCTNAME, AMOUNT) VALUES (?,?,?,?);';
echo $sql;
// prepare statement using connection and sql
$stmt = db2_prepare($conn, $sql);
$stmt2 = db2_prepare($conn, $sql2);

// If statement is valid execute it to db2
if ($stmt) {
	    //echo "SQL is valid<br>";
    $result = db2_execute($stmt, $data);
    if ($result) {
        $resultMessage = "Successfully added to parking reserved";
        //echo "Successfully added";
        header("Refresh:0; url=product.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
    }
    else {
    	  $resultMessage = "Failed to query into database";
    }
}
if ($stmt2) {
        //echo "SQL is valid<br>";
    $result1 = db2_execute($stmt2, $data2);
    if ($result1) {
        $resultMessage1 = "Successfully added to parking reserved";
        //echo "Successfully added";
        header("Refresh:0; url=product.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
    }
    else {
          $resultMessage1 = "Failed to query into database";
    }
}

else { // If statement is error why see the code
	 die('Critical error:' . db2_stmt_error($stmt));
}
db2_free_stmt($stmt);
db2_free_stmt($stmt2);
db2_close($conn);
}
// callback alert if failed to connect to database return msg
else {
   echo db2_conn_errormsg($conn);
}

}
?>