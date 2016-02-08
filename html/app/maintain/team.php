                <!DOCTYPE html>
                <?php
                require_once ('/var/www/html/app/library/function.php');
/*
                if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
                    header('Location: ../login.php');
                    exit();
                }*/
                require_once ('addEmp2.php');

                if (isset($_POST['addEmployeeSubmit']) && (!empty($_POST['employeeAdd'])) ) {
                    addEmp();
                }
                if (isset($_POST['updateMainJobSubmit'])){
                    include 'UpdateMaintainPerson.php';
                }
                ?>

                <html lang="en">
                <head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="">
                    <meta name="author" content="">

                    <title>Zoo - Maintenance Team</title>

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
                    <link rel="stylesheet" type="text/css" href="search.css">
                    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                    <!--[if lt IE 9]>
                        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                        <![endif]-->

                        <header>
                            <div class="container">
                                <div class="intro-text">
                                    <div class="intro-heading">ZOO Maintenance</div>
                                    <h2>Maintenance Team</h2>
                                    <!-- Trigger the modal with a button -->
                                    <a class="btn btn-xl" href="index.php" role="button"> Maintenance Request</a> &nbsp;&nbsp;&nbsp;  
                                    <a class="btn btn-xl" href="info.php" role="button"> Maintenance Info & Status </a>

                                </div>

                            </div>
                        </header>


                    </head>

                    <body id="page-top" class="index">

                        <!-- / connect with php -->
                        <!-- / connect with php -->

                        <br><br><br>
                        <div class="container">
                            <div class="input-group">
                             <input type="text" class="form-control light-table-filter" data-table="order-table" placeholder="Search for...">
                             <span class="input-group-btn">
                                <button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>



                        <div class="container">
                            <div class="modal-body">

                              <table class="table table-striped order-table">
                                <thead>
                                  <tr>
                                    <th>Personel No.</th>
                                    <th>Employee ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Maintaining Job</th>
                                    <th>Assign Maintaining Job</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                               <?php include 'query_maintainPersonel.php' ?>
                               <?php ?>
                           </tbody>
                             </table>

                       

                           </div>
                        </div>
                        <form class="form-inline" method="post">
                            <label>Add New Employee to Maintainance Team</label>
                            <input type="text" class="form-control" id="empID" name="employeeAdd" placeholder="Enter new employee ID">
                             <input class="btn btn-default" type="submit" id="submit" name="addEmployeeSubmit">
                        </form>
 
                        
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <span class="copyright">Copyright &copy; Database Zoo Project Website 2015</span>
                            </div>
                        </div>
                    </div>
                </footer>

                <!-- jQuery -->
                <script src="js/jquery.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.min.js"></script>

                <!-- Plugin JavaScript -->
                <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
                <script src="js/classie.js"></script>
                <script src="js/cbpAnimatedHeader.js"></script>

                <!-- Contact Form JavaScript -->
                <script src="js/jqBootstrapValidation.js"></script>
                <script src="js/contact_me.js"></script>

                <!-- Custom Theme JavaScript -->
                <script src="js/agency.js"></script>

                <!-- Filter search JavaScript -->
                <script src="js/filter.js" type="application/javascript"></script>
                <!-- Call search JavaScript -->
                <script> LightTableFilter.init() </script>
                </body>
                </html>
