<?php 
//require_once ('Edit.php');

//if (isset($_POST['submit'])) {
  // php();
  //header("Refresh:0");
//}
//?>
<?php
require_once ('EditShowExe.php');

if(isset($_POST['submit'])){
    editShow();
    header("Location:index.php");
}
?>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    
    


    
    <a name="about"></a>
    <div class="">
        <div class="container">
            
            <?php 
    
                if(isset($_GET['showID'])){
                    $showID = $_GET['showID'];
                        $showName = "";
                        $animalID = "";
                        $staffID = "";
                        $buildingID = "";
                        $seat = "";
                        $price = "";
                } else {
                    $showID = null;
                }
                
                $conn=dbConnect();

                if($conn) {

                    $sql="SELECT * FROM EMM_ZOO.SHOW, EMM_ZOO.SHOW_STAFF, EMM_ZOO.SHOW_ANIMAL"
                            . " WHERE EMM_ZOO.SHOW.SHOWID = EMM_ZOO.SHOW_ANIMAL.SHOWID"
                            . " AND EMM_ZOO.SHOW.SHOWID = EMM_ZOO.SHOW_STAFF.SHOWID"
                            . " AND EMM_ZOO.SHOW.SHOWID = $showID;";
                    $stmt=db2_prepare($conn, $sql);
                    $result=db2_execute($stmt);

                    while($row = db2_fetch_assoc($stmt)) {
                        $showName = $row['SHOWNAME'];
                        $animalID = $row['ANIMALID'];
                        $staffID = $row['EMPID'];
                        $buildingID = $row['BUILDINGID'];
                        $seat = $row['SEAT_AMOUNT'];
                        $price = $row['PRICE'];
                    }

                    db2_free_stmt($stmt);
                    db2_close($conn);

                } else {
                    echo db2_conn_errormsg($conn);
                }
            ?>

            
            <form class="form-horizontal" role="form" method="post" >
                                <div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">Show ID</label>
					<div class="col-sm-10">
                                            <input type="hidden" class="form-control" id="inputEmail3" name="showID" value="<?php echo $showID;?>">
                                            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $showID;?>" disabled>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">ShowName</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="showName" value="<?php echo $showName;?>" required>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputPassword3" class="col-sm-2 control-label">AnimalID</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword3" name="animalID" value="<?php echo $animalID;?>" required>
					</div>
				</div>

<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">StaffID</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="staffID" value="<?php echo $staffID;?>" required>
					</div>
				</div>

<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">BuildingID</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="buildingID" value="<?php echo $buildingID;?>" required>
					</div>
				</div>

<div class="form-group">
					 
					<label for="seat" class="col-sm-2 control-label">Seat Amount</label>
					<div class="col-sm-10">
                                            <input type="number" class="form-control" id="seat" name="seat" value="<?php echo $seat;?>" required>
					</div>
				</div>
                <div class="form-group">
					 
					<label for="price" class="col-sm-2 control-label">price</label>
					<div class="col-sm-10">
                                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $price;?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 
						<button name="submit" type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>

        </div>
        <!-- /.container -->
        <a href="index.php"><button>Back</button></a>

    </div>
    

    

	
    
    

    
    

    
    

	
    
    

    
    

    
    

    
    




</body></html>