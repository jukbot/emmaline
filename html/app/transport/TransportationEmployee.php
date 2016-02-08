<!DOCTYPE html>
<html>
<?php 
require_once ('../model/connect.php');
require_once ('t1.php');

if (isset($_POST['empID']) && (!empty($_POST['empID'])))  {
  Borrow();
 // header("Refresh:0");
}else
 
?>
    <head>
        <!-- Latest compiled and minified CSS -->
        <script src="jquery-2.1.4.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <link rel = "stylesheet" href="stlye1.css">

        <title>Transportation : Employee</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-frontpage.css" rel="stylesheet">
    </head>
    <body style="background-color:#FFA07A">
        <div class="container">
            <div class="row">
                <center><h1 style="color:#A0522D"><br>ADD DETAIL TO BORROW THE CAR (FOR PEOPLE)</h1></center>
                <div class="col-lg-8 col-lg-offset-2" style="padding-top: 20px;padding-left: 60px; color:#A0522D">


            <br><br>
            <form method="post" enctype="multipart/form-data" >
                    <label for="text" id="empID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#A0522D ;padding-left: 0px;">Your Employee ID</label>   

                        <input type="text" class="form-control" name="empID" id="empID" placeholder="Enter Your Employee ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>
            
            <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="empID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#A0522D;padding-left: 0px;">Car ID</label>                  
                        <input type="text" class="form-control" name="carID" id="carID" placeholder="Enter Car ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="startDate" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#A0522D;padding-left: 0px;">Start Date</label>                  
                        <input type="date" class="form-control" name="start" id="start" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="startDate" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#A0522D;padding-left: 0px;">Return Date</label>                  
                        <input type="date" class="form-control" name="end" id="end" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

           <br>             
            <a href="index.php" style:="" "padding-right:="" 70px" style="padding-right: 70px;"><button type="button" class="btn btn-default" style="width : 260px">Back</button></a>
            
            <style:="" "padding-right:="" 70px" style="padding-right: 70px;">
            <button type="submit" class="btn btn-default" style="width : 260px">Submit</button>



            
        </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>