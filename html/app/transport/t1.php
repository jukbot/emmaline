    <?php
    require_once ('/var/www/html/app/model/connect.php');
    //echo "<script type='text/javascript'>alert('Really annoying pop-up!');</script>"; 
    function Borrow(){
     $up = "N";
    if (isset($_POST)) {
        $empID = $_POST['empID'];
        $carID = $_POST['carID'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        // an array that want to insert this can be multiple array at the time.
    $data = array($carID,$empID ,$start ,$end);
    //$data2 = array($carID);
     // print var_dump to display an array of variable data with type that prepare for query.
     //echo var_dump($data) ."<br>";
    }

    // define $conn from model
    $conn = dbConnect();

    if ($conn) {
    // DEFAULT if you set generated as identify with specifier this will auto increament for integer.
    $sql = "INSERT INTO EMM_ZOO.CARS_BORROWED(BORROWNO, CARID, EMPID, BORROWDATE,RETURNDATE) VALUES (DEFAULT,?,?,?,?);";
    $update = "UPDATE EMM_ZOO.CARS SET EMM_ZOO.CARS.AVAILABLE = '".$up."' WHERE EMM_ZOO.CARS.CARID = '".$carID."';";
    $sql2 = "SELECT AVAILABLE FROM EMM_ZOO.CARS WHERE EMM_ZOO.CARS.CARID = '".$carID."';";
    
    // prepare statement using connection and sql
    $stmt = db2_prepare($conn, $sql);
    //$stmt2 = db2_prepare($conn, $sql2);
    // If statement is valid execute it to db2
    $result3 = dbQuery($conn,$sql2);
    $row = dbFetchArray($conn,$result3);
     if($start>$end){
      echo "<script type='text/javascript'>alert('You need to return after borrow date');</script>";
      header("Refresh:0; url=TransportationEmployee.php");
     }else{

        if($row[0] == 'N'){

            echo "<script type='text/javascript'>alert('This car is not available to borrow');</script>";
            header("Refresh:0; url=TransportationEmployee.php");
        }else{

    if ($stmt) {

            //echo "SQL is valid<br>";
        $result = db2_execute($stmt, $data);
         
        if ($result) {
            $resultMessage = "Successfully";
            $result2 = db2_exec($conn, $update);

            if ($result2) {
               print "Updated successfully\n";
            }

            echo "<script type='text/javascript'>alert('CAR BORROWING SUCCESSFUL');</script>";
            //echo "Successfully added";
            header("Refresh:0; url=TransportationEmployee.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
        }
        else {
            echo "<script type='text/javascript'>alert('You need to fill all input OR Your employeeID,carID does not exist');</script>";
            header("Refresh:0; url=TransportationEmployee.php");
            //  $resultMessage = "Failed to query into database";
        }
    }
    

    
    else { // If statement is error why see the code
         die('Critical error:' . db2_stmt_error($stmt));
    }
}
}
    db2_free_stmt($stmt);
    db2_free_stmt($result3);

    db2_close($conn);
    }
    // callback alert if failed to connect to database return msg
    else {
       echo db2_conn_errormsg($conn);
    }

    }
    ?>