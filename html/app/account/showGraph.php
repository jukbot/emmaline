<?php require_once ('/var/www/html/app/model/connect.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style>
dl {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  background-color: white;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
  width: 100%;
  max-width: 700px;
  position: relative;
  padding: 20px;
}

dt {
  -webkit-align-self: flex-start;
      -ms-flex-item-align: start;
          align-self: flex-start;
  width: 100%;
  font-weight: 700;
  display: block;
  text-align: center;
  font-size: 1.2em;
  font-weight: 700;
  margin-bottom: 20px;
  margin-left: 130px;
}

.text {
  font-weight: 600;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  height: 40px;
  width: 130px;
  background-color: white;
  position: absolute;
  left: 0;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
      -ms-flex-pack: end;
          justify-content: flex-end;
}

.percentage {
  font-size: .8em;
  line-height: 1;
  text-transform: uppercase;
  width: 100%;
  height: 40px;
  margin-left: 130px;
  background: -webkit-repeating-linear-gradient(left, #ddd, #ddd 1px, #fff 1px, #fff 5%);
  background: repeating-linear-gradient(to right, #ddd, #ddd 1px, #fff 1px, #fff 5%);
}
.percentage:after {
  content: "";
  display: block;
  background-color: #3d9970;
  width: 50px;
  margin-bottom: 10px;
  height: 90%;
  position: relative;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  -webkit-transition: background-color .3s ease;
  transition: background-color .3s ease;
  cursor: pointer;
}
.percentage:hover:after, .percentage:focus:after {
  background-color: #aaa;
}

.percentage-1:after {
  width: 1%;
}

.percentage-2:after {
  width: 2%;
}

.percentage-3:after {
  width: 3%;
}

.percentage-4:after {
  width: 4%;
}

.percentage-5:after {
  width: 5%;
}

.percentage-6:after {
  width: 6%;
}

.percentage-7:after {
  width: 7%;
}

.percentage-8:after {
  width: 8%;
}

.percentage-9:after {
  width: 9%;
}

.percentage-10:after {
  width: 10%;
}

.percentage-11:after {
  width: 11%;
}

.percentage-12:after {
  width: 12%;
}

.percentage-13:after {
  width: 13%;
}

.percentage-14:after {
  width: 14%;
}

.percentage-15:after {
  width: 15%;
}

.percentage-16:after {
  width: 16%;
}

.percentage-17:after {
  width: 17%;
}

.percentage-18:after {
  width: 18%;
}

.percentage-19:after {
  width: 19%;
}

.percentage-20:after {
  width: 20%;
}

.percentage-21:after {
  width: 21%;
}

.percentage-22:after {
  width: 22%;
}

.percentage-23:after {
  width: 23%;
}

.percentage-24:after {
  width: 24%;
}

.percentage-25:after {
  width: 25%;
}

.percentage-26:after {
  width: 26%;
}

.percentage-27:after {
  width: 27%;
}

.percentage-28:after {
  width: 28%;
}

.percentage-29:after {
  width: 29%;
}

.percentage-30:after {
  width: 30%;
}

.percentage-31:after {
  width: 31%;
}

.percentage-32:after {
  width: 32%;
}

.percentage-33:after {
  width: 33%;
}

.percentage-34:after {
  width: 34%;
}

.percentage-35:after {
  width: 35%;
}

.percentage-36:after {
  width: 36%;
}

.percentage-37:after {
  width: 37%;
}

.percentage-38:after {
  width: 38%;
}

.percentage-39:after {
  width: 39%;
}

.percentage-40:after {
  width: 40%;
}

.percentage-41:after {
  width: 41%;
}

.percentage-42:after {
  width: 42%;
}

.percentage-43:after {
  width: 43%;
}

.percentage-44:after {
  width: 44%;
}

.percentage-45:after {
  width: 45%;
}

.percentage-46:after {
  width: 46%;
}

.percentage-47:after {
  width: 47%;
}

.percentage-48:after {
  width: 48%;
}

.percentage-49:after {
  width: 49%;
}

.percentage-50:after {
  width: 50%;
}

.percentage-51:after {
  width: 51%;
}

.percentage-52:after {
  width: 52%;
}

.percentage-53:after {
  width: 53%;
}

.percentage-54:after {
  width: 54%;
}

.percentage-55:after {
  width: 55%;
}

.percentage-56:after {
  width: 56%;
}

.percentage-57:after {
  width: 57%;
}

.percentage-58:after {
  width: 58%;
}

.percentage-59:after {
  width: 59%;
}

.percentage-60:after {
  width: 60%;
}

.percentage-61:after {
  width: 61%;
}

.percentage-62:after {
  width: 62%;
}

.percentage-63:after {
  width: 63%;
}

.percentage-64:after {
  width: 64%;
}

.percentage-65:after {
  width: 65%;
}

.percentage-66:after {
  width: 66%;
}

.percentage-67:after {
  width: 67%;
}

.percentage-68:after {
  width: 68%;
}

.percentage-69:after {
  width: 69%;
}

.percentage-70:after {
  width: 70%;
}

.percentage-71:after {
  width: 71%;
}

.percentage-72:after {
  width: 72%;
}

.percentage-73:after {
  width: 73%;
}

.percentage-74:after {
  width: 74%;
}

.percentage-75:after {
  width: 75%;
}

.percentage-76:after {
  width: 76%;
}

.percentage-77:after {
  width: 77%;
}

.percentage-78:after {
  width: 78%;
}

.percentage-79:after {
  width: 79%;
}

.percentage-80:after {
  width: 80%;
}

.percentage-81:after {
  width: 81%;
}

.percentage-82:after {
  width: 82%;
}

.percentage-83:after {
  width: 83%;
}

.percentage-84:after {
  width: 84%;
}

.percentage-85:after {
  width: 85%;
}

.percentage-86:after {
  width: 86%;
}

.percentage-87:after {
  width: 87%;
}

.percentage-88:after {
  width: 88%;
}

.percentage-89:after {
  width: 89%;
}

.percentage-90:after {
  width: 90%;
}

.percentage-91:after {
  width: 91%;
}

.percentage-92:after {
  width: 92%;
}

.percentage-93:after {
  width: 93%;
}

.percentage-94:after {
  width: 94%;
}

.percentage-95:after {
  width: 95%;
}

.percentage-96:after {
  width: 96%;
}

.percentage-97:after {
  width: 97%;
}

.percentage-98:after {
  width: 98%;
}

.percentage-99:after {
  width: 99%;
}

.percentage-100:after {
  width: 100%;
}

html, body {
  height: 500px;
  font-family: "fira-sans-2",sans-serif;
  color: #333;
}
</style>

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
</head>

<body>

<?php if(isset($_POST['year'])){
       
        $year= $_POST['year'];




    

                                                                           

     $sqlNAJA ="SELECT  DISTINCT MONTH(EMM_ZOO.CAFETERIA_INCOME.DATES) , (((SUM(EMM_ZOO.CAFETERIA_INCOME.PRICE)+
                                                                            SUM(EMM_ZOO.ZOOSHOP_INCOME.PRICE)+
                                                                            SUM(EMM_ZOO.ZOO_TICKET.ZOOTICKET_PRICE)+
                                                                            SUM(EMM_ZOO.TOUR.AMOUNT)+
                                                                            SUM(EMM_ZOO.SHOW_TICKET.SHOWTICK_PRICE)+
                                                                            SUM(EMM_ZOO.ANIMAL_LEND.COST))
                                                  
                                                                          -(SUM(EMM_ZOO.CAFETERIA_EXPENSE.PRICE)+
                                                                            SUM(EMM_ZOO.ZOOSHOP_EXPENSE.PRICE)+
                                                                            SUM(EMM_ZOO.FOODANIMAL_EXPENSE.COST)+
                                                                            SUM(EMM_ZOO.HR_SALARY.SALARY)+
                                                                            SUM(EMM_ZOO.HEALTHCARE_EXPENSE.COST)+
                                                                            SUM(EMM_ZOO.ANIMALRESEARCH_EXPENSE.COST)+
                                                                            SUM(EMM_ZOO.TRANSPORT_EXPENSE.COST)+
                                                                            SUM(EMM_ZOO.ANIMAL_BORROW.COST)+
                                                                            SUM(EMM_ZOO.MAINTAINANCE_EXPENSE.COSTMAINTEGERAIN)+
                                                                            SUM(EMM_ZOO.SANITAION_EXPENSE.COST)+)

                                                                          )/(SUM(EMM_ZOO.CAFETERIA_INCOME.PRICE)+
                                                                             SUM(EMM_ZOO.ZOOSHOP_INCOME.PRICE)+
                                                                             SUM(EMM_ZOO.ZOO_TICKET.ZOOTICKET_PRICE)+
                                                                             SUM(EMM_ZOO.TOUR.AMOUNT)+
                                                                             SUM(EMM_ZOO.SHOW_TICKET.SHOWTICK_PRICE)+
                                                                             SUM(EMM_ZOO.ANIMAL_LEND.COST))
                                                                         )*100

FROM EMM_ZOO.CAFETERIA_INCOME ,
     EMM_ZOO.ZOOSHOP_INCOME ,
     EMM_ZOO.ZOO_TICKET,
     EMM_ZOO.ZOO_TICKET_TYPE,
     EMM_ZOO.TOUR,
     EMM_ZOO.SHOW_TICKET,
     EMM_ZOO.SHOW_TICKET_TYPE,
     EMM_ZOO.ANIMAL_LEND,

     EMM_ZOO.CAFETERIA_EXPENSE,
     EMM_ZOO.ZOOSHOP_EXPENSE,
     EMM_ZOO.FOODANIMAL_EXPENSE,
     EMM_ZOO.HR_SALARY,
     EMM_ZOO.HEALTHCARE_EXPENSE,
     EMM_ZOO.ANIMALRESEARCH_EXPENSE,
     EMM_ZOO.TRANSPORT_EXPENSE,
     EMM_ZOO.ANIMAL_BORROW,
     EMM_ZOO.MAINTAINANCE_EXPENSE,
     EMM_ZOO.SANITAION_EXPENSE
WHERE YEAR(EMM_ZOO.CAFETERIA_INCOME.DATES) = $year
      TYPE=ZOOTICKET_TYPEID
GROUP BY MONTH(EMM_ZOO.CAFETERIA_INCOME.DATES)
;"; 

          
        
}

