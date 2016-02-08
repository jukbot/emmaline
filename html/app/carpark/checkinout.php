<!DOCTYPE html>
<?php
require_once ('../model/connect.php');
require_once ('controller.php');
require_once ('/var/www/html/app/library/function.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
header('Location: ../login.php');
exit();
}
if (isset($_POST['submit_checkin']) && (!empty($_POST['carregno'])) && (!empty($_POST['parkzone']))) {
checkIn();
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
      <li><a href="" onclick="noticetoast();" class="grey-text text-darken-4"><i class="small material-icons left grey-text text-darken-4 waves-effect waves-light">notifications</i> Notifications </a></li>
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
          <li class="waves-effect waves-light"><a href="index.php">Dashboard</a></li>
          <li class="active waves-effect waves-light"><a href="checkinout.php">Check In/Out</a></li>
          <li class="waves-effect waves-light"><a href="history.php">History</a></li>
          <li class="waves-effect waves-light"><a href="reserved.php">Reserved Park</a></li>
          <li class="waves-effect waves-light"><a href="statistic.php">Statistic Report</a></li>
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Admin <i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
          <li class="waves-effect waves-light"><a href="index.php">Dashboard</a></li>
          <li class="active waves-effect waves-light"><a href="checkinout.php">Check In/Out</a></li>
          <li class="waves-effect waves-light"><a href="history.php">History</a></li>
          <li class="waves-effect waves-light"><a href="reserved.php">Reserved</a></li>
          <li class="waves-effect waves-light"><a href="statistic.php">Statistic Report</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons lime-text text-darken-2">menu</i></a>
      </div>
    </nav>
    <div id="index-banner" class="parallax-container header-small-img">
      <div class="section no-pad-bot space-top-small">
        <div class="container">
          <div class="row ">
            <h2 class="header center white-text text-lighten-2">PARKING CHECK IN-OUT</h2>
          </div>
        </div>
      </div>
      <div class="parallax"><img src="img/checkinout_header.jpg" alt="history_header"></div>
    </div>
    <div class="container">
      <div class="row">
         <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a class="active text-cyan text-darken-1" href="#checkin">Check In</a></li>
            <li class="tab col s3"><a href="#checkout">Check Out</a></li>
          </ul>
          <div class="divider"></div>
        </div>
        <div id="checkin" class="col s12">
          <div class="section">
               <form class="col s12" method="post" accept-charset="utf-8">
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">directions_car</i>
                  <input placeholder="ป้ายทะเบียนรถ" name="carregno" id="name" type="text" class="validate" maxlength="6" required/>
                  <label for="name">Car RegNo</label>
                </div>
                  <div class="input-field col s12 m6">
                  <i class="material-icons prefix">local_parking</i>
                  <select id="parkzone" name="parkzone" class="validate" required>
                    <option value="" disabled selected>Choose carpark zone</option>
                    <option value="Indoor">Indoor</option>
                    <option value="Outdoor">Outdoor</option>
                  </select>
                </div>
              </div>
              <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>" />
              <div class="row center">
                <button class="btn btn-large waves-effect waves-light cyan darken-1 submit-margin-top" type="submit" name="submit_checkin">Check In
                <i class="material-icons right">send</i>
                </button>
              </div>
            </form>
          </div>
        </div>
        
        <div id="checkout" class="col s12">
          <div class="section">
          <div class="row">
            <nav class="search-bar">
              <div class="nav-wrapper">
                <form>
                  <div class="input-field">
                    <input id="search" type="search" class="light-table-filter" data-table="order-table" placeholder="Search something.." required>
                    <label for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                  </div>
                </form>

              </div>
            </nav>
          </div>
              <table class="responsive-table highlight bordered order-table">
              <thead><tr>
                <th>TicketPark ID</th>
                <th>CarRegNo</th>
                <th>Zones</th>
                <th>Date</th>
                <th>CheckIn</th>
                <th>Detail</th>
              </tr></thead>
              <tbody id="ReserveTable">
                <?php include 'checkinoutTable.php' ?>
              </table>

            <div class="row center">
            <ul class="pagination" id="ReservePager"></ul>
          </div>
        </div> 
        </div>


        <!-- row -->
      </div>
      <!-- containner-->
    </div>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="application/javascript"></script>
    <script src="js/materialize.js" type="application/javascript"></script>
    <script src="js/init.js" type="application/javascript"></script>
    <script src="js/filter.js" type="application/javascript"></script>
    <script src="js/pagination.js"></script>
    <script> LightTableFilter.init() </script>
    <script>
 $(document).ready(function(){
     $('.modal-trigger').leanModal({ dismissible: true });
    });
   </script>
   <script>
$(document).ready(function() {
    $('select').material_select();
});
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

      <?php 
db2_close($conn);
      ?>