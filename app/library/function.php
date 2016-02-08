<?php

require_once ('../app/model/connect.php');

function doLogin() {
	$errorMessage = '';
	$user = $_POST['name'];
	$pass = $_POST['password'];
	$pass_hash =  md5($pass);
  $conn = dbConnect();
  
   if($user == '') {
   	$errorMessage = 'Username cannot be blank.';
   } else if ($pass == '') {
   	$errorMessage = 'Password cannot be blank';
   } else if ($conn) {
   	$sql = "SELECT * FROM EMM_USER.AUTHENTICATE WHERE \"user_name\" = '$user' AND \"password\" = '$pass_hash';";
   	$stmt = dbQuery($conn,$sql);
       /* if($stmt == NULL) {
      echo 'Query result is null, you have problem with DB!!';
       }
       else {
         echo 'Query successfully';
       }
       */
      //echo "Username: " . $user . "<br>" ;
      //echo "Password: " . $pass_hash;
      //echo "DB NUMROW: " . dbNumRows($stmt);
   	if(dbNumRows($stmt) == 1) {
   		$row = dbFetchAssoc($stmt);
   		$_SESSION['current_user_name'] = $row['user_name'];
   		$sql = "UPDATE EMM_USER.AUTHENTICATE SET 'user_last_login' = current timestamp WHERE 'user_id' = '{$row['user_id']}'";
   		dbQuery($sql); 

      	if(isset($_SESSION['login_return_url'])) {
      		header('Location: '.$_SESSION['login_return_url']);
      		exit;
      	} else {
      		header('Location: index.php');
      		exit;
     		} 
        echo "COORECT";
   	} else {
      //echo "WRONG !!";
   		//$errorMessage = 'Wrong username or password';
     echo '<script>';
     echo 'alert("Wrong username or password, Please try again.")'; 
     echo '</script>';
   	}
   }
   dbClose();
   return $errorMessage;
}


function checkUser() {
	if(!isset($_SESSION['current_user_name'])) {
		header('Location:' . WEB_ROOT . 'app/login.php');
		exit;
	}
	if(isset($_GET['logout'])) {
		doLogout();
	}
}

function doLogout() {
	if(isset($_SESSION['user_name'])) {
		unset($_SESSION['user_name']);
	}
	header('Location: login.php');
	exit;
}




?>