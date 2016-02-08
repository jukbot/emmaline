<?php require_once ('/var/www/html/app/model/connect.php'); 
?>

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


<?php if(isset($_POST['department'])){
        $year= $_POST['year'];
        $department= $_POST['department'];
   switch ($department) {
        case '1':
                $sqlIn = "SELECT CAFEINCOME_ID, DATES, CAFEINCOME_LIST, PRICE FROM EMM_ZOO.CAFETERIA_INCOME WHERE  year(DATES)= $year;";
                $sqlEx=  "SELECT CAFEEXPENSE_ID, DATES, CAFEEXPENSE_LIST, PRICE FROM EMM_ZOO.CAFETERIA_EXPENSE WHERE  year(DATES)= $year;";
                  
            break;

        case '2':
                $sqlIn = "SELECT SHOPINCOME_ID, DATES, SHOPINCOME_LIST, PRICE FROM EMM_ZOO.ZOOSHOP_INCOME WHERE  year(DATES)= $year;";
                $sqlEx=  "SELECT SHOPEXPENSE_ID, DATES, SHOPEXPENSE_LIST, PRICE FROM EMM_ZOO.ZOOSHOP_EXPENSE WHERE  year(DATES)= $year;";
            break; 

        case '3':
                $sqlIn = "SELECT ZOOTICKET_ID, DATES,'ZooTicket', ZOOTICKET_PRICE FROM EMM_ZOO.ZOO_TICKET,EMM_ZOO.ZOO_TICKET_TYPE WHERE TYPE=ZOOTICKET_TYPEID AND year(DATES)= $year ;";
                $sqlEx=  null;
            break;
        case '4':
                $sqlIn = "SELECT TOURID, DATES,'TourTicket', AMOUNT FROM EMM_ZOO.TOUR WHERE  year(DATES)= $year;";
                $sqlEx=  null;
            break;
        case '5':
                $sqlIn = "SELECT SHOW_TICKETID, DATES, 'ShowTicket', SHOWTICK_PRICE FROM EMM_ZOO.SHOW_TICKET,EMM_ZOO.SHOW_TICKET_TYPE WHERE SHOW_TICKETID=SHOWTICK_TYPEID AND year(DATES)= $year;";
                $sqlEx=  null;
            break;
        case '6':
                $sqlIn = null;
                $sqlEx=  "SELECT FOODEXPENSE_ID, DATES,'AniFood', COST FROM EMM_ZOO.FOODANIMAL_EXPENSE WHERE  year(DATES)= $year;";
            break;
        case '7':
                $sqlIn = null;
                $sqlEx=  "SELECT SLIPNO, PAYDATE, 'Salary', SALARY  FROM EMM_ZOO.HR_SALARY WHERE  year(PAYDATE)= $year;";
            break;
        case '8':
                $sqlIn = null;
                $sqlEx=  "SELECT TREATEXPENSE_ID, DATES, TREATEXPENSE_LIST, COST FROM EMM_ZOO.HEALTHCARE_EXPENSE WHERE  year(DATES)= $year;";
            break;
        case '9':
                $sqlIn = null;
                $sqlEx=  "SELECT RESEXPENSE_ID, DATES, RESEXPENSE_LIST, COST FROM EMM_ZOO.ANIMALRESEARCH_EXPENSE WHERE  year(DATES)= $year;";
            break;
 
        case '10':
                $sqlIn = null;
                $sqlEx= "SELECT TRANSPORTEX_ID, DATES, TRANSPORTEX_LIST, COST FROM EMM_ZOO.TRANSPORT_EXPENSE WHERE  year(DATES)= $year;";
            break;
        case '11':
                $sqlIn = "SELECT ANILENDINCOME_ID, DATES, ANILENINCOME_LIST, COST FROM EMM_ZOO.ANIMAL_LEND WHERE  year(DATES)= $year;";
                $sqlEx=  "SELECT ANIBOREXPENSE_ID, DATES, ANIBOREXPENSE_LIST, COST FROM EMM_ZOO.ANIMAL_BORROW WHERE  year(DATES)= $year;";
            break;
        case '12':
                $sqlIn = null;
                $sqlEx=  "SELECT MAINTEGERAINEX_ID, DATES, MAINTEGERAINEX_LIST, COSTMAINTEGERAIN FROM EMM_ZOO.MAINTAINANCE_EXPENSE WHERE  year(DATES)= $year;";
            break;

        default:
                $sqlIn = null;
                $sqlEx=  "SELECT SANIEX_ID, DATES, SANIEX_LIST, COST FROM EMM_ZOO.SANITAION_EXPENSE WHERE  year(DATES)= $year;";
            break;
        }
}

