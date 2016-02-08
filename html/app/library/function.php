<?php

require_once ('/var/www/html/app/model/connect.php');

function doLogin() {
	$errorMessage = '';
	$user = $_POST['name'];
	$pass = $_POST['password'];
	$pass_hash =  md5($pass);
  $conn = dbConnect();
  $acc_type = $_POST['account'];
  
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
   		$sql = "UPDATE EMM_USER.AUTHENTICATE SET 'user_last_login' = current timestamp WHERE 'user_id' = '{$row['user_id']}'";
   		dbQuery($sql); 

      	if(isset($_SESSION['login_return_url'])) {
      		header('Location: '.$_SESSION['login_return_url']);
      		exit;
      	} else {
          $_SESSION['current_user_name'] = $row['user_name'];
          $form_token = uniqid();
          $_SESSION['form_token'] = $form_token;
          switch ($row['user_name']) {
    case "vchukkrit":
          header('Location: carpark/index.php');
          break;
    case "account":
          header('Location: account/index.php');
          break;
    case "admin":
          header('Location: index.php');
          break;
    default:
         header('Location: index.php');
         break;
}
         exit;
     		} 
   	} else {
   	$errorMessage = 'Wrong username or password';
     echo '<script>';
     echo 'alert("Wrong username or password, Please try again.")'; 
     echo '</script>';
      header('Location: ../app/login.php');
     exit;
   	}
   }
   dbClose();
   return $errorMessage;
}


function checkUser() {
	if(!isset($_SESSION['current_user_name'])) {
		header('Location: ../login.php');
		exit;
	}
	if(isset($_GET['logout'])) {
		doLogout();
	}
}

function doLogout() {
	if(isset($_SESSION['current_user_name'])) {
		unset($_SESSION['current_user_name']);
	}

   if(isset($_COOKIE[$cookie_name])) {
    unset($_COOKIE[$cookie_name]);
    setcookie($cookie_name, null,  time() - 3600);
} 
  header('Location: https://emmalinezoo.com/app/login.php');
	exit;
}

?>