<!DOCTYPE html>
<?php require_once ('/var/www/html/app/library/function.php');
require_once ('controller.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
header('Location: ../login.php');
    exit();
}

if (isset($_POST['empid']) && ($_POST['empid'] != null)) {
  addleave();
}
if (isset($_post['lea']) && ($_post['lea'] != null)) {
  delleave();
}  

?>

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
<?php
    echo("<div class='container'>

        <div class='row'>
            <div class='box'>
                <div class='col-lg-12'>
                    <hr>
                    <h2 class='intro-text text-center'>
                        <strong>TAKE LEAVE</strong>
                    </h2>
                    <hr>
                </div>
                

                <table  class='table table-bordered'>
    <thead>
      <tr>
        
        <th><center>Employee ID</center></th>  
        <th><center>Firstname</center></th>
        <th><center>Lastname</center></th>
        <th><center>Leave Type</center></th>
        <th><center>Start Date</center></th>
        <th><center>End Date</center></th>
        <th><center>Delete</center></th>

      </tr>
    </thead>");



    if ($conn) {
        $sql = "SELECT LE.EMPID, FIRSTNAME, LASTNAME, LEAVETYPE, STARTDATE, ENDDATE, LE.LEAVEID
                FROM EMM_ZOO.EMPLOYEE AS E, EMM_ZOO.LEAVE AS L, EMM_ZOO.LEAVEEMP AS LE
                WHERE E.EMPID = LE.EMPID AND L.LEAVEID = LE.LEAVETYPEID
                ORDER BY STARTDATE DESC, LE.EMPID";

        $stmt = dbQuery($conn,$sql);

        if($stmt == FALSE) {
        	   die('Critical error: '. db2_stmt_error($stmt));
        }
    while ($row = dbFetchArray($conn,$stmt)) {
    echo("<tbody>
            <tr>
                <td align=\"center\">$row[0]</td>
                <td align=\"left\">$row[1]</td>
                <td align=\"left\">$row[2]</td>
                <td align=\"left\">$row[3]</td>
                <td align=\"center\">$row[4]</td>
                <td align=\"center\">$row[5]</td>
                <td align=\"center\">
                    <form method='post'> 
                        <input type='hidden' value='$row[6]' name='lea' id='lea'/>
				        <button type='submit' class='btn btn-default btn-sm'>
                        <span class='glyphicon glyphicon-remove'></span>
                </button></form></td>
            </tr>
        </tbody>");
    }
        db2_free_stmt($stmt);
    
  echo("</table>

            </div>
        </div>

    </div>
    
    
<div class='container'>

        <div class='row'>
            <div class='box'>
            <form class='col s12' method='post' accept-charset='utf-8'>");
            
                echo("<div class='form-group col-lg-3'>
                            <label>Employee ID</label>
                                <select name='empid'  class='form-control'>
                                    <option value='' disabled selected>Please choose employee id</option>");

                                            $sql = "SELECT EMPID FROM EMM_ZOO.EMPLOYEE ORDER BY EMPID;";

                                            $stmt = dbQuery($conn,$sql);

                                            if($stmt == FALSE) {
                                                   die('Critical error: '. db2_stmt_error($stmt));
                                            }
                                        while ($row = dbFetchArray($conn,$stmt)) {
                                                echo(" 
                                                <option value='$row[0]'>$row[0]</option>");
                                        }

                                echo("</select>
                            </div>               
                <div class='form-group col-lg-3'>
                            <label>Leave Type</label>
                                <select name='leaveid'  class='form-control'>
                                    <option value='' disabled selected>Please choose leave types</option>");

                                            $sql = "SELECT LEAVETYPE, LEAVEID FROM EMM_ZOO.LEAVE;";

                                            $stmt = dbQuery($conn,$sql);

                                            if($stmt == FALSE) {
                                                   die('Critical error: '. db2_stmt_error($stmt));
                                            }
                                        while ($row = dbFetchArray($conn,$stmt)) {
                                                echo(" 
                                                <option value='$row[1]'>$row[0]</option>");
                                        }
        db2_free_stmt($stmt);

                                echo("</select>
                            </div>                
                <div class='form-group col-lg-3'>
                                <label>Startdate</label>
                                <input name = 'std' type='text' class='form-control' placeholder ='yyyy-mm-dd'>
                </div>
                <div class='form-group col-lg-3'>
                                <label>Enddate</label>
                                <input name = 'end' type='text' class='form-control' placeholder ='yyyy-mm-dd'>
                </div>");
                
                $sql = "SELECT MAX(LEAVEID) FROM EMM_ZOO.LEAVEEMP;";
                    $stmt = dbQuery($conn,$sql);
                    $row = dbFetchArray($conn,$stmt);
                    $id = $row[0] + 1;
                echo("<input name = 'leid' type='hidden' value = '$id'>");
                    
      
                db2_free_stmt($stmt);
                db2_close($conn);
                }
                else {
                      echo "Connection failed" .db2_conn_errormsg($conn);
                }
            
  echo("
                <div><center>
                    <button type='submit' name='submit' value='submit' class='btn btn-success'>SUBMIT</button></center>
                </div>
                <div class='clearfix'></div>
                </form>
            </div>
        </div>

</div>");
?>
                
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

</body>

</html>


















