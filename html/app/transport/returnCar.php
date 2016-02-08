<!DOCTYPE html>
<html>

<?php 
require_once ('../model/connect.php');
require_once ('returnController.php');
 if (isset($_POST['empID']) && (!empty($_POST['empID'])))  {
      carReturn();
  }


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

        <title>Return_Car</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-frontpage.css" rel="stylesheet">
    </head>
    <body style="background-color:#00CCCC">
        <div class="container">
            <div class="row">
                <center><h1 style="color:#006699"><br>RETURN CAR</h1></center>
                <div class="col-lg-8 col-lg-offset-2" style="padding-top: 20px;padding-left: 60px; color:#006699">


            <br><br>
            <form method="post" enctype="multipart/form-data">
                    <label for="text" id="empID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#006699 ;padding-left: 0px;">Your Employee ID</label>                  
                        <input type="text" class="form-control" name="empID" id="empID" placeholder="Enter Your Employee ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                    
                    <label for="text" id="carID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#006699;padding-left: 0px;">Car ID</label>                  
                        <input type="text" class="form-control" name="carID" id="carID" placeholder="Enter Car ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>
         
            <p></p>
            <br>
            <a href="index.php" style:="" "padding-right:="" 70px"="" style="padding-right: 70px;"><button type="button" class="btn btn-default" style="width : 260px">Back</button></a>
            <style:="" "padding-right:="" 70px"="" style="padding-right: 70px;"><button type="submit" class="btn btn-default" style="width : 260px">Submit</button></style:="">
                    

            
        </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>