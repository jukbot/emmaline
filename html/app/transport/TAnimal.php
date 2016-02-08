    <?php
    require_once ('/var/www/html/app/model/connect.php');

    function Animal(){
    $up = "N";
    if (isset($_POST)) {
        $empID = $_POST['empID'];
        $animalID = $_POST['animalID'];
        $species = $_POST['species'];
        $approvalID = $_POST['approvalID'];
        $destination = $_POST['destination'];
        $start= $_POST['start'];
        $end = $_POST['end'];
        $animalExpertID = $_POST['animalExpertID'];
        $total = $_POST['total'];
        $carID = $_POST['carID'];

        // an array that want to insert this can be multiple array at the time.
    $data = array($empID ,$animalID ,$animalExpertID ,$species ,$start ,$destination ,$approvalID ,$total,$carID);
    $databorrow = array($carID,$empID ,$start ,$end);
     // print var_dump to display an array of variable data with type that prepare for query.
     //echo var_dump($data) ."<br>";
    }

    // define $conn from model
    $conn = dbConnect();

    if ($conn) {
    // DEFAULT if you set generated as identify with specifier this will auto increament for integer.
    $sql = 'INSERT INTO EMM_ZOO.TRANSPORT(TRANSPORTATIONNO,EMPLOYEEID, ANIMALID, ANIMALEXPERTID, ANIMALSPECIES,STARTDATE,DESTINATION,APPROVEID,TOTALOFANIMAL,CARID) VALUES (DEFAULT,?,?,?,?,?,?,?,?,?);';
    $update = "UPDATE EMM_ZOO.CARS SET EMM_ZOO.CARS.AVAILABLE = '".$up."' WHERE EMM_ZOO.CARS.CARID = '".$carID."';";
    $sql2 = "SELECT AVAILABLE FROM EMM_ZOO.CARS WHERE EMM_ZOO.CARS.CARID = '".$carID."';";
    $borrow = "INSERT INTO EMM_ZOO.CARS_BORROWED(BORROWNO, CARID, EMPID, BORROWDATE,RETURNDATE) VALUES (DEFAULT,?,?,?,?);";
    echo $sql;
    // prepare statement using connection and sql
    $stborrow = db2_prepare($conn,$borrow);
    $stmt = db2_prepare($conn, $sql);
    $result3 = dbQuery($conn,$sql2);
    $row = dbFetchArray($conn,$result3);
    if($start>$end){
      echo "<script type='text/javascript'>alert(' You need to return after borrow date');</script>";
      header("Refresh:0; url=transportation_animal.php");
     }else{
            if($row[0] == 'N'){

                echo "<script type='text/javascript'>alert('This car is not available to borrow');</script>";
                header("Refresh:0; url=transportation_animal.php");
            }else{

    // If statement is valid execute it to db2
     if ($stmt) {
            //echo "SQL is valid<br>";
        $result = db2_execute($stmt, $data);
        if ($result) {
            $resultMessage = "Successfully";
            $result2 = db2_exec($conn, $update);

            if ($result2) {
                print "Updated successfully\n";
                if ($stborrow) {
                //echo "SQL is valid<br>";
                $result9 = db2_execute($stborrow, $databorrow);
                        if ($result9) {
                            $resultMessage = "Successfully";
            
            
                        }
                        else {
                
                        }
                }
                echo "<script type='text/javascript'>alert('CAR BORROWING SUCCESSFUL');</script>";
                //echo "Successfully added";
                header("Refresh:0; url=transportation_animal.php"); 
            }
            
        }
        else {
                echo "<script type='text/javascript'>alert('You need to fill all input OR Your employeeID,carID,animalID,approvalID does not exist');</script>";
                header("Refresh:0; url=transportation_animal.php");
              $resultMessage = "Failed to query into database";
        }
    }
    


    else { // If statement is error why see the code
         die('Critical error:' . db2_stmt_error($stmt));
    }
    }
}
    db2_free_stmt($stborrow);
    db2_free_stmt($stmt);
    db2_close($conn);
    }
    // callback alert if failed to connect to database return msg
    else {
       echo db2_conn_errormsg($conn);
    }

    }
    ?>