<?php 
require_once ('/var/www/html/app/model/connect.php');
?>
<!DOCTYPE html>
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
  <li><a href="#!" onclick="noticetoast();" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">notifications</i> Notifications </a></li>
  <li><a href="#!" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">search</i> Search</a></li>
  <li><a href="#!" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">file_upload</i> Import..</a></li>
  <li><a href="#!" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">file_download</i>  Export..</a></li>
  <li class="divider"></li>
  <li><a href="#!" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">exit_to_app</i> Logout</a></li>
</ul>

  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">EMM PARKING </a>
      <ul class="right hide-on-med-and-down">
        <li class=" waves-effect waves-light"><a href="index.php">Dashboard</a></li>
        <li class=" waves-effect waves-light"><a href="checkinout.php">Check In/Out</a></li>
        <li class=" waves-effect waves-light"><a href="history.php">History</a></li>
        <li class=" waves-effect waves-light"><a href="reserved.php">Reserved Park</a></li>
        <li class="active waves-effect waves-light"><a href="statistic.php">Statistic Report</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Admin <i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>


      <ul id="nav-mobile" class="side-nav">
        <li class="waves-effect waves-light"><a href="index.php">Dashboard</a></li>
        <li class="waves-effect waves-light"><a href="checkinout.php">Check In/Out</a></li>
        <li class="waves-effect waves-light"><a href="history.php">History</a></li>
        <li class="waves-effect waves-light"><a href="reserved.php">Reserved</a></li>
        <li class="active waves-effect waves-light"><a href="statistic.php">Statistic Report</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons lime-text text-darken-2">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container header-small-img">
    <div class="section no-pad-bot space-top-small">
      <div class="container">
         <div class="row ">
        <h2 class="header center white-text text-lighten-2">STATISTIC REPORT</h2>
         </div>
      </div>
    </div>
    <div class="parallax"><img src="img/statistic_header.jpg" alt="statistic_header"></div>
  </div>

  <div class="container">
    <div class="section">
    <div class="row center">
      <h4>Indoor Available Lots</h4>
      <div class="col s12 m4 center">
        <div class="card-panel white">
        <h5>1st Floor</h5>
           <canvas id="first_floor"></canvas>
        </div>
      </div>
        <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>2nd Floor</h5>
           <canvas id="second_floor"></canvas>
        </div>
      </div>
       <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>3rd Floor</h5>
           <canvas id="third_floor"></canvas>
        </div>
      </div>
            <div class="col s12 m4 center">
        <div class="card-panel white">
        <h5>4th Floor</h5>
           <canvas id="fourth_floor"></canvas>
        </div>
      </div>
        <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>5th Floor</h5>
           <canvas id="fifth_floor"></canvas>
        </div>
      </div>
       <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>6th Floor</h5>
           <canvas id="sixth_floor"></canvas>
        </div>
      </div>
    </div>           
    </div>
  </div>
  <div class="grey darken-4">
  <div class="container">
    <div class="section">
        <div class="row center">
     <h4 class="white-text">Summary Available Lots</h4>
      <div class="col s12 m4 center">
        <div class="card-panel white">
        <h5>Outdoor 300 Parks</h5>
           <canvas id="outdoor_park"></canvas>
        </div>
      </div>
        <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Indoor 900 Parks</h5>
           <canvas id="building_park"></canvas>
        </div>
      </div>
       <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Total 1,200 Parks</h5>
           <canvas id="total_park"></canvas>
        </div>
      </div>
     </div>
    </div>
  </div>
