<?php
require_once ('/var/www/html/app/model/connect.php');

function upOrder(){

if (isset($_POST)) {
    $product_id = $_POST['product_id'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $po_no = $_POST['po_no'];
    $po_date= $_POST['po_date'];
    $emp_id= $_POST['emp_id'];
    $supplier_id= $_POST['supplier_id'];
    $supplier_name= $_POST['supplier_name'];
    $contact= $_POST['contact'];
    $first_name= $_POST['first_name'];
    $address= $_POST['address'];
    // an array that want to insert this can be multiple array at the time.
$data1 = array($po_no,$product_id,$price ,$amount, $po_date,$supplier_name,$emp_id);
$data2 = array($supplier_id,$supplier_name,$contact,$first_name,$address);
$data3 = array($emp_id);
 // print var_dump to display an array of variable data with type that prepare for query.
 //echo var_dump($data) ."<br>";
}

// define $conn from model
$conn = dbConnect();

if ($conn) {
// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
$sql1 = 'INSERT INTO EMM_ZOO.PURCHASEORDER(PONO, PRODUCTID, PRICE,AMOUNT,PODATE,SUPNAME,EMPID) VALUES (?,?,?,?,?,?,?);';
$sql2 = 'INSERT INTO EMM_ZOO.SUPPLIER(SUPID,SUPNAME, CONTACT,FIRSTNAME,ADDRESS) VALUES (?,?,?,?,?);';
$sql3 = 'INSERT INTO EMM_ZOO.SHOPKEEPER(EMPID) VALUES (?);';

// prepare statement using connection and sql
$stmt1 = db2_prepare($conn, $sql1);
$stmt2 = db2_prepare($conn, $sql2);
$stmt3 = db2_prepare($conn, $sql3);
// If statement is valid execute it to db2
if ($stmt1) {
        //echo "SQL is valid<br>";
    $result1 = db2_execute($stmt1, $data1);
    if ($result1) {
        $resultMessage = "Successfully added to parking reserved";
        //echo "Successfully added";
        header("Refresh:0; url=order.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
    }
    else {
          $resultMessage = "Failed to query into database";
    }
}
if ($stmt2) {
        //echo "SQL is valid<br>";
    $result2 = db2_execute($stmt2, $data2);
    if ($result2) {
        $resultMessage2 = "Successfully added to parking reserved";
        //echo "Successfully added";
        header("Refresh:0; url=order.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
    }
    else {
          $resultMessag2 = "Failed to query into database";
    }
}
if ($stmt3) {
        //echo "SQL is valid<br>";
    $result3 = db2_execute($stmt3, $data3);
    if ($result3) {
        $resultMessage3 = "Successfully added to parking reserved";
        //echo "Successfully added";
        header("Refresh:0; url=order.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
    }
    else {
          $resultMessag3 = "Failed to query into database";
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

function uploadSold(){

if (isset($_POST)) {
    $product_id = $_POST['product_id'];
    $amount = $_POST['amount'];
    $date= $_POST['date'];
    $location = $_POST['location'];
    //$location= $_POST['location'];
    $price= "SELECT EMM_ZOO.PRODUCT.PRICE FROM EMM_ZOO.PRODUCT WHERE EMM_ZOO.PRODUCT.PRODUCTNO = ".$product_id.";";
    $start= "SELECT EMM_ZOO.PROMOTION.PROSTART FROM EMM_ZOO.PROMOTION WHERE EMM_ZOO.PROMOTION.PRODUCTNO = ".$product_id.";";
    $end= "SELECT EMM_ZOO.PROMOTION.PROEND FROM EMM_ZOO.PROMOTION WHERE EMM_ZOO.PROMOTION.PRODUCTNO = ".$product_id.";";
    $discount= "SELECT EMM_ZOO.PROMOTION.PROTYPE FROM EMM_ZOO.PROMOTION WHERE EMM_ZOO.PROMOTION.PRODUCTNO = ".$product_id.";";
   // $price= $_POST['price'];
   // $toatl =$price*$amount;
   
    // an array that want to insert this can be multiple array at the time.
//$data = array( $product_id ,$price*$amount, $amount, $date);
 // print var_dump to display an array of variable data with type that prepare for query.
 //echo var_dump($data) ."<br>";
}

// define $conn from model
$conn = dbConnect();

if ($conn) {
// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
$select= "SELECT PRICE FROM PRODUCT WHERE PRODUCTNO = ".$product_id.";";
$sql = 'INSERT INTO EMM_ZOO.HISTORYSOLD(RUNNINGNO,PRODUCTNO,PRICE,AMOUNT,DATEE)  VALUES (DEFAULT,?,?,?,?);';
$update = "UPDATE EMM_ZOO.SHOP_STOCK  SET EMM_ZOO.SHOP_STOCK.AMOUNT = EMM_ZOO.SHOP_STOCK.AMOUNT - '".$amount."' 
           WHERE EMM_ZOO.SHOP_STOCK.PRODUCTNO = '".$product_id."'  
           AND EMM_ZOO.SHOP_STOCK.SHOPLOCATION = '".$location."';";
echo $sql;
// prepare statement using connection and sql
$stmt = db2_prepare($conn, $sql);
$stmt2 = db2_exec($conn, $update);

$result3 = dbQuery($conn,$start);
$startrow = dbFetchArray($conn,$result3);

$result4 = dbQuery($conn,$end);
$endrow = dbFetchArray($conn,$result4);

$result5 = dbQuery($conn,$price);
$pricerow = dbFetchArray($conn,$result5);

$result6 = dbQuery($conn,$discount);
$discountrow = dbFetchArray($conn,$result6);

echo $location;
if($date < $endrow[0] && $date >$startrow[0]){
    $pricerow[0]  = $pricerow[0] - ($pricerow[0]*$discountrow[0]/100);
}

$data2 = array( $product_id ,$pricerow[0]*$amount, $amount, $date);
// If statement is valid execute it to db2
if ($stmt) {
        //echo "SQL is valid<br>";
   $result = db2_execute($stmt, $data2);
    if ($result) {
       $resultMessage = "Successfully added to parking reserved";
       
        //echo "Successfully added";
       header("Refresh:0; url=sold.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
    }
   else {
        $resultMessage = "Failed to query into database";
    }
}
if($stmt2){
 print "Updated successfully\n";

}


//else { // If statement is error why see the code
  //   die('Critical error:' . db2_stmt_error($stmt2));
//}
db2_free_stmt($stmt);
//db2_free_stmt($stmt2);
db2_close($conn);
}
// callback alert if failed to connect to database return msg
else {
   echo db2_conn_errormsg($conn);
}

}

?>