<?php 
//require_once ('Edit.php');

//if (isset($_POST['submit'])) {
  // php();
  //header("Refresh:0");
//}
//?>
<?php
require_once ('/var/www/html/app/model/connect.php');
require_once ('addShow.php');

if(isset($_POST['submit'])){
    addShow();
    //header("Location:Add.php");
}
?>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit</title>

    
    <style type="text/css">
    .container .form-horizontal .form-group .col-sm-10 {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
    </style>

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
        <div class="container" align = 'center'>

            
            <form class="form-horizontal" role="form" method="post" >
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label" style="font-size: 16; font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace;"><strong>ShowName</strong></label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="showName" required>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputPassword3" class="col-sm-2 control-label" style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace"><strong>AnimalID</strong></label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword3" name="animalID" required>
					</div>
				</div>

<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label" style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-style: normal;"><strong>StaffID</strong></label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="staffID" required>
					</div>
				</div>

<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label" style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace"><strong>BuildingID</strong></label>
					<div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="buildingID" required>
					</div>
				</div>

<div class="form-group">
					 
					<label for="seat" class="col-sm-2 control-label" style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace"><strong>Seat Amount</strong></label>
					<div class="col-sm-10">
                                            <input type="number" class="form-control" id="seat" name="seat" required>
					</div>
				</div>
                <div class="form-group">
					 
					<label for="price" class="col-sm-2 control-label" style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace"><strong>price</strong></label>
					<div class="col-sm-10">
                                            <input type="number" class="form-control" id="price" name="price" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 
						<button name="submit" type="submit" class="btn btn-default" style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-size: 16px;"><strong>Submit</strong></button>
					</div>
				</div>
			</form>

        </div>
      <a href="index.php"><button style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; font-size: 14px;"><strong>Back</strong></button></a>
        <!-- /.container -->

    </div>
    

    

	
    
    

    
    

    
    

	
    
    

    
    

    
    

    
    




</body></html>