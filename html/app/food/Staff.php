<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/library/function.php');
require_once ('ordernewControl.php');

if (isset($_POST['logout'])) {
  $result = doLogout();
    if ($result != '') {
    $errorMessage = $result;
    echo $errorMessage;
  }
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
            <h2 class="header center black-text text-lighten-2">Staff List</h2>
            </div>
        </div>
      </div>
      <div class="container">
        <div class="section">
          <table class="responsive-table highlight bordered order-table">
              <thead><tr>
                <th>empID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Sex</th>
                <th>Phone</th>
              </tr></thead>
              <tbody id="empTable">
                  <?php include 'empList.php' ?>
              </tbody>
            </table>
            </div>
            <div class="row center">
            <ul class="pagination" id="empPager"></ul>
          </div>
        </div>
       </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="application/javascript"></script>
    <script src="js/materialize.js" type="application/javascript"></script>
    <script src="js/init.js" type="application/javascript"></script>
    <script src="js/filter.js" type="application/javascript"></script>
    <script src="js/pagination.js"></script>
    <script src="js/maskinput.js"></script>
    <script> LightTableFilter.init() </script>

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