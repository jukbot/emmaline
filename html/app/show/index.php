<?php
require_once ('/var/www/html/app/model/connect.php');
/*require_once ('delete.php');

if(isset($_POST['submit'])){
    deleteRound();
    header("Location:index.php");
}*/
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Animal Show</title>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        table, td, th {    
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }
		
		td {
            color: black;
        }
        
        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4CAF50;
            color: white;
        }  
    </style>
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    body,td,th {
	font-family: Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
	font-style: normal;
	font-weight: 400;
	font-size: 18px;
	text-align: left;
}
body {
	background-image: url(image/invitation-bg.jpg);
	font-style: normal;
	font-family: Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
	font-weight: 400;
	font-size: 18px;
}
    .container .row .col-lg-12 .intro-message h1 {
	color: #e17537;
}
    </style>
<script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/averia-serif-libre:n4,n3,i3:default;alexa-std:n4:default;aclonica:n4:default;aladin:n4:default.js" type="text/javascript"></script>

</head>

<body>

    <!-- Navigation -->
    


    <!-- Header -->
    <a name="about"></a>
    <div class="">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1 style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-style: normal; font-weight: 400; font-size: 40px; text-align: left; color: #EFEE2F;"><strong style="color: #EFEE2F"><em>A</em><span style="font-style: normal; font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; color: #FF6D16;">n</span><em>i</em><span style="color: #FF6D16">m</span><em>a</em><span style="color: #FF6D16">l</span> S<span style="color: #FF6D16"><em>h</em></span>o<span style="color: #FF6D16"><em>w</em></span></strong><br/>
                        </h1>
                      <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <span style="font-size: 20px; color: #FF6D16; font-style: normal;"><span style="font-style: normal; color: #EFEE2F;"><strong>Filter</strong></span><strong> <span style="color: #FF6D16">Show</span> <span style="color: #EFEE2F">ID</span>:</strong></span>
                            <input type="text" name="findID"/> 
                            <span style="color: #EFEE2F; font-size: 20px;"><strong>Current <span style="color: #FF6D16">Date</span>:</strong></span>
            <input type="checkbox" name="curdate" value="Filter Show ID"/>
                            <input type="submit" name="submit" value="Filter Show ID"/>
                      </form>
                        <br/><form method="GET" action="showdetail.php">
                            <span style="font-size: 20px; font-style: normal; color: #EFEE2F;"><span style="color: #FF6D16"><strong>Show</strong></span><strong> Detail</strong>
<input type="text" name="showID"/>
                          </span>
<input type="submit" name="submit" value="Show Detail"/>
                        </form>
                        <form method="GET" action="EditShow.php">
                            <span style="font-size: 20px; font-style: normal; color: #EFEE2F;"><span style="color: #FF6D16"><strong>Edit</strong></span><strong> Show</strong>
<input type="text" name="showID"/>
                          </span>
<input type="submit" name="submit" value="Edit Show"/>
                        </form>
                        
<table class="table table-bordered" cellpadding="4" cellspacing="0">
    <tr>
        <th><strong>Show ID</strong></th>
        <th><strong>Show Name</strong></th>
        <th><strong>Round</strong></th>
        <th><strong>Start Time</strong></th>
        <th><strong>End Time</strong></th>
        <th><strong>Date</strong></th>
        <th><strong>Delete Round</strong></th>
    </tr>
    <?php 
    
        if(isset($_GET['findID']) && $_GET['findID'] != NULL){
            $findID = $_GET['findID'];
        } else {
            $findID = null;
        }
        $conn=dbConnect();
        
        if($conn) {
        
            $sql="SELECT EMM_ZOO.SHOW.SHOWID, SHOWNAME, ROUNDID, STARTTIME, ENDTIME, DATES"
                    . " FROM EMM_ZOO.SHOW LEFT OUTER JOIN EMM_ZOO.SHOW_TIMETABLE"
                    . " ON EMM_ZOO.SHOW.SHOWID = EMM_ZOO.SHOW_TIMETABLE.SHOWID";
            if($findID != null || isset($_GET['curdate'])){
                $sql .= " WHERE";
                if($findID != null){
                    $sql .= " EMM_ZOO.SHOW.SHOWID = $findID";
                    if(isset($_GET['curdate'])){
                        $sql .= " AND DATES = current date";
                    }
                }
                else if(isset($_GET['curdate'])){
                    $sql .= " DATES = current date";
                }
            }
            $sql .= " ORDER BY SHOWID, ROUNDID;";
            $stmt=db2_prepare($conn, $sql);
            $result=db2_execute($stmt);
            
            while($row = db2_fetch_assoc($stmt)) {
                echo "<tr>";
                echo "<td>".$row['SHOWID']."</td>";
                echo "<td>".$row['SHOWNAME']."</td>";
                echo "<td>".$row['ROUNDID']."</td>";
                echo "<td>".$row['STARTTIME']."</td>";
                echo "<td>".$row['ENDTIME']."</td>";
                echo "<td>".$row['DATES']."</td>";
                echo "<td>";
                if($row['ROUNDID'] != null){
                echo "<form method='post' action='delete.php'>";
                echo "<input type='hidden' name='ShowID' value='".$row['SHOWID']."'/>";
                echo "<input type='hidden' name='RoundID' value='".$row['ROUNDID']."'/>";
                echo "<input type='submit' name='submit' value='Delete Round'/>";
                echo "</form>";
                }
                echo "</td>";
                echo "</tr>";
            }

            db2_free_stmt($stmt);
            db2_close($conn);
            
        } else {
            echo db2_conn_errormsg($conn);
        }
    ?>
    <!--
    <tr>
        <td style="border: 2px solid black">S1</td>
        <td style="border: 2px solid black">Penguin Feet</td>
        <td style="border: 2px solid black">1</td>
        <td style="border: 2px solid black">15.30</td>
        <td style="border: 2px solid black">16.00</td>
        <td>
            <form>
                <input type="hidden" name="ShowID" value="$php"/>
                <input type="submit" name="submit" value="Edit"/>
            </form>
        </td>
    </tr> -->
			</table>
<p>&nbsp;</p>
                        
                  </div>
                </div>
                
                <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
           
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <strong><a href="Add.php" style="visibility: visible; color: #FF6D16;">Add Show</a>
                    </strong></span></li>
                    <li>
                        <span style="color: #EFEE2F"><strong><a href="AddRound.php" style="visibility: visible; color: #F1F050;">Add Round</a></strong></span>                    </span></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
            </div>

      </div>
        <!-- /.container -->

</div>
</body></html>