<?php
require_once ('/var/www/html/app/model/connect.php');

function uploadPromotion(){

if (isset($_POST)) {
	$PromoName = $_POST['PromoName'];
	$PromoID = $_POST['PromoID'];
	$ProStart = $_POST['ProStart'];
	$ProEnd = $_POST['ProEnd'];
	$ProductNO = $_POST['ProductNO'];
	$PromType= $_POST['PromType'];
	// an array that want to insert this can be multiple array at the time.
$data = array($PromoID ,$ProStart ,$ProEnd ,$ProductNO ,$PromType, $PromoName);
 // print var_dump to display an array of variable data with type that prepare for query.
 //echo var_dump($data) ."<br>";
}

// define $conn from model
$conn = dbConnect();

if ($conn) {
// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
$sql = 'INSERT INTO EMM_ZOO.PROMOTION(PROMOID, PROSTART, PROEND, PRODUCTNO, PROTYPE,PROMONAME) VALUES (?,?,?,?,?,?);';
echo $sql;
// prepare statement using connection and sql
$stmt = db2_prepare($conn, $sql);

// If statement is valid execute it to db2
if ($stmt) {
	    //echo "SQL is valid<br>";
    $result = db2_execute($stmt, $data);
    if ($result) {
        $resultMessage = "Successfully added to parking reserved";
        //echo "Successfully added";
        header("Refresh:0; url=promotion.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
    }
    else {
    	  $resultMessage = "Failed to query into database";
    }
}
else { // If statement is error why see the code
	 die('Critical error:' . db2_stmt_error($stmt));
}
db2_free_stmt($stmt);
db2_close($conn);
}
// callback alert if failed to connect to database return msg
else {
   echo db2_conn_errormsg($conn);
}

}
?>