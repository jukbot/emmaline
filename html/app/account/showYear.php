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


<?php if(isset($_POST['year'])){
       
        $year= $_POST['year'];




    $sqlIn ="SELECT CAFEINCOME_ID, DATES, CAFEINCOME_LIST, PRICE FROM EMM_ZOO.CAFETERIA_INCOME WHERE  year(DATES)= $year
            UNION
            SELECT SHOPINCOME_ID, DATES, SHOPINCOME_LIST, PRICE FROM EMM_ZOO.ZOOSHOP_INCOME WHERE  year(DATES)= $year 
            UNION
            SELECT ZOOTICKET_ID, DATES,'ZooTicket', ZOOTICKET_PRICE FROM EMM_ZOO.ZOO_TICKET,EMM_ZOO.ZOO_TICKET_TYPE WHERE TYPE=ZOOTICKET_TYPEID AND year(DATES)= $year 
            UNION
            SELECT TOURID, DATES, 'TourTicket', AMOUNT FROM EMM_ZOO.TOUR WHERE  year(DATES)= $year 
            UNION
            SELECT SHOW_TICKETID, DATES, 'ShowTicket', SHOWTICK_PRICE FROM EMM_ZOO.SHOW_TICKET,EMM_ZOO.SHOW_TICKET_TYPE WHERE  year(DATES)= $year 
            UNION
            SELECT ANILENDINCOME_ID, DATES, ANILENINCOME_LIST, COST FROM EMM_ZOO.ANIMAL_LEND WHERE  year(DATES)= $year 

            ORDER BY DATES,CAFEINCOME_LIST;";
    

  
    $sqlEx = "SELECT CAFEEXPENSE_ID, DATES, CAFEEXPENSE_LIST, PRICE FROM EMM_ZOO.CAFETERIA_EXPENSE WHERE  year(DATES)= $year 
            UNION
            SELECT SHOPEXPENSE_ID, DATES, SHOPEXPENSE_LIST, PRICE FROM EMM_ZOO.ZOOSHOP_EXPENSE WHERE  year(DATES)= $year 
            UNION
            SELECT FOODEXPENSE_ID, DATES, 'AniFood', COST FROM EMM_ZOO.FOODANIMAL_EXPENSE WHERE  year(DATES)= $year 
            UNION
            SELECT SLIPNO, PAYDATE, 'Salary', SALARY  FROM EMM_ZOO.HR_SALARY WHERE  year(PAYDATE)= $year  
            UNION
            SELECT TREATEXPENSE_ID, DATES, TREATEXPENSE_LIST, COST FROM EMM_ZOO.HEALTHCARE_EXPENSE WHERE  year(DATES)= $year  
            UNION
            SELECT RESEXPENSE_ID, DATES, RESEXPENSE_LIST, COST FROM EMM_ZOO.ANIMALRESEARCH_EXPENSE WHERE  year(DATES)= $year 
            UNION
            SELECT TRANSPORTEX_ID, DATES, TRANSPORTEX_LIST, COST FROM EMM_ZOO.TRANSPORT_EXPENSE WHERE  year(DATES)= $year 
            UNION
            SELECT ANIBOREXPENSE_ID, DATES, ANIBOREXPENSE_LIST, COST FROM EMM_ZOO.ANIMAL_BORROW WHERE  year(DATES)= $year 
            UNION
            SELECT MAINTEGERAINEX_ID, DATES, MAINTEGERAINEX_LIST, COSTMAINTEGERAIN FROM EMM_ZOO.MAINTAINANCE_EXPENSE WHERE  year(DATES)= $year 
            UNION
            SELECT SANIEX_ID, DATES, SANIEX_LIST, COST FROM EMM_ZOO.SANITAION_EXPENSE WHERE  year(DATES)= $year 

            ORDER BY DATES,CAFEEXPENSE_LIST;";

     print $sqlEx;     
        
}

?>

                        <br>
                        <br>
                        <br>
                        <div class="container">
                            <div class=" subcontainer">
                                <div class="panel panel-default">
                                    <div class="panel-heading"align="center"><h2><strong>Yearly Accounting</strong></h2></div>
                                        <div class="panel-body" align="left">

                                            <!--Revenue-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>Revenue</h4></u></div>
                                                <div class="panel-body" align="center">
                                                    

                                               
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
                                                    $income ="";
                                                  
                                                    $conn = dbConnect();

                                                    if ($conn) {

                                                        $sql = $sqlIn;
                                                         
                                                        $stmt = dbQuery($conn,$sql);
                                                            while ($row = dbFetchArray($conn,$stmt)) {
                                                             
                                                                print "\t<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>\n";
                                                                $income = $income+$row[3];
                                                            }
                                                              
                                                        db2_free_stmt($stmt);
                                                        
                                                    }else {
                                                        echo "Connection failed" .db2_conn_errormsg($conn);
                                                    }

                                                
                                                ?>
                                                    </table>
                                              
                                            </div>
                                          </div>

                                           <!--Expense-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>Expense</h4></u></div>
                                                <div class="panel-body" align="center">

                                              
                                                    
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
                                                   $expense="";
                                                    if ($conn) {
                                                        $sql = $sqlEx;
                                                        $stmt = dbQuery($conn,$sql);
                                                            while ($row = dbFetchArray($conn,$stmt)) {
                                                                $expense = $expense + $row[3];
                                                                print "\t<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>\n";
                                                                
                                                            }
                                                              
                                                        db2_free_stmt($stmt);
                                                        
                                                    }else {
                                                        echo "Connection failed" .db2_conn_errormsg($conn);
                                                    }
                                                ?>
                                                    </table>
                                               
                                            </div>
                                          </div>






                                            <!--net profit-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" align="left"><u><h4>net profit</h4></u></div>
                                                <div class="panel-body" align="center">

                                                    <div class="container">
                                                          
                                                        <table class="table table-striped">
                                                       
                                                        <tbody align="center">
                                                            <tr>
                                                                <td>Total Revenue</td>
                                                                <td><?php
                                                                    if($sqlIn==null){
                                                                      echo "0";

                                                                    }else{ print $income;}?></td>
                                                               
                                                            </tr>
                                                        
                                                            <tr>
                                                                <td>Total Expense</td>
                                                                <td><?php 
                                                                    if($sqlEx=null ){

                                                                    }else{print $expense;}?></td>
                                                                
                                                            </tr>

                                                            <tr>
                                                                <td>Net Profit</td>
                                                                <td><?php $net_profit="";

                                                                    if( $income==0 ||  $expense==0 ){
                                                                        echo "cannot calculate Net Profit";
                                                                    }else{
                                                                          $net_profit= $income-$expense;  
                                                                          echo "$net_profit";}?></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Percentage</td>
                                                                <td><?php $percentage="";

                                                                     if($income==0 ||  $expense==0){
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
                                    <br>
                                </div>
                            </div>
                        </div>


</body>
</html>
<?php db2_close($conn); ?>