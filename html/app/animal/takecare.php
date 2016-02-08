<?php
require_once ('../model/connect.php');
require_once ('upload2.php');
if (isset($_POST['std']) && ($_POST['std'] != null)) {
  addempani();
}
?>
<html>
  <head>
    <title>ANIMAL MANAGEMENT[STAFF] : Animal Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script language="JavaScript" type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <script language="JavaScript" type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
    <script language="JavaScript" type="text/javascript" charset="utf8" src="//cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="./js/animalinfo.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.dataTables.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>

<body>
<img src="image/truck.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>
    <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="https://emmalinezoo.com">EMMALINE ZOO</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="https://emmalinezoo.com/app/animal/index.php">ANIMAL INFOMATION</a></li>
                <li><a href="https://emmalinezoo.com/app/animal/personnel.php">PERSONNEL</a></li>
                <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">FOR STAFF
                    <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://emmalinezoo.com/app/animal/aniInfo.php">Animal Information</a></li>
                            <li><a href="https://emmalinezoo.com/app/animal/takecare.php">Responsibility</a></li>
                        </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <br>
        <br>
        <br>

        <div class="container theme-showcase" role="main">
          <div class="jumbotron" style="background:#808080;">
            <h1 style="color:#E0E0E0;">Responsibility [STAFF PAGE]</h1>
            <p style="color:white;">All animals will be take care (= • x • =)</p>
          </div>
<div style="background:#D8D8D8" class="jumbotron">
    <form class="col s12" method="post" accept-charset="utf-8">
        <h3 style="color:#151515";/>
      EmployeeID :
    <?php
        if ($conn) {

            $sql = "SELECT EMPID, FIRSTNAME, LASTNAME FROM EMM_ZOO.EMPLOYEE;";

            $stmt = dbQuery($conn,$sql);

            if($stmt == FALSE) {
    	       die('Critical error: '. db2_stmt_error($stmt));
            }

            echo("<select name='empid' style='border-radius:25px;border:2px solid #FF7DD4;text-align:center;color:#FF7DD4;'>\n");

            while ($row = dbFetchArray($conn,$stmt)) {
            echo "\t
            <option value='$row[0]'>$row[0] - $row[1] $row[2]</option>
            \n";
        }

        echo "</select>\n";
        db2_free_stmt($stmt);

        } else {
            echo "Connection failed" .db2_conn_errormsg($conn);
        }
    ?>

<br>

      <br>AnimalID :
      <?php

      if ($conn) {

      $sql = "SELECT ANIMALID, ANIMALNAME FROM EMM_ZOO.ANIMAL;";

      $stmt = dbQuery($conn,$sql);

      if($stmt == FALSE) {
       die('Critical error: '.db2_stmt_error($stmt));
      }

       echo("<select name='aniid' style='border-radius:25px;border:2px solid #FF7DD4;text-align:center;color:#FF7DD4;'>\n");

            while ($row = dbFetchArray($conn,$stmt)) {
            echo "\t
            <option value='$row[0]'>$row[0] - $row[1]</option>
            \n";
        }

        echo "</select>\n";
        db2_free_stmt($stmt);

        } else {
            echo "Connection failed" .db2_conn_errormsg($conn);
        }
    ?>


<br>
      <br> StartDate of takecare this animal :
      <input type="date" name="std" placeholder="YYYY-MM-DD" style="border-radius:25px;border:2px solid #FF7DD4;text-align:center;color:#FF7DD4;">

<br>
      <br> EndDate of takecare this animal :
      <input type="date" name="end" placeholder="YYYY-MM-DD" style="border-radius:25px;border:2px solid #FF7DD4;text-align:center;color:#FF7DD4;">

      <br><br>
      <button class="btnExample" type="submit" value="Submit"/>SUBMIT</button>
      <br><br>
        <style>
          .btnExample {
           width:200px ;
           height:50px;
           color: white;
           background: #FF7DD4;
           font-size: 20px;
           font-weight: bold;
           border: 1px solid white;
           border-radius:25px
         }

          .btnExample:hover {
          color: white;
          background: pink;

        }
        </style>
    </form>
    </div>

    <?php

          if ($conn) {
            $sql = "SELECT ea.empid, e.firstname, e.lastname, ea.animalid, a.animalname, ea.empcarestart, ea.empcareend
        FROM EMM_ZOO.EMPFORANIMAL as ea, EMM_ZOO.EMPLOYEE as e, EMM_ZOO.ANIMAL as a
        WHERE a.animalid = ea.animalid and e.empid = ea.empid;";

            $stmt = dbQuery($conn,$sql);

            if($stmt == FALSE) {
          	   die('Critical error: '. db2_stmt_error($stmt));
          }

          echo("<table id='aniinfo' class='display responsive' cellspacing='0' width='100%' role='grid'>\n");
          echo("<thead>
            <tr>
              <th>EMPLOYEE ID</th>
              <th>NAME OF EMPLOYEE</th>
              <th>ANIMAL ID</th>
              <th>NAME OF ANIMAL</th>
              <th>STARTDATE</th>
              <th>ENDDATE</th>
            </tr>
          </thead>");
          echo("<tbody>");
          while ($row = dbFetchArray($conn,$stmt)) {
          echo "\t<tr>
            <td align=\"center\">$row[0]</td>
            <td align=\"center\">$row[1] $row[2]</td>
            <td align=\"center\">$row[3]</td>
            <td align=\"center\">$row[4]</td>
            <td align=\"center\">$row[5]</td>
            <td align=\"center\">$row[6]</td>
          </tr>\n";
          }
          echo("</tbody>");
          echo "</table>\n";
          db2_free_stmt($stmt);
          db2_close($conn);
          }
          else {
          echo "Connection failed" .db2_conn_errormsg($conn);
          }
          ?>

  </body>
</html>