</div>
  <div class="parallax-container valign-wrapper header-small-img">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive fucking framework based on Material Design</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/underground.jpg" alt="Unsplashed background img 2"></div>
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
  <script src="js/notification.js" type="text/javascript"></script>

      <?php 

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
    $('.tooltipped').tooltip({delay: 50});
    $('ul.tabs').tabs();
    $('.dropdown-button').dropdown();
  });

        // input data in integer  
        var out_count = <?php echo $outdoor_cnt .";" ?>;
        var first_floor_count = 120;
        var second_floor_count = 120;
        var third_floor_count = 110;
        var fourth_floor_count = 43;
        var fifth_floor_count = 0;
        var sixth_floor_count = 0;
        var in_count = <?php echo $indoor_cnt .";" ?>;
        var total_count = out_count + in_count;
        //console.log(in_count);

        var first_percent = ((first_floor_count*100)/150);
        var second_percent = ((second_floor_count*100)/150);
        var third_percent = ((third_floor_count*100)/150);
        var fourth_percent = ((fourth_floor_count*100)/150);
        var fifth_percent = ((fifth_floor_count*100)/150);
        var sixth_percent = ((sixth_floor_count*100)/150);

        var first_decicut = first_percent.toFixed(1); 
        var second_decicut = second_percent.toFixed(1); 
        var third_decicut = third_percent.toFixed(1); 
        var fourth_decicut = fourth_percent.toFixed(1); 
        var fifth_decicut = fifth_percent.toFixed(1); 
        var sixth_decicut = sixth_percent.toFixed(1); 

        var out_percent = (out_count*100)/300;
        var out_decicut = out_percent.toFixed(1); 
        var in_percent = (in_count*100)/900;
        var in_decicut = in_percent.toFixed(1);
        var total_percent = ((total_count)*100/1200);
        var total_decicut = total_percent.toFixed(1);
        // indoor_1_floor
        var first_floor_chart = new CircleChart();
        first_floor_chart.setColors('#80cbc4', '#00897b');
        first_floor_chart.init("first_floor", first_decicut, first_floor_count);
        // indoor_2_floor
        var second_floor_chart = new CircleChart();
        second_floor_chart.setColors('#c5e1a5', '#8bc34a');
        second_floor_chart.init("second_floor", second_decicut, second_floor_count);
        // indoor_3_floor
        var third_floor_chart = new CircleChart();
        third_floor_chart.setColors('#e6ee9c', '#cddc39');
        third_floor_chart.init("third_floor", third_decicut, third_floor_count);
        // indoor_4_floor
        var fourth_floor_chart = new CircleChart();
        fourth_floor_chart.setColors('#ffe082', '#ffc107');
        fourth_floor_chart.init("fourth_floor", fourth_decicut, fourth_floor_count);
        // indoor_5_floor
        var fifth_floor_chart = new CircleChart();
        fifth_floor_chart.setColors('#ffcc80', '#ff9800');
        fifth_floor_chart.init("fifth_floor", fifth_decicut, fifth_floor_count); 
        // indoor_6_floor
        var sixth_floor_chart = new CircleChart();
        sixth_floor_chart.setColors('#ef9a9a', '#f44336');
        sixth_floor_chart.init("sixth_floor", sixth_decicut, sixth_floor_count);
        // outdoor_park
        var outdoor_chart= new CircleChart();
        outdoor_chart.setColors('#ce93d8', '#4a148c');
        outdoor_chart.init("outdoor_park", out_decicut, 300-out_count);
        // building_park
        var building_chart = new CircleChart();
        building_chart.setColors('#f48fb1', '#e91e63');
        building_chart.init("building_park", in_decicut , 900-in_count);

        // total_park
        var total_chart = new CircleChart();    
        total_chart.setColors('#4dd0e1', '#006064');
        total_chart.init("total_park", total_decicut, 1200-total_count);
        var inc = true;
        var countArr = [300-out_count, 150-first_floor_count, 150-second_floor_count, 150-third_floor_count, 150-fourth_floor_count, 150-fifth_floor_count, 150-sixth_floor_count];

        for(var i = 0; i < countArr.length; i++){
           console.log(i + " = " + countArr[i]);
         }
        console.log(countArr);
</script>  

<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
  $(document).ready(function(){ // makes sure the whole site is loaded
            $('.parallax').parallax();
            $('#preloader').delay(100).fadeOut(); // will first fade out the loading animation
            $('#white_bg').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(100).css({
                'overflow': 'visible'
            });
         });
    //]]>
</script>
</body>

<!-- Preloader -->
<div id="white_bg">
   <div id ="preloader" class="row center">
    <div class="progress">
      <div class="indeterminate"></div>
  </div>
</div>
</div>

  <!-- Modal Structure -->
  <div id="setting" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Settings</h4>
      <p>hello it's me i was wondering if after all these years.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat right">Close<i class="material-icons right">close</i></a>
    </div>
  </div>

</html>
