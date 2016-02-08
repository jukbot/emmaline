<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/library/function.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
header('Location: ../login.php');
exit();
}
$errorMessage = '&nbsp;';
if (isset($_POST['submit'])) {
$result = doLogout();
if ($result != '') {
$errorMessage = $result;
echo $errorMessage;
}
}
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>EMM PARKING</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>
  <body>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#setting" class="grey-text text-darken-4 modal-trigger"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">settings</i> Settings</a></li>
      <li><a href="#!" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">notifications</i> Notifications </a></li>
      <li><a href="#!" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">search</i> Search</a></li>
      <li><a href="#!" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">file_upload</i> Import..</a></li>
      <li><a href="#!" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">file_download</i> Export..</a></li>
      <li class="divider"></li>
      <li><form method="post" name="logout"><button class="btn-flat" type="submit" name="submit"><i class="small material-icons left grey-text text-darken-4">exit_to_app</i> Logout</button></form></li>
    </ul>
    <nav class="white" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo">EMM PARKING </a>
        <ul class="right hide-on-med-and-down">
          <li class=" active waves-effect waves-light"><a href="index.php">Dashboard</a></li>
          <li class=" waves-effect waves-light"><a href="checkinout.php">Check In/Out</a></li>
          <li class=" waves-effect waves-light"><a href="history.php">History</a></li>
          <li class=" waves-effect waves-light"><a href="reserved.php">Reserved Park</a></li>
          <li class="waves-effect waves-light"><a href="statistic.php">Statistic Report</a></li>
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $_SESSION['current_user_name']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
          <li class="active waves-effect waves-light"><a href="index.php">Dashboard</a></li>
          <li class="waves-effect waves-light"><a href="checkinout.php">Check In/Out</a></li>
          <li class="waves-effect waves-light"><a href="history.php">History</a></li>
          <li class="waves-effect waves-light"><a href="reserved.php">Reserved</a></li>
          <li class="waves-effect waves-light"><a href="statistic.php">Statistic Report</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons cyan-text text-darken-1">menu</i></a>
      </div>
    </nav>
    
    <div id="index-banner" class="parallax-container">
      <div class="section no-pad-bot space-top">
        <div class="container">
          <h1 class="header center white-text text-lighten-2">EMM PARKING</h1>
          <div class="row center">
            <h5 class="header col s12 light">A modern car park management system on IBM enterprise database</h5>
          </div>
          <div class="row center">
            <a href="statistic.php" id="download-button" class="btn-large waves-effect waves-light cyan darken-1">View Statistic</a>
          </div>
        </div>
      </div>
      <div class="parallax"><img src="img/park_header.jpg" alt="Unsplashed background img 1"></div>
    </div>
    <div class="container">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center grey-text  text-darken-4"><i class="material-icons large-icon">add_location</i></h2>
            <h5 class="center">Check In/Out</h5>
            <div class="row center">
              <a href="checkinout.php" id="download-button" class="btn-large waves-effect waves-light cyan darken-1">Check In/Out</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center grey-text  text-darken-4"><i class="material-icons large-icon">directions_car</i></h2>
            <h5 class="center">Reserved Park</h5>
            <div class="row center">
              <a href="reserved.php" id="download-button" class="btn-large waves-effect waves-light cyan darken-1">Reserve Park</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center grey-text  text-darken-4"><i class="material-icons large-icon">traffic</i></h2>
            <h5 class="center">Park Monitoring</h5>
            <div class="row center">
              <a href="history.php" id="download-button" class="btn-large waves-effect waves-light cyan darken-1">View History</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="parallax-container valign-wrapper">
      <div class="section no-pad-bot">
        <div class="container">
          <div class="section">
            <div class="row center">
              <h4>Lots Available Chart</h4>
              <div class="col s12 m4 center">
                <div class="card-panel semi-transparent-bg">
                  <h5 class="black-text">Outdoor 300 Parks</h5>
                  <canvas id="outdoor_park"></canvas>
                </div>
              </div>
              <div class="col s12 m4 center">
                <div class="card-panel semi-transparent-bg">
                  <h5 class="black-text">Indoor 900 Parks</h5>
                  <canvas id="building_park"></canvas>
                </div>
              </div>
              <div class="col s12 m4 center">
                <div class="card-panel semi-transparent-bg">
                  <h5 class="black-text">Total 1,200 Parks</h5>
                  <canvas id="total_park"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="parallax"><img src="img/park_z.jpg" alt="Unsplashed background img 2"></div>
    </div>
    <footer class="page-footer cyan darken-2">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">About EMM Parking System</h5>
            <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
          </div>
          <div class="col l3 s12">
            <h5 class="white-text">Internal Connections</h5>
            <ul>
              <li><a class="white-text" href="//emmalinezoo.com">Emmaline Home</a></li>
              <li><a class="white-text" href="//emmalinezoo.com/app/index.php">Administrator Console</a></li>
              <li><a class="white-text" href="//emmalinezoo.com/project.html">Project</a></li>
            </ul>
          </div>
          <div class="col l3 s12">
            <h5 class="white-text">Developer Contact</h5>
            <ul>
              <li><a class="white-text" href="https://www.facebook.com/vchukkriter">Juk</a></li>
              <li><a class="white-text" href="https://www.facebook.com/yossakorn.bom?fref=ts">Bomb</a></li>
              <li><a class="white-text" href="https://www.facebook.com/profile.php?id=100001167950233&fref=ts">Jeew</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          Supportted by <a class="grey-text text-lighten-2" href="http://materializecss.com">Materialize CSS</a>
        </div>
      </div>
    </footer>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="application/javascript"></script>
    <script src="js/materialize.js" type="application/javascript"></script>
    <script src="js/init.js" type="application/javascript"></script>
    <script src="js/CircleChart.js" type="application/javascript"></script>
    <script>    $('.parallax').parallax();</script> 

    <?php 
