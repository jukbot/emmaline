<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/library/function.php');
require_once ('ordernewControl.php');
require_once ('orderControl.php');
require_once ('export.php');
if (isset($_POST['logout'])) {
  $result = doLogout();
    if ($result != '') {
    $errorMessage = $result;
    echo $errorMessage;
  }
}

if(isset($_POST['submit'])) {
    ordernewfood();
}

if (isset($_POST['order']) && (!empty($_POST['add_amount']))) {
    orderoldfood();
}
if (isset($_POST['export']) && (!empty($_POST['out_amount']))) {
     exportfood();
}

?>
<html >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <title>Food Stock</title>
    
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
        </div>
    </nav>
    <div id="index-banner">
      <div class="section no-pad-bot space-top-small">
      <div class="container">
          <div class="row ">
            <h2 class="header center black-text text-lighten-2">FOOD STOCK</h2>
            </div>
        </div>
      </div>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#food_list">Food List</a></li>
            <li class="tab col s3"><a class="text-cyan text-darken-1" href="#order_new">New order</a></li>
          </ul>
          <div class="divider"></div>
        </div>
        <div id="order_new" class="col s12">
          <div class="section space-top-verysmall">
            <form class="col s12" method="post" accept-charset="utf-8">
              <div class="row">
                <div class="input-field col s12 m12">
                  <i class="material-icons prefix">assignment</i>
                  <input placeholder="Food name" name="food_name" id="fname" type="text" class="validate" required/>
                  <label for="name">Food name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">list</i>
                  <select id="food_type" name="food_type" class="validate">
                    <option value="" disabled selected>Choose food types</option>
                    <option value="Meat">Meat</option>
                    <option value="Fish">Fish</option>
                    <option value="Vegetable">Vegetable</option>
                    <option value="Fruit">Fruit</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">add_location</i>
                  <input type="number" name="add_amount" min="1" class="validate"/>
                  <label for="quantity">Amount</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">skip_next</i>
                  <input type="number" name="price_per" min="1" class="validate"/>
                  <label for="quantity">PricePerAmount</label>
                </div>
              </div>
              <div class="row center">
                <button class="btn btn-large waves-effect waves-light cyan darken-1 submit-margin-top" type="submit" name="submit">Submit
                <i class="material-icons right">send</i>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div id="food_list" class="col s12">
          <div class="section">
            <div class="row">
              <nav class="search-bar">
                <div class="nav-wrapper">
                <form>
                  <div class="input-field">
                    <input id="search" type="search" class="light-table-filter" data-table="order-table" placeholder="Search Food..">
                    <label for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                  </div>
                  </form>
                </div>
              </nav>
            </div>
            <table class="responsive-table highlight bordered order-table">
              <thead><tr>
                <th>FoodID</th>
                <th>Food name</th>
                <th>Type</th>
                <th>Amount</th>
                <th>PricePerAmount</th>
                <th>Order</th>
                <th>EXPORT FOOD</th>
                <th>DELETE</th>
              </tr></thead>
              <tbody id="ReserveTable">
                <?php include 'searchStock.php' ?>
              </table>
              <div class="row center">
              <ul class="pagination" id="ReservePager"></ul>
            </div>
            </div><!-- section -->
          </div>
          </div>  <!-- containner-->
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
        
        $('select').material_select();
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

     <script>
        //<![CDATA[
        $(document).ready(function(){ // makes sure the whole site is loaded
        $('#preloader').delay(100).fadeOut(); // will first fade out the loading animation
        $('#white_bg').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(100).css({
        'overflow': 'visible'
        });
      });
        //]]>
        </script>
  </body>
  			<div id="white_bg">
              <div id ="preloader" class="row center">
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
              </div>
          </div>
</html>