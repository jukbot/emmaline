    <!DOCTYPE html>
    <html lang="en">

<?php 
require_once ('../model/connect.php');

?>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Transportation</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/landing-page.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Header -->
        <a name="about"></a>
        <div class="intro-header">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-message">
                            <h1>Transportation</h1>
                            <h3>CAR&nbsp;&nbsp;AVAILABLE&nbsp;: 
                            <?php

            
              require_once ('../model/connect.php');



              if ($conn) {
                $sql = "SELECT COUNT(*) FROM EMM_ZOO.CARS WHERE EMM_ZOO.CARS.AVAILABLE = 'Y' OR EMM_ZOO.CARS.AVAILABLE = 'y';";

                $stmt = dbQuery($conn,$sql);

                if($stmt == FALSE) {
                   die('Critical error: '. db2_stmt_error($stmt));
              }
              while ($row = dbFetchArray($conn,$stmt)) {
          echo "\t<tr>
         <td align=\"center\">$row[0]</td>";}
        
              db2_free_stmt($stmt);
              db2_close($conn);
              }
              else {
              echo "Connection failed" .db2_conn_errormsg($conn);
              }
          ?>
                            </h3>
                            <hr class="intro-divider">
                            <ul class="list-inline intro-social-buttons">
                                <li>
                                    <a href="car_info.php" class="btn btn-default btn-lg"> <span class="network-name">Car's Information</span></a>
                                </li>
                                 <li>
                                    <a href="other_place.php" class="btn btn-default btn-lg"><span class="network-name">Borrow car from other place</span></a>
                                </li>
                                <br><br>
                                <li>
                                    <a href="transportation_animal.php" class="btn btn-default btn-lg"><span class="network-name">Borrow the car for animal</span></a>
                                </li>
                                <li>
                                    <a href="TransportationEmployee.php" class="btn btn-default btn-lg"><span class="network-name">Borrow the car for employee</span></a>
                                </li>
                                <li>
                                    <a href="returnCar.php" class="btn btn-default btn-lg"><span class="network-name">Return Car</span></a>
                                </li>
                                <br>
                                <br>
                                <br>
                                <li>
                                    <a href="http://emmalinezoo.com/app/index.php" class="btn btn-default btn-lg"><span class="network-name"> BACK </span></a>
                                </li>
                               

                            </ul>
                        </div>
                        <p class="copyright text-muted small" style="color:#ffffff">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /.intro-header -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
