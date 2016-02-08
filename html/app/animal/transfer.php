<html>
  <head>
    <title>ANIMAL MANAGEMENT : transferation</title> 

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script language="JavaScript" type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <script language="JavaScript" type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
    <script language="JavaScript" type="text/javascript" charset="utf8" src="//cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="./js/transfer.js"></script>

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

<body>
    <!-- <img src="image/camo.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'> -->

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
                <li><a href="https://emmalinezoo.com/app/animal/transfer.php">TRANSFERATION</a></li>
                <li><a href="https://emmalinezoo.com/app/animal/personnel.php">PERSONNEL</a></li>
                <li><a href="https://emmalinezoo.com/app/animal/aniInfo.php">FOR STAFF</a></li>
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
            </div><
          </div>
        </nav>

        <br>
        <br>
        <br>

        <div class="container theme-showcase" role="main">

          <div class="jumbotron">
            <h1>Animal Tranferation :</h1>
            <p>Searching where animal go.</p>
          </div>



        <?php

          // include (dirname(__FILE__).'/app/model/connect.php');
          require_once ('../model/connect.php');



          if ($conn) {
            $sql = "SELECT transportationid, animalid, from_location, to_location
              FROM EMM_ZOO.ANIMALTRANSFER;";

              //print "SQL " .$sql;

            $stmt = dbQuery($conn,$sql);

            if($stmt == FALSE) {
          	   die('Critical error: '. db2_stmt_error($stmt));
          }

          echo("<table id='transfer' class='display responsive' cellspacing='0' width='100%' role='grid'>\n");
          echo("<thead>
            <tr>
              <th>TRANSFER ID</th>
              <th>ANIMAL ID</th>
              <th>FROM LOCATION</th>
              <th>TO LOCATION</th>

            </tr>
          </thead>");
          echo("<tbody>");
          while ($row = dbFetchArray($conn,$stmt)) {
          echo "\t<tr>
            <td align=\"center\">Transfer ID : $row[0]</td>
            <td align=\"center\">$row[1]</td>
            <td align=\"center\">$row[2]</td>
            <td align=\"center\">$row[3]</td>

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
