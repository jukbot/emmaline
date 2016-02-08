<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/model/connect.php');
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AnimalHealthCare - Treatment</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Animal Healthcare</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="check.php">Check</a>
                        </li>
                        <li>
                            <a href="treatment.php">Treatment</a>
                        </li>
                        <li>
                            <a href="transport.php">Transport</a>
                        </li>
                        <li>
                            <a href="orderMed.php">Order</a>
                        </li>
                        <li>
                            <a href="addMedinfo.php">Supplier</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/treatment-bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="page-heading">
                            <h1>Treatment</h1>
                            <hr class="small">
                            <span class="subheading">Cure Diseases for Animals.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Give information to Treatment disease</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>CheckID</label>
                            <input type="text" class="form-control" placeholder="CheckID" id="Checkid">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>DiseaseName</label>
                            <input type="text" class="form-control" placeholder="DiseaseName" id="DiseaseName">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>MedicineName</label>
                            <input type="text" class="form-control" placeholder="MedicineName" id="MedicineName">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>StartDate</label>
                            <input type="date" class="form-control" placeholder="StartDate" id="StartDate">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>EndDate</label>
                            <input type="date" class="form-control" placeholder="EndDate" id="EndDate">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Dose</label>
                            <input type="text" class="form-control" placeholder="Dose" id="Dose">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Add</button>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Treatment History</button>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade bs-example-modal-lg in" role="dialog" >
                              <div class="modal-dialog modal-lg" role="document">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Treatment History</h4>
                                  </div>
                                  <div class="modal-body">
                                    <table class="table table-bordered" cellpadding="4" cellspacing="0">
                                    <tr>
                                        <th><strong>TreatID</strong></th>
                                        <th><strong>CheckID</strong></th>
                                        <th><strong>Disease</strong></th>
                                        <th><strong>Medicine</strong></th>
                                        <th><strong>StDate</strong></th>
                                        <th><strong>EnDate</strong></th>
                                        <th><strong>Dose</strong></th>
                                        <!-- <td style="border: 2px solid rgba(0,0,0,0)"></td> -->
                                    </tr>
                                    <?php 
                                    
                                        if(isset($_GET['findID']) && $_GET['findID'] != NULL){
                                            $findID = $_GET['findID'];
                                        } else {
                                            $findID = null;
                                        }
                                        $conn=dbConnect();
                                        
                                        if($conn) {
                                        
                                            $sql="SELECT TREATID, CHECKID, DISEASENAME, MEDICINENAME, STARTDATE, ENDDATE, EMM_ZOO.TREATMENT.DOSE "
                                                  ."FROM EMM_ZOO.TREATMENT, EMM_ZOO.DISEASE, EMM_ZOO.MEDICINE "
                                                  ."WHERE EMM_ZOO.TREATMENT.DISEASEID = EMM_ZOO.DISEASE.DISEASEID AND "
                                                  ."EMM_ZOO.TREATMENT.MEDICINEID = EMM_ZOO.MEDICINE.MEDICINEID";
                                                     
                                            $stmt=db2_prepare($conn, $sql);
                                            $result=db2_execute($stmt);
                                            
                                            while($row = db2_fetch_assoc($stmt)) {
                                                echo "<tr>";
                                                echo "<td>".$row['TREATID']."</td>";
                                                echo "<td>".$row['CHECKID']."</td>";
                                                echo "<td>".$row['DISEASENAME']."</td>";
                                                echo "<td>".$row['MEDICINENAME']."</td>";
                                                echo "<td>".$row['STARTDATE']."</td>";
                                                echo "<td>".$row['ENDDATE']."</td>";
                                                echo "<td>".$row['DOSE']."</td>";

                                                //echo "<form method='post' action='editRound.php'>";
                                                //echo "<input type='hidden' name='showID' value=".$row['SHOWID']."/>";
                                                //echo "<input type='hidden' name='roundID' value=".$row['ROUNDID']."/>";
                                                //echo "<input type='submit' name='submit' value='Edit'/>";
                                                //echo "</form>";
                                                echo "</tr>";
                                            }

                                            db2_free_stmt($stmt);
                                            db2_close($conn);
                                            
                                        } else {
                                            echo db2_conn_errormsg($conn);
                                        }
                                    ?>
                                </table>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    
                    <li>
                        <a href="https://www.facebook.com/vchukkriter?fref=ts">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/clean-blog.min.js"></script>

</body>

</html>