require_once('/var/www/html/app/model/connect.php');
  $conn = dbConnect();
  if ($conn) {
    $sql_count_indoor = "SELECT COUNT(*) as INDOOR_COUNT FROM EMM_ZOO.PARKCHECKINOUT WHERE ZONES = 'Indoor'";
    $sql_count_outdoor = "SELECT COUNT(*) as OUTDOOR_COUNT FROM EMM_ZOO.PARKCHECKINOUT WHERE ZONES = 'Outdoor'";
    $stmt1 = db2_exec($conn, $sql_count_indoor);
        while ($row = dbFetchAssoc($stmt1)) {
              $indoor_cnt = $row['INDOOR_COUNT'];
         }
    $stmt2 = db2_exec($conn, $sql_count_outdoor);
        while ($row = dbFetchAssoc($stmt2)) {
              $outdoor_cnt = $row['OUTDOOR_COUNT'];
         }
        db2_free_stmt($stmt1);
        db2_free_stmt($stmt2);
        db2_close($conn);
     } else {
    echo db2_conn_errormsg($conn);
  }
    ?>
    <script>
    $(document).ready(function(){
    // input data in integer
    var out_count = <?php echo $outdoor_cnt .";" ?>
    var in_count = <?php echo $indoor_cnt .";" ?>
    var total_count = out_count + in_count;
    var out_percent = (out_count*100)/300;
    var in_percent = (in_count*100)/900;
    var out_decicut = out_percent.toFixed(1);
    var in_decicut = in_percent.toFixed(1);
    var outdoor_chart= new CircleChart();
    outdoor_chart.setColors('#00bcd4', '#006064');
    outdoor_chart.init("outdoor_park", out_decicut, 300-out_count);
    var building_chart = new CircleChart();
    building_chart.setColors('#00bcd4', '#006064');
    building_chart.init("building_park", in_decicut, 900-in_count);
    var inc = true;
    var total_percent = ((total_count)*100/1200);
    var total_decicut = total_percent.toFixed(1);
    var total_chart = new CircleChart();
    total_chart.setColors('#00bcd4', '#006064');
    total_chart.init("total_park", total_decicut, total_count);
    });
    </script>
      </body>
</html>