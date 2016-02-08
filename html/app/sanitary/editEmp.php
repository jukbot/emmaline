<?php
require_once ('/var/www/html/app/model/connect.php');

function editEmployeeInfo() {
    if (isset($_POST)) {
        $empid   = $_POST['update_empid'];
        $jobid = $_POST['edit_jobid'];
        $firstname = $_POST['edit_firstname'];
        $lastname = $_POST['edit_lastname'];
        $birthdate = $_POST['edit_birthdate'];
        $sex = $_POST['edit_sex'];
        $nationality = $_POST['edit_nationality'];
        $hiredate = $_POST['edit_hiredate'];
        $address = $_POST['edit_address'];
        $email = $_POST['edit_email'];
        $phone = $_POST['edit_phone'];
        $salary = $_POST['edit_salary'];
        $bonus = $_POST['edit_bonus'];
    }

    $conn = dbConnect();
    if ($conn) {
   
        $sql = "UPDATE EMM_ZOO.EMPLOYEE SET EMPID = '$empid', JOBID = '$jobid', FIRSTNAME = '$firstname', LASTNAME = '$lastname', BIRTHDATE = '$birthdate', SEX = '$sex', NATIONALITY = '$nationality', HIREDATE = '$hiredate', ADDRESS = '$address', EMAIL = '$email', PHONE = '$phone' , SALARY = '$salary', BONUS = '$bonus' WHERE EMPID = $empid;";

        $result = db2_exec($conn, $sql);
        if ($result) {
             echo "<script>";
            echo "alert('Updated successfully')";
            echo "</script>";
             header('Location: sani_emp.php#emp_list');
            exit();
        } else {
            $resultMessage = 0;
            echo "<script>";
            echo "alert('Updated unsuccessfully')";
            echo "</script>";
            return $resultMessage;
        }
        db2_free_stmt($stmt);
        db2_close($conn);
    }
    else {
        echo db2_conn_errormsg();
    }
}
?>