?>

                        <br>
                        <br>
                        <br>
                        <div class="container">
                            <div class=" subcontainer">
                                <div class="panel panel-default">
                                    <div class="panel-heading"align="center"><h2><strong>Accounting of department</strong></h2></div>
                                        <div class="panel-body" align="left">

                                            <!--Revenue-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>Revenue</h4></u></div>
                                                <div class="panel-body" align="center">
                                                    

                                                <?php
                                                    if($sqlIn == null){
                                                        echo "No Revenue data in this department";

                                                    }
                                                    else{
                                                ?>
                                                    <table class="responsive-table order-table">
                                                        <thead>
                                                            <tr>
                                                                <th>INCOME NO.</th>
                                                                <th>DATE</th>
                                                                <th>INCOME_LIST</th>
                                                                <th>PRICE</th>

                                                            </tr>
                                                        </thead>
                                                <tbody id="table">
                                                <?php
                                                    $income =0;

                                                   if($sqlIn == null)
                                                   {
                                                        echo "No Revenue data in this department";
                                                        $income=0;



                                                   }
                                                   else{
                                                    $conn = dbConnect();
                                                    $income=0;
                                                    if ($conn) {

                                                        $sql = $sqlIn;
                                                         
                                                        $stmt = dbQuery($conn,$sql);
                                                            
                                                            while ($row = dbFetchArray($conn,$stmt)) {
                                                                
                                                                print "\t<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>\n";
                                                                $income = $income+$row[3];
                                                                if($income==0){
                                                                    echo "no data in this table";
                                                                }
                                                            }
                                                           
                                                              
                                                        db2_free_stmt($stmt);
                                                        
                                                    }else {
                                                        echo "Connection failed" .db2_conn_errormsg($conn);
                                                    }

                                                }
                                                ?>
                                                    </table>
                                                <?php }?>
                                            </div>
                                          </div>

                                           <!--Expense-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>Expense</h4></u></div>
                                                <div class="panel-body" align="center">

                                                <?php
                                                    $expense=0;
                                                    if($sqlEx == null){
                                                       // echo "No Expense data in this department";
                                                      echo "No Expense data in this department";
                                                      $expense=0;


                                                    }
                                                    else{
                                                ?>
                                                    
                                                    <table class="responsive-table order-table">
                                                        <thead>
                                                            <tr>
                                                                <th>EXPENSE NO.</th>
                                                                <th>DATE</th>
                                                                <th>EXPENSE_LIST</th>
                                                                <th>COST</th>

                                                            </tr>
                                                        </thead>
                                                <tbody id="table">
                                                <?php
                                                   $expense=0;
                                                    if ($conn) {
                                                        $sql = $sqlEx;
                                                        $stmt = dbQuery($conn,$sql);
                                                            
                                                            while ($row = dbFetchArray($conn,$stmt)) {
                                                               
                                                                $expense = $expense + $row[3];
                                                                print "\t<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>\n";
                                                                if($expense==0){
                                                                    echo "no data in this table";
                                                                }
                                                            }
                                                             
                                                        db2_free_stmt($stmt);
                                                        
                                                    }else {
                                                        echo "Connection failed" .db2_conn_errormsg($conn);
                                                    }
                                                ?>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                          </div>






                                            <!--net profit-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>net profit</h4></u></div>
                                                <div class="panel-body" align="center">

                                                    <div class="container">
                                                      <div class="subcontainer">
                                                        <table class="table table-striped">
                                                       
                                                        <tbody align="center">
                                                            <tr>
                                                                <td>Total Revenue</td>
                                                                <td><?php
                                                                    if($sqlIn==null || $income==0){
                                                                      echo "0";

                                                                    }else{ print $income;}?></td>
                                                               
                                                            </tr>
                                                        
                                                            <tr>
                                                                <td>Total Expense</td>
                                                                <td><?php 
                                                                    if($sqlEx==null || $expense==0 ){
                                                                         echo "0";
                                                                    }else{print $expense;}?></td>
                                                                
                                                            </tr>

                                                            <tr>
                                                                <td>Net Profit</td>
                                                                <td><?php $net_profit="";

                                                                    if($sqlIn==null  || $sqlEx==null  ){
                                                                        echo "cannot calculate Net Profit";
                                                                    }else{
                                                                          $net_profit= $income-$expense;  
                                                                          echo "$net_profit";}?></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Percentage</td>
                                                                <td><?php $percentage="";

                                                                     if($sqlIn==null || $income==0 || $sqlEx==null || $expense==0){
                                                                        echo "cannot calculate Percentage";
                                                                    }else{
                                                                          $percentage= number_format(($net_profit/$income)*100, 2, '.', '');
                                                                          echo "$percentage %";}?></td>
                                                                    
                                                                
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                   </div>

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
<?php db2_close($conn); ?>