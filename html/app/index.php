<!DOCTYPE html>
<?php
require_once (dirname(__FILE__).'/library/function.php');
$cookie_name = "user";
if(!(isset($_SESSION['current_user_name']) && $_SESSION['current_user_name'] != '') && !isset($_COOKIE[$cookie_name])) {
    header('Location: login.php');
    exit();
}
if (isset($_POST['submit'])) {
  $result = doLogout();
}
else {
$current_user_name = $_SESSION['current_user_name'];
setcookie($cookie_name , $current_user_name, time()+(84600));
}
?>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>EMM ADMIN</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="admin/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="admin/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<div id="index-banner" class="parallax-container header-small-img">
    <div class="section no-pad-bot space-top-small">
      <div class="container">
         <div class="row ">
        <h2 class="header center white-text text-lighten-2">ADMINISTRATOR CONSOLE</h2>
         </div>
      </div>
    </div>
    <div class="parallax"><img src="admin/img/lizard.jpg" alt="statistic_header"></div>
 </div>
 <div class="container">
    <div class="section">
    <div class="row center">
      <h4>Hi! <?php  require_once ('../app/library/function.php'); 
	echo $_SESSION['current_user_name']; ?>, You're now login into administrator console</h4>
  <h5><?php
require_once ('../app/library/function.php'); 
if(!isset($_COOKIE[$cookie_name])) {
      echo "Cookie named " . $cookie_name . " is not set! or expired";
} else {
      echo "Cookie " . $cookie_name . " is set to " . $current_user_name ."<br>";
      //echo "Value is: " . $_COOKIE[$cookie_name]."<br>";
      echo "Your session will expire in 24 hrs.";
} ?>
</h5>
      <div class="col s12 m4 center">
        <div class="card-panel white">
        <h5>Accounting</h5>
           <a class="box scale waves-effect waves-light" href="account/index.php"><i class="large material-icons">account_balance</i></a>
        </div>
      </div>
      <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Animal Management</h5>
           <a class="box scale waves-effect waves-light" href="animal/index.php"><i class="large material-icons">pets</i></a>
        </div>
      </div>
       <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Animal Health</h5>
           <a class="box scale waves-effect waves-light" href="health/index.php"><i class="large material-icons">local_hospital</i></a>
        </div>
      </div>
       <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Animal Research</h5>
           <a class="box scale waves-effect waves-light" href="research/index.php"><i class="large material-icons">search</i></a>
        </div>
      </div>
       <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Cafeteria</h5>
           <a class="box scale waves-effect waves-light" href="cafe/index.php"><i class="large material-icons">local_cafe</i></a>
        </div>
      </div>
            <div class="col s12 m4 center">
        <div class="card-panel white">
        <h5>Food Management</h5>
           <a class="box scale waves-effect waves-light" href="food/index.php"><i class="large material-icons">restaurant_menu</i></a>
        </div>
      </div>
        <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Parking System</h5>
           <a class="box scale waves-effect waves-light" href="carpark/index.php"><i class="large material-icons">local_parking</i></a>
        </div>
      </div>
         <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Human Resources</h5>
           <a class="box scale waves-effect waves-light" href="human/index.php"><i class="large material-icons">assignment_ind</i></a>
        </div>
      </div>
        <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Maintainance</h5>
           <a class="box scale waves-effect waves-light" href="maintain/index.php"><i class="large material-icons">build</i></a>
        </div>
      </div>
       <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Security</h5>
           <a class="box scale waves-effect waves-light" href="security/index.php"><i class="large material-icons">security</i></a>
        </div>
       </div>
         <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Sanitary Management</h5>
           <a class="box scale waves-effect waves-light" href="sanitary/index.php"><i class="large material-icons">delete</i></a>
        </div>
      </div>
        <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Ticket System</h5>
           <a class="box scale waves-effect waves-light" href="ticket/index.php"><i class="large material-icons">label</i></a>
        </div>
      </div>
      <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Transportation</h5>
           <a class="box scale waves-effect waves-light" href="transport/index.php"><i class="large material-icons">airport_shuttle</i></a>
        </div>
      </div>
       <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Zoo Zoning</h5>
           <a class="box scale waves-effect waves-light" href="zone/index.php"><i class="large material-icons">directions</i></a>
        </div>
      </div>
        <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Zoo Tour</h5>
           <a class="box scale waves-effect waves-light" href="tour/index.php"><i class="large material-icons">map</i></a>
        </div>
      </div>
         <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Zoo Shop</h5>
           <a class="box scale waves-effect waves-light" href="shop/index.php"><i class="large material-icons">store_mall_directory</i></a>
        </div>
      </div>
          <div class="col s12 m4 center">
         <div class="card-panel white">
         <h5>Zoo Show</h5>
           <a class="box scale waves-effect waves-light" href="show/index.php"><i class="large material-icons">local_play</i></a>
        </div>
      </div>
    </div>           
    </div>
<div class="row center">
<form name="frmLogout" id="frmLogout" method="post" accept-charset="utf-8">
<button class="btn btn-large waves-effect waves-light red darken-3" type="submit" name="submit">Logout</button>
</form>
</div>
</div>
 <footer class="page-footer lime darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About EMM Administrator Console</h5>
          <p class="grey-text text-lighten-4">This administrator console is connected to all Emmaline sections, which can access to any functions on system.</p>
        </div>
        <div class="col l6 s12">
          <h5 class="white-text">Internal Connections</h5>
          <ul>
            <li><a class="white-text" href="//emmalinezoo.com">Emmaline Home</a></li>
            <li><a class="white-text" href="//emmalinezoo.com/app/index.php">Admin Home</a></li>
            <li><a class="white-text" href="//emmalinezoo.com/project.html">Project</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Copyright 2015 Emmaline Group.
      </div>
    </div>
  </footer>
    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="application/javascript"></script>
  <script src="admin/js/materialize.min.js" type="application/javascript"></script>
  <script>$('.parallax').parallax();</script>
  <script src="admin/js/init.js" type="application/javascript"></script>
</body>
</html>
