<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/library/function.php');

if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
    header('Location: ../login.php');
    exit();
}else{
  $current_user_name = $_SESSION['current_user_name'];
  if ($current_user_name != '5678'){
    header('Location: ../index.php');
    exit();
  }
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

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title>Emmaline Food Management</title>
	<!-- CSS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	
</head>
<body>
	<nav class="white" role="navigation">
    <div class="nav-wrapper container">
    	<ul class="right hide-on-med-and-down">
        <li class=" waves-effect waves-light"><a href="index.php">Menu</a></li>
        <li><form method="post" name="logout"><button class="btn-flat" type="submit" name="submit">Logout</button></form></li>    
      </ul>

      <ul id="nav-mobile" class="side-nav">
      	<li class=" waves-effect waves-light"><a href="index.php">Menu</a></li>
        	<li><form method="post" name="logout"><button class="btn-flat" type="submit" name="submit">Logout</button></form></li>    
      </ul>
    </nav>
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons large-icon">list</i></h2>
            <h5 class="center">Food Stock</h5>
          <div class="row center">
            <a href="FoodStock.php" id="download-button" class="btn-large waves-effect waves-light lime darken-1">Food Stock</a>
          </div>
            <p class="center pink-text light">Stock of food in the zoo.</p>
        </div>
      </div>

      <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons large-icon">contacts</i></h2>
            <h5 class="center">STAFF LIST</h5>
          <div class="row center">
            <a href="Staff.php" id="download-button" class="btn-large waves-effect waves-light lime darken-1">Staff List</a>
          </div>
            <p class="center pink-text light">List of staff in food management</p>
        </div>
      </div>

            
    </div>
    
</body>
</html>