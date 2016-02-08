<!DOCTYPE html>
<?php require_once ('/var/www/html/app/library/function.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
header('Location: ../login.php');
exit();
} ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employee - Human Resource</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

     <div class="brand">Human Resource</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
                <div class="container" style="width: 100%;">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            


                        </button>
                        <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                        <a class="navbar-brand" href="index.php">Human Resource</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Employee<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="empinfo.php">Staff Directory</a></li> 
                                    <li><a href="parttime.php">Part time</a></li> 
                                    <li><a href="manager.php">Manager</a></li>
                                    <li><a href="ot.php">Over Time</a></li>  
                                    <li><a href="leave.php">Take Leave</a></li> 
                                    <li><a href="borrowing.php">Borrowing</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Walfares<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="insurance.php">Insurance</a></li>  
                                    <li><a href="uniform.php">Uniform</a></li> 
                                </ul>
                            </li>
                            
                            <li>
                                <a href="cooperative.php">Co-operative</a>
                            </li>

                            <li>
                                <a href="assessment.php">Assessment</a>
                            </li> 
                            
                            <li>
                                <a href="">Log out</a>
                            </li>         
        
                        </ul>
                        
                        
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>

    <div class="container" style="width: 80%;">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Part-time Infomation</strong>
                    </h2>
                    <hr>
                </div>
                

                <table  class="table table-bordered">
    <thead>
      <tr>
        
        <th><center>Parttime ID</center></th>  
        <th><center>Zoo</center></th>
        <th><center>Firstname</center></th>
        <th><center>Lastname</center></th>
        <th><center>Address</center></th>
        <th><center>Birthdate</center></th>
        <th><center>Sex</center></th>
        <th><center>Nationality</center></th>
        <th><center>Email</center></th>
        <th><center>Phone</center></th>

      </tr>
    </thead>

<?php

    if ($conn) {
        $sql = "SELECT PARTTIMEID, ZOONAME, FIRSTNAME, LASTNAME, B.ADDRESS, BIRTHDATE, SEX, NATIONALITY, EMAIL, PHONE
                FROM EMM_ZOO.BORROWEMP AS B JOIN EMM_ZOO.ZOO AS Z ON B.ZOOID = Z.ZOOID;
                ORDER BY 1";

        $stmt = dbQuery($conn,$sql);

        if($stmt == FALSE) {
        	   die('Critical error: '. db2_stmt_error($stmt));
        }
    while ($row = dbFetchArray($conn,$stmt)) {
        $sex = '';
        if($row[6] == 'F') {$sex = 'Female';}
        else {$sex = 'Male';}
    echo("<tbody>
            <tr>
                <td align=\"center\">$row[0]</td>
                <td align=\"left\">$row[1]</td>
                <td align=\"left\">$row[2]</td>
                <td align=\"left\">$row[3]</td>
                <td align=\"left\">$row[4]</td>
                <td align=\"center\">$row[5]</td>
                <td align=\"center\">$sex</td>
                <td align=\"left\">$row[7]</td>
                <td align=\"left\">$row[8]</td>
                <td align=\"left\">$row[9]</td>
            </tr>
        </tbody>");
    }
    db2_free_stmt($stmt);
    db2_close($conn);
    }
    else {
          echo "Connection failed" .db2_conn_errormsg($conn);
    }
?>
  </table>
                
                <div class="btn-group pull-right"   >
                    <button type="button" onclick="location.href='addparttime.php';" class="btn btn-success">ADD</button>
                </div> 

                <div class="clearfix"></div>
            </div>
        </div>

        

    </div>
    <!-- /.container -->

  

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

</body>

</html>


















