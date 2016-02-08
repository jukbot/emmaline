Long test do NaJa

<?php
/*        require_once ('/var/www/html/app/model/connect.php');

        function showDept(){

            if($_POST['submit_dept'] != $_SESSION['department']) {
                header('Location:index.php');
            }else { 
                //print_r($_POST);
            
                if(isset($_POST['department'])){
                    $year= $_POST['year'];
                    $department= $_POST['department'];
   switch ($department) {
        case '1':
                $sqlIn = 'SELECT CAFEEXPENSE_ID, DATES, CAFEEXPENSE_LIST, PRICE FROM CAFEINCOME_EXPENSE WHERE  year(DATES)= $year';
                    $idIncome = "CAFEEXPENSE_ID";
                    $dateIncome = "DATES";
                    $listIncome = "CAFEEXPENSE_LIST";
                    $priceIncome = "PRICE";

               $sqlEx=  'SELECT CAFEINCOME_ID, DATES, CAFEINCOME_LIST, PRICE FROM CAFEINCOME_EXPENSE WHERE  year(DATES)= $year';
                  
            break;
        case '2':
                $sqlIn = 'SELECT SHOPINCOME_ID, DATES, SHOPINCOME_LIST, PRICE FROM ZOOSHOP_INCOME WHERE  year(DATES)= $year';
                $sqlEx=  'SELECT SHOPEXPENSE_ID, DATES, SHOPEXPENSE_LIST, PRICE FROM ZOOSHOP_EXPENSE WHERE  year(DATES)= $year';
            break;
        case '3':
                $sqlIn = 'SELECT ZOOTICKET_ID, DATES,'ZooTicket',ZOOTICKET_PRICE FROM ZOO_TICKET,ZOO_TICKET_TYPE WHERE TYPE=ZOOTICKET_TYPEID, year(DATES)= $year';
                $deptEx=  null;
            break;
        case '4':
                $sqlIn = 'SELECT TOURID, DATES, 'TourTicket', AMOUNT FROM TOUR WHERE  year(DATES)= $year';
                $deptEx=  null;
            break;
        case '5':
                $sqlIn = 'SELECT SHOW_TICKETID, DATES, 'ShowTicket', SHOWTICK_PRICE FROM SHOW_TICKET,SHOW_TICKET_TYPE WHERE SHOW_TICKETID=SHOWTICK_TYPEID ,year(DATES)= $year';
                $deptEx=  null;
            break;
        case '6':
                $deptIn = null;
                $sqlEx=  'SELECT FOODEXPENSE_ID, DATES, FOODEXPENSE_LIST, COST FROM FOODANIMAL_EXPENSE WHERE  year(DATES)= $year';
            break;
        case '7':
                $deptIn = null;
                $sqlEx=  'SELECT SLIPNO, PAYDATE, 'Salary', SALARY  FROM HR_SALARY WHERE  year(PAYDATE)= $year';
            break;
        case '8':
                $deptIn = null;
                $sqlEx=  'SELECT TREATEXPENSE_ID, DATES, TREATEXPENSE_LIST, COST FROM HEALTHCARE_EXPENSE WHERE  year(DATES)= $year';
            break;
        case '9':
                $deptIn = null;
                $sqlEx=  'SELECT RESEXPENSE_ID, DATES, RESEXPENSE_LIST, COST FROM ANIMALRESEARCH_EXPENSE WHERE  year(DATES)= $year';
            break;
 
        case '10':
                $deptIn = null;
                $sqlEx=  'SELECT TRANSPORTEX_ID, DATES, TRANSPORTEX_LIST, COST FROM TRANSPORT_EXPENSE WHERE  year(DATES)= $year';
            break;
        case '11':
                $sqlIn = 'SELECT ANILENDINCOME_ID, DATES, ANILENINCOME_LIST, COST FROM ANIMAL_LEND WHERE  year(DATES)= $year';
                $sqlEx=  'SELECT ANIBOREXPENSE_ID, DATES, ANIBOREXPENSE_LIST, COST FROM ANIMAL_BORROW WHERE  year(DATES)= $year';
            break;
        case '12':
                $deptIn = null;
                $sqlEx=  'SELECT MAINTEGERAINEX_ID, DATES, MAINTEGERAINEX_LIST, COSTMAINTEGERAIN FROM MAINTAINANCE_EXPENSE WHERE  year(DATES)= $year';
            break;

        default:
                $deptIn = null;
                $sqlEx=  'SELECT SANIEX_ID, DATES, SANIEX_LIST, COST FROM SANITAION_EXPENSE WHERE  year(DATES)= $year';
            break;



    // an array that want to insert this can be multiple array at the time.
   $dataIncome = array($idIncome ,$dateIncome ,$listIncome , $priceIncome);
   $dataExpense = array($idExpense ,$dateExpense ,$listExpense , $priceExpense);
   

            }
        }

            $conn = dbConnect();

            if ($conn) {
// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
                $sql = 'SELECT CAFEEXPENSE_ID, DATES, CAFEEXPENSE_LIST, PRICE FROM CAFEINCOME_EXPENSE WHERE  year(DATES)= $year';
//echo $sql;
// prepare statement using connection and sql
                $stmt = db2_prepare($conn, $sql);

                                                    echo "<table>";
                                                        echo "<tr>
                                                                <th><strong>Expense No.</strong></th>
                                                                <th><strong>date</strong></th>
                                                                <th><strong>Expense List</strong></th>
                                                                <th><strong>cost</strong></th>

                                                              </tr>";

                                                        while ($data = mysqli_fetch_array($stmt)) {
            
                                                        echo "<tr>";
                                                        echo "<td> {$data['CAFEEXPENSE_ID']}</td>
                                                              <td> {$data['DATES']}</td>
                                                              <td> {$data['CAFEEXPENSE_LIST']}</td>
                                                              <td> {$data['PRICE']}</td>";
                                                        echo "</tr>";

                                                        }
                                                    echo "</table>";






            }else { // If statement is error why see the code
                die('Critical error:' . db2_stmt_error());
            }   
            db2_free_stmt($stmt);
            db2_close($conn);
        }
// callback alert if failed to connect to database return msg
else {
   echo db2_conn_errormsg();
}
}

}
*/
?>


