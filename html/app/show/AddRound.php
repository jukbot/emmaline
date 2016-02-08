<?php 
//require_once ('Edit.php');

//if (isset($_POST['submit'])) {
  // php();
  //header("Refresh:0");
//}
//?>
<?php
require_once ('addRoundExe.php');

if(isset($_POST['submit'])){
    addRound();
    header("Location:AddRound.php");
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

            
            <form class="form-horizontal" role="form" method="post" >
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">ShowID</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="showID" required>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputPassword3" class="col-sm-2 control-label">RoundID</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword3" name="roundID" required>
					</div>
				</div>

<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">Start Time</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="HH:MM:SS" name="starttime" required>
					</div>
				</div>

<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">End Time</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="HH:MM:SS" name="endtime" placeholder="HH:MM:SS" required>
					</div>
				</div>
                <div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">Date</label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="YYYY-MM-DD" name="showdate" required>
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