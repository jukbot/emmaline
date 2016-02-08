<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/library/function.php');
?>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>EMM SECURITY</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/agency.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="search.css">


	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->




        <script type="text/javascript">
        	<!--
        	function toggle_visibility(id) {
        		var e = document.getElementById(id);
        		if(e.style.display == 'block')
        			e.style.display = 'none';
        		else
        			e.style.display = 'block';
        	}
			//-->
		</script>

		<style type="text/css">

			#popupBoxOnePosition{
				top: 0; left: 0; position: fixed; width: 100%; height: 120%;
				background-color: rgba(0,0,0,0.7); display: none;
			}
			#popupBoxTwoPosition{
				top: 0; left: 0; position: fixed; width: 100%; height: 120%;
				background-color: rgba(0,0,0,0.7); display: none;
			}#popupBoxThreePosition{
				top: 0; left: 0; position: fixed; width: 100%; height: 120%;
				background-color: rgba(0,0,0,0.7); display: none;
			}
			.popupBoxWrapper{
				width: 550px; margin: 50px auto; text-align: left;
			}
			.popupBoxContent{
				background-color: #FFF; padding: 15px;
			}

		</style>


	</head>

	<body id="page-top" class="index">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="index.php#page-top">EMM SECURITY</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="https://emmalinezoo.com/app/">Home</a>
						</li>
						<li>
							<a class="page-scroll" href="index.php#guard">Guard</a>
						</li>
						<li>
							<a class="page-scroll" href="index.php#offending">Offending</a>
						</li>

					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<!-- / connect with php -->
		<!-- / connect with php -->

		<div id="container">
			<img  HEIGHT="600" WIDTH="1450" src="img/bg8.jpeg" alt="" />

		</div>



		<div class="container">
			<div class="input-group" style="z-index: 0;" >
				<input type="text" class="form-control light-table-filter" data-table="order-table" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
				</span>
			</div>


<!-- offenderlist Section -->

	<div class="container">
<div class="modal-body">
              <table class="table table-striped order-table">
                <thead>
                  <tr>
                    <th>CITIZEN ID</th>
                    <th>FIRST NAME</th>
		            <th>LAST NAME</th>
                    <th>SEX</th>
                    <th>NATIONALITY</th>
                    <th>BIRTH DATE</th>
                    <th>PHONE</th>
                    <th>ALLEG ID</th>
                    <th>ALLEGATION</th>
                    <th>GUARD ID</th>
                    <th>ZONE</th>
                    <th>DATE</th>
                    <th>FIND PRICE</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                    
                    
                    
                    
                    <?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.OFFENDERALLEG INNER JOIN EMM_ZOO.ALLEGETION ON (EMM_ZOO.OFFENDERALLEG.ALLEGID = EMM_ZOO.ALLEGETION.ALLEGID) 
    JOIN EMM_ZOO.OFFENDER ON (EMM_ZOO.OFFENDER.CITIZENID = EMM_ZOO.OFFENDERALLEG.CITIZENID); ORDER BY CITIZENID;";
if ($conn) {
	$stmt = db2_exec($conn, $sql);
	if($stmt) {
		while ($row = db2_fetch_assoc($stmt)) {
			print "<tr><td>" . $row['CITIZENID'].
            "</td><td>" . $row['FIRSTNAME'].
            "</td><td>" . $row['LASTNAME'].
            "</td><td>" . $row['SEX'].
            "</td><td>" . $row['NATIONALITY'].
            "</td><td>" . $row['DATEOFBIRTH'].
            "</td><td>" . $row['PHONE'].
            "</td><td>" . $row['ALLEGID']. 
            "</td><td>" . $row['NAMEOFALLEG'].
            "</td><td>" . $row['GUARDID']. 
            "</td><td>" . $row['ZONEID']. 
            "</td><td>" . $row['DATES']. 
            "</td><td>" . $row['FINDPRICE'].
            "</td>";
			
            
            
            
            print "<form action='deleteOffender.php' method='post'>";
									print "<td><input type='hidden' name='deleteOffender' value='".$row['CITIZENID']."'>";
									print "<button type='submit' name='deleteOffenderSubmit' class='btn btn-default btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>";

									print "</form></tr>";
		}
         db2_free_stmt($stmt);
	}
} 
else {
	echo db2_conn_errormsg($conn);
}
?>
                    
                    
					</tbody>
				</table>

				<div align="right" >
					<a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');"><button class='btn btn-default btn-lg' ><h3>ADD DATA</h3><span class='glyphicon glyphicon-plus'> </span></button></a>


				</div>  
			</div>
		</div>



		<div id="popupBoxOnePosition">
			<div class="popupBoxWrapper">
				<div class="popupBoxContent">
					<div class="container">

						<div class="row">

							<div class="col-md-6 center">
								<h2 class="section-heading">ADD DATA</h2>

							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<form name="sentMessage" action="addOffender.php" method="post" id="contactForm" >
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												CITIZEN ID :
												<?php
												if ($conn) {
													$sql = "SELECT CITIZENID,ALLEGID FROM EMM_ZOO.OFFENDERALLEG;";
													$stmt = dbQuery($conn,$sql);
													if($stmt == FALSE) {
														die('Critical error: '. db2_stmt_error($stmt));
													}
													echo("<select name='citizenId' style='border:2px solid #FFA54F;text-align:center;'>\n");
													while ($row = dbFetchArray($conn,$stmt)) {
														echo "\t
														<option value='$row[0]'>$row[0] - $row[1] $row[2]</option>
														\n";
													}
													echo "</select>\n";
													db2_free_stmt($stmt);
												} else {
													echo "Connection failed" .db2_conn_errormsg($conn);
												}
												?>
                                                
												<br><br> FIRST NAME :
												<input type="text"  placeholder="FIRST NAME *" name="firstname" style='border:2px solid #FFA54F;'>												<br><br> LAST NAME :
												<input type="text"  placeholder="LAST NAME *" name="lastname" style='border:2px solid #FFA54F;'>												<br><br> SEX :
												<input type="text"  placeholder="SEX *" name="sex" style='border:2px solid #FFA54F;'>												           <br><br> NATIONALITY :
												<input type="text"  placeholder="NATIONALITY *" name="nationality" style='border:2px solid #FFA54F;'>									<br><br> BIRTH DATE :
												<input type="text"  placeholder="BIRTH DATE *" name="dateOfBirth" style='border:2px solid #FFA54F;'>												<br><br> PHONE :
												<input type="text"  placeholder="PHONE *" name="phone" style='border:2px solid #FFA54F;'>												<br><br> PIC :
												<input type="text"  placeholder="PIC *" name="pic" style='border:2px solid #FFA54F;'>												
											</div>
										</div>
										<div class="clearfix"></div>
										<div id="success"></div>
										<div class="col-md-6">
											<button type="submit" class="btn btn-xl">SAVE</button>
                                            <button type="submit" class="btn btn-xl">CLOSE</button>
                                            
											<!--<button onclick="self.close();">Close Me</button>-->
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>		
				</div>
			</div>
		</div>










		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<span class="copyright">Copyright &copy; Emmaline Group 2015</span>
					</div>
				</div>
			</div>
		</footer>


		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/cbpAnimatedHeader.js"></script>

		<!-- Contact Form JavaScript -->
		<script src="js/jqBootstrapValidation.js"></script>
		<script src="js/contact_me.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="js/agency.js"></script>

		<!-- Filter search JavaScript -->
		<script src="js/filter.js" type="application/javascript"></script>
		<!-- Call search JavaScript -->
		<script> LightTableFilter.init() </script>
	</body>
	</html>















