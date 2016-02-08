<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/library/function.php');

require_once ('controller.php');
if (isset($_POST['submit_reserved']) && (!empty($_POST['reserved_name'])) && (!empty($_POST['type']))) {
    uploadReserve();
}
if (isset($_POST['submit_edit_reserved']) && (!empty($_POST['edit_reserved_name']))) {
     editReserved();
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
          <li class=" waves-effect waves-light"><a href="index.php">Dashboard</a></li>
          <li class=" waves-effect waves-light"><a href="checkinout.php">Check In/Out</a></li>
          <li class=" waves-effect waves-light"><a href="history.php">History</a></li>
          <li class=" active  waves-effect waves-light"><a href="reserved.php">Reserved Park</a></li>
          <li class="waves-effect waves-light"><a href="statistic.php">Statistic Report</a></li>
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Admin <i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
          <li class="waves-effect waves-light"><a href="index.php">Dashboard</a></li>
          <li class="waves-effect waves-light"><a href="checkinout.php">Check In/Out</a></li>
          <li class="waves-effect waves-light"><a href="history.php">History</a></li>
          <li class="active waves-effect waves-light"><a href="reserved.php">Reserved</a></li>
          <li class="waves-effect waves-light"><a href="statistic.php">Statistic Report</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons lime-text text-darken-2">menu</i></a>
      </div>
    </nav>
    <div id="index-banner" class="parallax-container header-small-img">
      <div class="section no-pad-bot space-top-small">
        <div class="container">
          <div class="row ">
            <h2 class="header center white-text text-lighten-2">PARKING RESERVE</h2>
          </div>
        </div>
      </div>
      <div class="parallax"><img src="img/reserved_head.jpg" alt="reserved_header"></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a class="active text-cyan text-darken-1" href="#reserve_add">Add Reserve</a></li>
            <li class="tab col s3"><a href="#reserve_list">Reserved List</a></li>
          </ul>
          <div class="divider"></div>
        </div>
        <div id="reserve_add" class="col s12">
          <div class="section space-top-verysmall">
            <form class="col s12" method="post" accept-charset="utf-8">
              <div class="row">
                <div class="input-field col s12 m12">
                  <i class="material-icons prefix">account_box</i>
                  <input placeholder="Reserve name" name="reserved_name" id="name" type="text" class="validate" maxlength="40" required/>
                  <label for="name">Reserve name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m12">
                  <i class="material-icons prefix">email</i>
                  <input name="email" id="email" type="email" placeholder="receiver@maildomain.com" class="validate" maxlength="30" required/>
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">phone</i>
                  <input id="phone" placeholder="08X-XXX-XXXX" name="mobile" type="text" class="validate" maxlength="10" required/>
                  <label for="phone">Mobile</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">today</i>
                  <input id="rev_date" placeholder="Reserve date" name="reserved_date" type="date" class="datepicker" required/>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">directions_bus</i>
                  <select id="vehicle_type" name="type" class="validate" required>
                    <option value="" disabled selected>Choose vehicle types</option>
                    <option value="Bus">Bus</option>
                    <option value="Van">Van</option>
                    <option value="Car">Car</option>
                  </select>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">add_location</i>
                  <input type="number" name="quantity" min="1" max="20" class="validate" required/>
                  <label for="quantity">Amount</label>
                </div>
              </div>
              <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>" />
              <div class="row center">
                <button class="btn btn-large waves-effect waves-light cyan darken-1 submit-margin-top" type="submit" name="submit_reserved">Submit
                <i class="material-icons right">send</i>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div id="reserve_list" class="col s12">
          <div class="section">
            <div class="row">
              <nav class="search-bar">
                <div class="nav-wrapper">
                  <div class="input-field">
                    <input id="search" type="search" class="light-table-filter" data-table="order-table" placeholder="Search something..">
                    <label for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                  </div>
                </div>
              </nav>
            </div>
            <table class="responsive-table highlight bordered order-table">
              <thead><tr>
                <th>Name</th>
                <th>Date</th>
                <th>Vehicle type</th>
                <th>Amount</th>
                <th>Mobile</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Detail</th>
              </tr></thead>
              <tbody id="ReserveTable">
                <?php include 'ReservedTable.php' ?>
              </table>
              <div class="row center">
              <ul class="pagination" id="ReservePager"></ul>
            </div>
            </div><!-- section -->
          </div>
          </div>  <!-- containner-->
          <!--  Scripts-->
          <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="application/javascript"></script>
          <script src="js/materialize.js" type="application/javascript"></script>
          <script src="js/init.js" type="application/javascript"></script>
          <script src="js/filter.js" type="application/javascript"></script>
          <script src="js/pagination.js"></script>
          <script src="js/maskinput.js"></script>
          <script> LightTableFilter.init() </script>
          <script>
          $(document).ready(function(){
          $('.modal-trigger').leanModal({ dismissible: true });
          });
          </script>
          <script>
          $(document).ready(function() {
          $('.parallax').parallax();
          $('select').material_select();
          $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 5// Creates a dropdown of 15 years to control year
          });
          });
          </script>
          <script>
          $('#phone').mask('999-999-9999');
          $('#phone').on('blur', function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
          
          if( last.length == 3 ) {
          var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
          var lastfour = move + last;
          
          var first = $(this).val().substr( 0, 9 );
          
          $(this).val( first + '-' + lastfour );
          }
          });
          </script>
          <!-- preloader -->
          <script>
          //<![CDATA[
          $(document).ready(function(){ // makes sure the whole site is loaded
          $('#preloader').delay(500).fadeOut(); // will first fade out the loading animation
          $('#white_bg').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website.
          $('body').delay(500).css({
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
      </html>

      <?php 
db2_close($conn);
      ?>