<?php
require_once ('/var/www/html/app/model/connect.php');

function addleave(){
			if (isset($_POST)) {
                $leid = $_POST['leid'];
				$leaveid = $_POST['leaveid'];
                $empid = $_POST['empid'];
				$std = $_POST['std'];
                $end = $_POST['end'];
			   $data = array($leid, $leaveid, $empid ,$std, $end);
                
			}

			$conn = dbConnect();

			if ($conn) {
			$sql = 'INSERT INTO EMM_ZOO.LEAVEEMP (LEAVEID, LEAVETYPEID, EMPID, STARTDATE, ENDDATE) VALUES (?,?,?,?,?);';

			$stmt = db2_prepare($conn, $sql);
			if ($stmt) {
			    $result = db2_execute($stmt, $data);
			    if ($result) {
			        $resultMessage = "Successful responsibility";
			    }
			    else {
			    	  $resultMessage = "Failed to query into database";
			    }
			}
			else {
				 die('Critical error:' . db2_stmt_error($stmt));
			}
			db2_free_stmt($stmt);
            db2_close($conn);
			}
			else {
			   echo db2_conn_errormsg($conn);
			}
}

function addemp(){
			if (isset($_POST)) {
                $id = $_POST['id'];
                $fn = $_POST['fn'];
				$ln = $_POST['ln'];
                $add = $_POST['add'];
				$bdate = $_POST['bdate'];
                $sex = $_POST['sex'];
                $nat = $_POST['nat'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $hdate = $_POST['hdate'];
                $salary = $_POST['salary'];
                $bonus = $_POST['bonus'];
                $jobid = $_POST['jobid'];
			   $data = array($id, $jobid ,$fn, $ln, $bdate, $sex, $nat, $hdate, $add, $email, $phone, $salary, $bonus);
                
			}

			$conn = dbConnect();

			if ($conn) {
			$sql = 'INSERT INTO EMM_ZOO.EMPLOYEE(EMPID, JOBID, FIRSTNAME, LASTNAME, BIRTHDATE, SEX, NATIONALITY, HIREDATE, ADDRESS, EMAIL, PHONE, SALARY, BONUS) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);';

			$stmt = db2_prepare($conn, $sql);
			if ($stmt) {
			    $result = db2_execute($stmt, $data);
			    if ($result) {
			        $resultMessage = "Successful responsibility";
			    }
			    else {
			    	  $resultMessage = "Failed to query into database";
			    }
			}
			else {
				 die('Critical error:' . db2_stmt_error($stmt));
			}
			db2_free_stmt($stmt);
            db2_close($conn);
			}
			else {
			   echo db2_conn_errormsg($conn);
			}

}

function delleave(){
    if (isset($_post)) {
        $id   = $_post['lea'];
    }

    $conn = dbConnect();
    if ($conn) {
   
        $sql = "DELETE FROM EMM_ZOO.LEAVEEMP". "WHERE LEAVEID = $id;";
           $result = $db->query($query);


// Check for errors
if (!$result) {
  
  echo "Deleting record failed: (" . $db->errno . ") " . $db->error;

} else {

// Print the table
  print "\n\nAfter DELETE command: \n";
  print_table($db, 'mytable');

}
    db2_close($conn);
    }
    else {
        echo db2_conn_errormsg();
    }
    
    
}

?>