?>                                          
                        <table class="responsive-table order-table">
                                                        <thead>
                                                            <tr>
                                                                <th>MONTH</th>
                                                                <th>PERCENT NET PROFIT</th>
                                                               

                                                            </tr>
                                                        </thead>
                                                <tbody id="table">
  
                                                <?php
                                                    
                                                  
                                                    $conn = dbConnect();

                                                    if ($conn) {

                                                        $sql = $sqlNAJA;
                                                         
                                                        $stmt = dbQuery($conn,$sql);
                                                            while ($row = dbFetchArray($conn,$stmt)) {
                                                              echo "\t<tr><td>$row[0]</td><td>round($row[1])</td></tr>\n";
     
                                                            }
                                                              
                                                        db2_free_stmt($stmt);
                                                        
                                                    }else {
                                                        echo "Connection failed" .db2_conn_errormsg($conn);
                                                    }

                                                

                                                ?>
                                                 </table>
                                               
                                            </div>
                                          </div>

<br><br><br>
        <div class="container">
        <div class="subContainer">
  
  <div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Panel Heading</div>
    <div class="panel-body" >
      <div class="panel panel-default">
        <dl>
            <dt>Browser market share June 2015</dt>
              <dd class="percentage percentage-11"><span class="text">January: 11.33%</span></dd>
              <dd class="percentage percentage-49"><span class="text">February: 49.77%</span></dd>
              <dd class="percentage percentage-16"><span class="text">March: 16.09%</span></dd>
              <dd class="percentage percentage-5"><span class="text">April: 5.41%</span></dd>
              <dd class="percentage percentage-2"><span class="text">May: 1.62%</span></dd>
              <dd class="percentage percentage-2"><span class="text">June: 2%</span></dd>
              <dd class="percentage percentage-2"><span class="text">July: 2%</span></dd>
              <dd class="percentage percentage-2"><span class="text">August: 2%</span></dd>
              <dd class="percentage percentage-2"><span class="text">September: 2%</span></dd>
              <dd class="percentage percentage-2"><span class="text">October: 2%</span></dd>
              <dd class="percentage percentage-2"><span class="text">November: 2%</span></dd>
              <dd class="percentage percentage-2"><span class="text">December: 2%</span></dd>
              

        </dl>
          </div>                                    
    </div>
    

    <div class="panel-footer">Panel Footer</div>
  </div>
  <div>
    </div>
</div>

	
                                                            



</body>
</html>
<?php db2_close($conn); ?>