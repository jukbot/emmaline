<!DOCTYPE html>

<?php
require_once ('/var/www/html/app/library/function.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
	header('Location: ../login.php');
	exit();
}
require_once ('controllerTest.php');
if (isset($_POST['addBuildingSubmit']) && (!empty($_POST['EmpSelect'])) && (!empty($_POST['ZoneSelect'])) ) { 
    addRequest();
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zoo - Maintenance</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">

        <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-heading">ZOO Maintenance</div>
                    <h2>Maintenance Request</h2>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="page-scroll btn btn-xl" data-toggle="modal" data-target="#myModal1">Building Request</button>&nbsp;	
                    <button type="button" class="page-scroll btn btn-xl" data-toggle="modal" data-target="#myModal2">Cage Request</button>&nbsp;    
                    <button type="button" class="page-scroll btn btn-xl" data-toggle="modal" data-target="#myModal4">Transport Request</button>   
                    <br><br><br>
                    <a class="btn btn-xl" href="info.php" role="button">Maintenance Info & Status</a> &nbsp;&nbsp;&nbsp;  
                    <a class="btn btn-xl" href="team.php" role="button">Maintenance Team </a>
                    
                </div>
            </div>
        </header>

        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; Database Zoo Project Website 2015</span>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li><a href="#">Privacy Policy</a>
                            </li>
                            <li><a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

            <!-- Modal Request -->
            <!-- Modal -->

            <div id="myModal1" class="modal fade" role="dialog">
               <div class="modal-dialog">

                 <!-- Modal content-->
                 <div class="modal-content">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <center><h2 class="modal-title"> Maintenance Request</h2></center>
                     </div>


                     <div class="modal-body">
                       <div class="row">
                        <form method='post' name='addBuilding'>                      	
                                <label>Employee ID &nbsp;</label>
                                <td>
                                 <select class='form-control' name='EmpSelect'>
                                    <?php include 'EmpSelectAdd.php'; ?>
                                </select>                                           
                                </td>

                                <td>&nbsp;</td><td><b> Zone </b></td>
                                <td>
                                <select class='form-control' name='ZoneSelect'>
                                    <?php include 'ZoneSelectAdd.php'; ?>
                                </select>
                                 
                                <td><b>Floor</b><input type="text" class="form-control" name="FloorValueAdd" required></td>
                                <td><b>Room</b><input type="text" class="form-control" name="RoomValueAdd" required></td>
                                <td><button type="submit" name="addBuildingSubmit" class="btn btn-success">Request</button></td>
                        </form>
                        </div>                      
                        
                        </div>
                        </div>
                        </div>
                         </div>
            
        






<!-- Modal2 -->

<!-- Modal Request -->
<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title"> Maintenance Request</h2></cente>
        </div>


        <div class="modal-body">
            <div class="form-group">
                <form action='' method='post' name='modalForm'>
                    <center><div class="form-inline">                               
                        <label for="exampleInputName2">Employee ID &nbsp;</label>
                        <td>
                            <select class='form-control' name='EmpSelect'>
                                <?php include 'EmpSelectAdd.php'; ?>
                            </select>
                        </td>
                        <td>&nbsp;</td><td><b> Zone </b></td>
                        <td>
                            <select class='form-control'>
                                <?php include 'ZoneSelectAdd.php'; ?>
                            </select>
                        </td>
                        <td>&nbsp;</td><td><b> Cage </b></td>
                        <td>
                            <select class='form-control'>
                                <?php include 'CageSelectAdd.php'; ?>
                            </select>
                        </td>
                    </div>                      
                    <br>

                    <div class="form-inline">


                    </div>
                </center>   
            </form>
        </div>
    </div>

    <div class="modal-footer">

        <td><button type="submit" name="addCageTypeSubmit" class="btn btn-success">Request</button></td>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>


    </div>
</div>

</div>
</div>



<!-- Modal4 -->

<!-- Modal Request -->
<!-- Modal -->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title"> Maintenance Request</h2></cente>
        </div>


        <div class="modal-body">
            <div class="form-group">
                <form action='' method='post' name='modalForm'>
                    <center><div class="form-inline">                               
                        <label for="exampleInputName2">Employee ID &nbsp;</label>
                        <td>
                            <select class='form-control' name='EmpSelect'>
                                <?php include 'EmpSelectAdd.php'; ?>
                            </select>                                          
                        </td>

                        <td>&nbsp;</td><td><b> Zone </b></td>
                        <td>
                            <select class='form-control'>
                                <?php include 'ZoneSelectAdd.php'; ?>
                            </select>
                        </td>

                        <td>&nbsp;</td><td><b> Car ID </b></td>
                        <td>
                            <select class='form-control'>
                                <?php include 'CarSelectAdd.php'; ?>
                            </select>
                        </td>
                    </div>                      
                    <br>

                    <div class="form-inline">


                    </div>
                </center>   
            </form>
        </div>
    </div>

    <div class="modal-footer">

        <td><button type="submit" name="addCageTypeSubmit" class="btn btn-success">Request</button></td>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>


    </div>
</div>

</div>
</div>
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

</body>

</html>
<?php
db2_close($conn);
?>