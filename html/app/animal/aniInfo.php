<!DOCTYPE html>
<?php
require_once ('../model/connect.php');
require_once ('upload.php');

if (isset($_POST['aniid']) && ($_POST['aniid'] != null)) {
  addanimal();
  addspecies();
}
if (isset($_POST['dieid']) && ($_POST['dieid'] != null)) {
  animaldie();
}
?>
<html>
  <head>
    <title>ANIMAL MANAGEMENT[STAFF] : animal information</title>

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
        <img src="image/forest.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>


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
            <h1 style="color:#E0E0E0;">Animal Information [STAFF PAGE]</h1>
            <p style="color:white;">Animals are waiting for you (= • w • =)</p>
          </div>
<div style="background:#D8D8D8" class="jumbotron">
    <form class="col s12" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <h2><u>ADD ANIMALS</u></h2>
    <h3 style="color:#151515";>
      AnimalID :
    <input type="text" name="aniid" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;">
<br>
    <br> Name of animal :
    <input type="text" name="name" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;">
<br>
    <br> Species :
    <?php

      if ($conn) {

        $sql = "SELECT speciesid, speciesname FROM EMM_ZOO.BIOINFO;";

        $stmt = dbQuery($conn,$sql);

        if($stmt == FALSE) {
      	   die('Critical error: '. db2_stmt_error($stmt));
        }

        echo("<select name='species' style='border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;'>\n");

        while ($row = dbFetchArray($conn,$stmt)) {
          echo "\t
            <option value='$row[0]'>$row[1]</option>
          \n";
        }
        echo "</select>\n";
        db2_free_stmt($stmt);
      } else {
        echo "Connection failed" .db2_conn_errormsg($conn);
      }
      ?>
<br>
    <br> Height :
    <input type="text" name="height" placeholder="Centimeter" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;">
<br>
    <br> Weight :
    <input type="text" name="weight" placeholder="Kilogram" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;">
<br>
    <br> Sex :
        <select name="sex" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;width:auto;">
            <option value="male">MALE</option>
            <option value="female">FEMALE</option>
            <option value="hermaphrodite">HERMAPHRODITE</option>
            <option value="unknown">UNKNOWN</option>
        </select>
<br>
    <br> Health status :
        <select name="health" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;width:auto;">
            <option value="normal">NORMAL</option>
            <option value="sick">SICK</option>
        </select>
<br>
    <br> Birthdate :
    <input type="date" name="birth" placeholder="YYYY-MM-DD" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;">
<br><br>
File name:
        <h4><input type="file" name="imgfile"></h4>
    <!-- <br> Diedate :
    <input type="text" name="die" placeholder="YYYY-MM-DD" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;">
            </h3> -->
    <br>
    <button class="btnExample" type="submit" value="Submit"/>SUBMIT</button>
      <style>
        .btnExample {
         width:200px ;
         height:50px;
         color: white;
         background: #3399FF;
         font-size: 20px;
         font-weight: bold;
         border: 1px solid white;
         border-radius:25px
       }

        .btnExample:hover {
        color: #3399FF;
        background: white;
        border: 1px solid #3399FF;
      }
      </style>
  </form>
</div>

<div style="background:#D8D8D8" class="jumbotron">
    <form class="col s12" method="post" accept-charset="utf-8">
        <h2><u>IF ANIMAL DIE</u></h2>
      <h3>AnimalID :
      <?php

      if ($conn) {

      $sql = "SELECT ANIMALID, ANIMALNAME FROM EMM_ZOO.ANIMAL WHERE diedate is null;";

      $stmt = dbQuery($conn,$sql);

      if($stmt == FALSE) {
       die('Critical error: '.db2_stmt_error($stmt));
      }

       echo("<select name='dieid' style='border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;'>\n");

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
        <br><br>
        Diedate:
        <input name='diedate' type="date" name="birth" placeholder="YYYY-MM-DD" style="border-radius:25px;border:2px solid #3399FF;text-align:center;color:#3399FF;">
        <br><br>
        <input class="btndie" type="submit" name="die" value="DIED!!!">
          <style>
        .btndie {
         width:150px ;
         height:50px;
         color: white;
         background: #3399FF;
         font-size: 20px;
         font-weight: bold;
         border: 1px solid white;
         border-radius:25px
       }

        .btndie:hover {
        color: #3399FF;
        background: white;
        border: 1px solid #3399FF;
      }
      </style>
        </h3>
    </form>
</div>





        <?php


          if ($conn) {
            $sql = "SELECT a.animalpicture, a.animalname, b.speciesname, a.sex, a.height, a.weight, a.healthstatus, a.birthdate, a.diedate, a.animalid
              FROM EMM_ZOO.ANIMAL as a, EMM_ZOO.ANIMALSPECIES as s, EMM_ZOO.BIOINFO as b
              WHERE a.animalid = s.animalid and s.speciesid = b.speciesid;";

            $stmt = dbQuery($conn,$sql);

            if($stmt == FALSE) {
          	   die('Critical error: '. db2_stmt_error($stmt));
          }

          echo("<table id='aniinfo' class='display responsive' cellspacing='0' width='100%' role='grid'>\n");
          echo("<thead>
            <tr>
              <th>PICTURE</th>
              <th>ID</th>
              <th>NAME</th>
              <th>SPECIE</th>
              <th>SEX</th>
              <th>HEIGHT(cm)</th>
              <th>WEIGHT(kg)</th>
              <th>HEALTH STATUS</th>
              <th>BIRTHDATE</th>
              <th>DIEDATE</th>
              <th>DELECT</th>
            </tr>
          </thead>");
          echo("<tbody>");
          while ($row = dbFetchArray($conn,$stmt)) {
          echo "\t<tr>
            <td align=\"center\"><img src=$row[0] alt='' border='1' height='100' width='100' /></td>
            <td align=\"center\">$row[9]</td>
            <td align=\"center\">$row[1]</td>
            <td align=\"center\">$row[2]</td>
            <td align=\"center\">$row[3]</td>
            <td align=\"center\">$row[4]</td>
            <td align=\"center\">$row[5]</td>
            <td align=\"center\">$row[6]</td>
            <td align=\"center\">$row[7]</td>
            <td align=\"center\">$row[8]</td>
            <form action = 'delete.php' method='post'>
            <td align=\"center\"> <input type='hidden' name='aniid' value='" . $row[9]. "'><button type='submit' name='delete' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>
          </form></tr>\n";
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
