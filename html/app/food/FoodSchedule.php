<!DOCTYPE html>
<?php 
require_once ('../model/connect.php');
require_once ('/var/www/html/app/library/function.php');
if (isset($_POST['logout'])) {
  $result = doLogout();
    if ($result != '') {
    $errorMessage = $result;
    echo $errorMessage;
  }
}


?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Food Schedule</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=no">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/month_white.css?v=187" />
        <link type="text/css" rel="stylesheet" href=".css/month_green.css?v=187" />    
        <link type="text/css" rel="stylesheet" href=".css/month_transparent.css?v=187" />    
              
        <link type="text/css" rel="stylesheet" href="css/calendar_transparent.css?v=187" />    
        <link type="text/css" rel="stylesheet" href="css/calendar_white.css?v=187" />    
        <link type="text/css" rel="stylesheet" href="css/calendar_green.css?v=187" />    

        <link type="text/css" rel="stylesheet" href="css/navigator_green.css?v=187" />    
        <link type="text/css" rel="stylesheet" href="css/navigator_white.css?v=187" /> 

    </head>
    <body>
      <nav class="white" role="navigation">
        <div class="nav-wrapper container">
          <ul class="right hide-on-med-and-down">
            <li class=" waves-effect waves-light"><a href="index.php">Menu</a></li>
            <li><form method="post" name="logout"><button class="btn-flat" type="submit" name="logout">Logout</button></form></li>    
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li class=" waves-effect waves-light"><a href="index.php">Menu</a></li>
              <li><form method="post" name="logout"><button class="btn-flat" type="submit" name="logout">Logout</button></form></li>    
          </ul>
        </nav>       
        <div id="index-banner">
      <div class="section no-pad-bot space-top-small">
      <div class="container">
          <div class="row ">
            <h2 class="header center black-text text-lighten-2">FOOD SCHEDULE</h2>
            </div>
        </div>
      </div>

        

      <div class="container">
        <nav class="search-bar">
              <div class="nav-wrapper">
                  <div class="input-field">
                    <input id="search" type="search" class="light-table-filter" data-table="schedule_Table" placeholder="Search scheduleg..">
                    <label for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                  </div>
              </div>
            </nav>
        <div class="section">
         <form class="col s12" method="post" accept-charset="utf-8">
          <div class="input-field col s12 m6">
                  <i class="material-icons prefix">today</i>
                  <input id="rev_date" placeholder="Schedule date" name="schedule_date" type="date" class="datepicker" required/>
                </div>
          <table class="responsive-table highlight bordered order-table">
              <thead><tr>
                <th>Schedule ID</th>
                <th>FoodID</th>
                <th>Food Name</th>
                <th>Food Type</th>
                <th>Amount</th>
                <th>Animal</th>
                <th>Start Time</th>
                <th>End Time</th>
                
              </tr></thead>
              <tbody id="schedule_Table">
                  <?php include 'schedule.php' ?>
              </tbody>
            </table>
            </form>
            </div>
            <div class="row center">
            <ul class="pagination" id="schedulePager"></ul>
            <button data-target='add_Schedule' class='waves-effect waves-light btn modal-trigger'>ADD SCHEDLE</button>             
        </div>
        <div id='add_Schedule' class='modal modal-fixed-footer'>  
              <form method ='post' action='addSchedule.php' name='add_Schedule_form'>  
                <div class='modal-content'>
                  <h4>ADD SCHEDULE</h4>
                    <div class='row'>
                      <div class='input-field col s12 m12'>
                        <input value='' name='food_id' id='food_id' type='text' class='validate' required/>
                          <label for='food_id'>FOOD ID</label>
                      </div>
                      <div class='input-field col s12 m12'>
                        <input value='' name='food_name' id='food_name' type='text' class='validate' required/>
                          <label for='food_name'>FOOD NAME</label>
                      </div>
                      <div class='input-field col s12 m12'>
                        <select name='food_type' id='food_type' class='validate' required/>
                          <option value='' disabled selected>Choose food type</option>
                          <option value='Meat'>Meat</option>
                          <option value='Fish'>Fish</option>
                          <option value='Vegetable'>Vegetable</option>
                          <option value='Fruit'>Fruit</option>
                        </select>
                      </div>
                      <div class='input-field col s12 m12'>
                        <input value='' name='amount' id='amount' type='text' class='validate' required/>
                          <label for='amount'>AMOUNT</label>
                      </div>
                      <div class='input-field col s12 m12'>
                        <input value='' name='animal' id='animal' type='text' class='validate' required/>
                          <label for='animal'>Animal</label>
                      </div>
                      <div class='input-field col s12 m12'>
                        <input value='' placeholder = "use format YYYY-MM-DD HH24:MI:SS" name='feed_start' id='feed_start' type='text' class='validate' required/>
                          <label for='feed_start'>Start</label>
                      </div>
                      <div class='input-field col s12 m12'>
                        <input value='' placeholder = "use format YYYY-MM-DD HH24:MI:SS" name='feed_end' id='feed_end' type='text' class='validate' required/>
                          <label for='feed_end'>END</label>
                      </div>
                    </div>
                  </div>
                  <div class='modal-footer'>
                    <button href='#!' class='modal-action modal-close cyan darken-1 btn' type='submit' name='submit_add'>ADD</button>
                  </div>
                </form>
              </div>
       
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
  
      </body>
        <div id="white_bg">
              <div id ="preloader" class="row center">
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
              </div>
          </div>
</html>