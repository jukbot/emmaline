<!DOCTYPE html>
<html>

<?php 
require_once ('../model/connect.php');
require_once ('otherController.php');
 if (isset($_POST['type']) && (!empty($_POST['type'])))  {
      other();
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

        <title>Transportation : Borrow car from other place</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-frontpage.css" rel="stylesheet">
    </head>
    <body style="background-color:#FFC0CB">
        <div class="container">
            <div class="row">
                <center><h1 style="color:#F08080"><br>ADD DETAIL TO BORROW THE CAR FROM OTHER PLACE</h1></center>
                <div class="col-lg-8 col-lg-offset-2" style="padding-top: 20px;padding-left: 60px; color:#F08080">

            <form method="post" enctype="multipart/form-data">
                    <label  id="empID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#F08080 ;padding-left: 0px;">Your Employee ID</label>   

                        <input type="text" class="form-control" name="empID" id="wtf" placeholder="Enter Your Employee ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        
                        <p></p>

                        <label  id="abc" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#F08080 ;padding-left: 0px;">License Plate</label>   

                        <input type="text" class="form-control" name="license" id="wtf" placeholder="Enter Car's License Plate" style="border-radius: 4px;height: 30px;width: 600px;">
                        
                        <p></p>
            <label  class="col 1 control-label" style="font-size: 14px;font-weight: bold;padding-left: 0px; color:#F08080 ;">Type of Vehicle</label> 
                        
                    <select name="type" class="form-control" rows="3" style="width : 250px">
                       <option value="Plant">Plant</option>
                       <option value="Train">Train</option>
                       <option value="Boat">Boat</option>
                       <option value="Tunk">Tunk</option>
                       <option value="Van">Van</option>
                       <option value="Bus">Bus</option>
                       <option value="Car">Car</option>
                     </select>
                     <p></p>


                    
                    <label  id="startDate" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#F08080;padding-left: 0px;">Start Date</label>                  
                        <input type="date" class="form-control" name="start"  style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                    
                    <label  id="startDate" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#F08080;padding-left: 0px;">Return Date</label>                  
                        <input type="date" class="form-control" name="end"  style="border-radius: 4px;height: 30px;width: 600px;">
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