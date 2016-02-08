<?php

  // include (dirname(__FILE__).'/app/model/connect.php');
  require_once ('../model/connect.php');
?>
<html>
  <head>
    <title>ANIMAL MANAGEMENT : animal information</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script language="JavaScript" type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <script language="JavaScript" type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
    <script language="JavaScript" type="text/javascript" charset="utf8" src="//cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="./js/animalinfo.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.dataTables.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>

<body style="background-color:#DAECFF;">
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
                <!-- <li><a href="https://emmalinezoo.com/app/animal/transfer.php">TRANSFERATION</a></li> -->
                <li><a href="https://emmalinezoo.com/app/animal/personnel.php">PERSONNEL</a></li>
                <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">FOR STAFF
                    <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://emmalinezoo.com/app/animal/aniInfo.php">Animal Information</a></li>
                            <li><a href="https://emmalinezoo.com/app/animal/takecare.php">Responsibility</a></li>
                        </ul>
                </li>
              </ul>

              <!-- <form class="navbar-form navbar-right">
                      <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Username" class="form-control" required/>
                          </div>
                          <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
                          </div>
                          <input href="#" type="submit" name="submit" value="Login" class="btn btn-success"/>
              </form> -->
            </div>
          </div>
        </nav>

        <br>
        <br>
        <br>

        <div class="container theme-showcase" role="main">

          <div class="jumbotron" style="background-color:#99CCFF;">
            <h1 style="color:white">Animal Information</h1>
            <p style="color:white">Every animals has information.</p>
          </div>

        <?php

          require_once ('../model/connect.php');

          if ($conn) {
            $sql = "SELECT a.animalpicture, a.animalname, b.speciesname, a.sex, a.height, a.weight, a.healthstatus, a.birthdate
              FROM EMM_ZOO.ANIMAL as a, EMM_ZOO.ANIMALSPECIES as s, EMM_ZOO.BIOINFO as b
              WHERE a.animalid = s.animalid and s.speciesid = b.speciesid and a.diedate IS NULL;";

            $stmt = dbQuery($conn,$sql);

            if($stmt == FALSE) {
          	   die('Critical error: '. db2_stmt_error($stmt));
          }

          echo("<table id='aniinfo' class='display responsive' cellspacing='0' width='100%' role='grid'>\n");
          echo("<thead>
            <tr>
              <th>PICTURE</th>
              <th>NAME</th>
              <th>SPECIE</th>
              <th>SEX</th>
              <th>HEIGHT(cm)</th>
              <th>WEIGHT(kg)</th>
              <th>HEALTH STATUS</th>
              <th>BIRTHDATE</th>
            </tr>
          </thead>");
          echo("<tbody>");
          while ($row = dbFetchArray($conn,$stmt)) {
          echo "\t<tr>
            <td align=\"center\"><img src=$row[0] alt='' border='1' height='100' width='100' /></td>
            <td align=\"center\">$row[1]</td>
            <td align=\"center\">$row[2]</td>
            <td align=\"center\">$row[3]</td>
            <td align=\"center\">$row[4]</td>
            <td align=\"center\">$row[5]</td>
            <td align=\"center\">$row[6]</td>
            <td align=\"center\">$row[7]</td>
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
