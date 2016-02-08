    <?php
    require_once ('/var/www/html/app/model/connect.php');

    function other(){

    if (isset($_POST)) {
        $empID = $_POST['empID'];
        $type = $_POST['type'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $license = $_POST['license'];
        
        // an array that want to insert this can be multiple array at the time.
    $data = array($empID,$type,$start,$end,$license);
    $data2 = array($license,$type);
     // print var_dump to display an array of variable data with type that prepare for query.
     //echo var_dump($data) ."<br>";
    }

    // define $conn from model
    $conn = dbConnect();

    if ($conn) {
    // DEFAULT if you set generated as identify with specifier this will auto increament for integer.
    $sql = 'INSERT INTO EMM_ZOO.VEHICLE_BORROWS(BORROWVEHICLEID,EMPLOYEEID,VEHICLE_TYPE,STARTDATE,ENDDATE,LICENSE_PLATE) VALUES (DEFAULT,?,?,?,?,?);';
    $sql2 = 'INSERT INTO EMM_ZOO.CARS(CARID,LICENSE_PLATE,CARTYPE) VALUES (DEFAULT,?,?);';
    echo $sql;
    // prepare statement using connection and sql
    $stmt = db2_prepare($conn, $sql);
    $stmt2 = db2_prepare($conn, $sql2);
    if($start>$end){
      echo "<script type='text/javascript'>alert('You need to return after borrow date');</script>";
      header("Refresh:0; url=other_place.php");
     }else{
    // If statement is valid execute it to db2
    if ($stmt) {
            //echo "SQL is valid<br>";
        $result = db2_execute($stmt, $data);
        if ($result) {

            $resultMessage = "Successfully added to parking reserved";
            if ($stmt2) {
               $result2 = db2_execute($stmt2, $data2);
               if ($result2) {
                   $resultMessage = "Successfully added to parking reserved";
                    // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
                }
                else {
                            $resultMessage = "Failed to query into database";
                }
            }               
            echo "<script type='text/javascript'>alert('CAR BORROWED');</script>";
            header("Refresh:0; url= other_place.php"); // you must refresh page after insert, define specific page you want to refresh , header("Refresh:0"); it mean refresh current page
        }
        else {
                echo "<script type='text/javascript'>alert('You need to fill all input OR Your employeeID does not exist');</script>";
                header("Refresh:0; url=other_place.php");
              $resultMessage = "Failed to query into database";
        }


    }
    else { // If statement is error why see the code
         die('Critical error:' . db2_stmt_error($stmt));
    }
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