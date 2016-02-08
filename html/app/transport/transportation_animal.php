<!DOCTYPE html>
<html>
<?php 
require_once ('../model/connect.php');
require_once ('TAnimal.php');

 if (isset($_POST['empID']) && (!empty($_POST['empID'])))  {
   Animal();
 // header("Refresh:0");
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

        <title>Transportation : Animal</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-frontpage.css" rel="stylesheet">
    </head>
    <body style="background-color:#F5DEB3">
        <div class="container">
            <div class="row">
                <center><h1 style="color:#CD853F"><br>ADD DETAIL TO BORROW THE CAR (FOR ANIMAL)</h1></center>
                <div class="col-lg-8 col-lg-offset-2" style="padding-top: 20px;padding-left: 60px; color:##CD853F">
                           
                    
                    
                     <!--empID-->      
                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="empID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F ;padding-left: 0px;">Your Employee ID</label>                  
                        <input type="text" class="form-control" name="empID" id="empID" placeholder="Enter Your Employee ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="carID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F;padding-left: 0px;">CAR ID</label>                  
                        <input type="text" class="form-control" name="carID" id="carID" placeholder="Enter Car ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                     <!--animalID-->      
                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="animalID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F;padding-left: 0px;">Animal ID</label>		          
                        <input type="text" class="form-control" name="animalID" id="animalID" placeholder="Enter Animal ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>
            
                     <!--Species of animal-->      
                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="species" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F ;padding-left: 0px;">Species of Animal </label>                  
                        
                        <input type="text" class="form-control" name="species" id="species" placeholder="Enter Species" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>


                     <!--approvalID-->      
                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="approvalID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F;padding-left: 0px;">Approval ID</label>                  
                        <input type="text" class="form-control" name="approvalID" id="approvalID" placeholder="Enter Approval ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                        <!--destination-->      
                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="destination" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F ;padding-left: 0px;">Destination</label>                  
                        <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter Destination" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

        <!--Start date-->      
                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="startDate" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F;padding-left: 0px;">Borrow Date</label>                  
                        <input type="date" class="form-control" name="start" id="start" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="endDate" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F;padding-left: 0px;">Return Date</label>                  
                        <input type="date" class="form-control" name="end" id="end" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>

                    
                     <!--animalExpertID-->      
                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="animalExpertID" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F ;padding-left: 0px;">Animal Expert ID</label>                  
                        <input type="text" class="form-control" name="animalExpertID" id="animalExpertID" placeholder="Enter Animal Expert ID" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>


                     <!--total-->      
                    <form  method="post" enctype="multipart/form-data">
                    <label for="text" id="total" class="col-sm-4 control-label" style="font-size: 14px;font-weight: bold;color:#CD853F;padding-left: 0px;">Total of Animal</label>                  
                        <input type="text" class="form-control" name="total" id="total" placeholder="Enter Total of Animal" style="border-radius: 4px;height: 30px;width: 600px;">
                        <p></p>
            <br>
            <a href="index.php" style:="" "padding-right:="" 70px" style="padding-right: 70px;"><button type="button" class="btn btn-default" style="width : 260px">Back</button></a>

            <style:="" "padding-right:="" 70px" style="padding-right: 70px;"><button type="submit" class="btn btn-default" style="width : 260px">Submit</button>
        </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>