<?php require_once ('/var/www/html/app/model/connect.php'); ?>


<!DOCTYPE html>
<html>
<head>
    <title></title>

     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Emmaline Zoo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!--Custom table-->
    <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover{background-color:#f5f5f5}
</style>
</head>
<body>
                        <br>
                        <br>
                        <br>
                        <div class="container">
                            <div class=" subcontainer">
                                <div class="panel panel-default">
                                    <div class="panel-heading"align="center"><h2><strong>Monthly Accounting</strong></h2></div>
                                        <div class="panel-body" align="left">

                                            <!--Revenue-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>Revenue</h4></u></div>
                                                <div class="panel-body" align="center">
                                                    
                                            <?php
                                                $link = @mysqli_connect("localhost", "root", "", "ProgDB") or die( mysql_connect_error()."</body></html>");

                                                $sql = "SELECT * FROM `cafeteria_expense`";
                                                $result = mysqli_query($link, $sql);
                                                    if(!$result){

                                                        echo mysqli_error($link);
                                                    }
                                                    else if(mysqli_num_rows($result)==0){
                                                        
                                                        echo "no data in deptid";
                                                    }
                                                    else{

                                                        echo "<table>";
                                                        echo "<tr>
                                                                <th><strong>Expense No.</strong></th>
                                                                <th><strong>branch No.</strong></th>
                                                                <th><strong>date</strong></th>
                                                                <th><strong>Expense List</strong></th>
                                                                <th><strong>cost</strong></th>

                                                              </tr>";

                                                        while ($data = mysqli_fetch_array($result)) {
            
                                                        echo "<tr>";
                                                        echo "<td> {$data['cafeExpense_ID']}</td>
                                                              <td> {$data['branchID']}</td>
                                                              <td> {$data['dates']}</td>
                                                              <td> {$data['cafeExpense_List']}</td>
                                                              <td> {$data['price']}</td>";
                                                        echo "</tr>";

                                                        }
                                                    echo "</table>";

                                                    }
                                                mysqli_close($link);

                                            ?>

                                            </div>
                                          </div>



                                           <!--Expense-->
                                           <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>Expense</h4></u></div>
                                                <div class="panel-body" align="center">
                                                    
                                            <?php
                                                $link = @mysqli_connect("localhost", "root", "", "ProgDB") or die( mysql_connect_error()."</body></html>");

                                                $sql = "SELECT * FROM `cafeteria_expense`";
                                                $result = mysqli_query($link, $sql);
                                                    if(!$result){

                                                        echo mysqli_error($link);
                                                    }
                                                    else if(mysqli_num_rows($result)==0){
                                                        
                                                        echo "no data in deptid";
                                                    }
                                                    else{

                                                        echo "<table>";
                                                        echo "<tr>
                                                                <th><strong>Expense No.</strong></th>
                                                                <th><strong>branch No.</strong></th>
                                                                <th><strong>date</strong></th>
                                                                <th><strong>Expense List</strong></th>
                                                                <th><strong>cost</strong></th>

                                                              </tr>";

                                                        while ($data = mysqli_fetch_array($result)) {
            
                                                        echo "<tr>";
                                                        echo "<td> {$data['cafeExpense_ID']}</td>
                                                              <td> {$data['branchID']}</td>
                                                              <td> {$data['dates']}</td>
                                                              <td> {$data['cafeExpense_List']}</td>
                                                              <td> {$data['price']}</td>";
                                                        echo "</tr>";

                                                        }
                                                    echo "</table>";

                                                    }
                                                mysqli_close($link);

                                            ?>

                                                </div>
                                            </div>


                                            <!--net profit-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>net profit</h4></u></div>
                                                <div class="panel-body" align="center">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>


</body>
</html>

