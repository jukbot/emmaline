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
			<img  HEIGHT="600" WIDTH="1450" src="img/bg3.jpg" alt="" />

		</div>



		<div class="container">
			<div class="input-group" style="z-index: 0;" >
				<input type="text" class="form-control light-table-filter" data-table="order-table" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
				</span>
			</div>


			<!-- guardlist Section -->

			<div class="modal-body">

				<table class="table table-striped order-table">
					<thead>
						<tr>
							<th>EMPLOYEE ID</th>
							<th>GUARD ID</th>
							<th>FIRST NAME</th>
							<th>LAST NAME</th>
							<th>BIRTH DATE</th>
							<th>SEX</th>
							<th>HIRE DATE</th>
							<th>ADDRESS</th>
							<th>EMAIL</th>

							<th>PHONE</th>
							<th>SALARY</th>


						</tr>

					</thead>
					<tbody id="myTable">


						<?php 
						require_once ('/var/www/html/app/model/connect.php');

						$sql = "SELECT * FROM EMM_ZOO.EMPLOYEE INNER JOIN EMM_ZOO.GUARD ON (EMM_ZOO.EMPLOYEE.EMPID = EMM_ZOO.GUARD.GUARDID) ORDER BY GUARDID;";
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
								while ($row = db2_fetch_assoc($stmt)) {
									print "<tr><td>" . $row['GUARDID']. 
									"</td><td>" . $row['EMPID'].
									"</td><td>" . $row['FIRSTNAME'].
									"</td><td>" . $row['LASTNAME'].
									"</td><td>" . $row['BIRTHDATE'].
									"</td><td>" . $row['SEX'].
									"</td><td>" . $row['HIREDATE'].
									"</td><td>" . $row['ADDRESS'].
									"</td><td>" . $row['EMAIL'].
									"</td><td>" . $row['PHONE'].
									"</td><td>" . $row['SALARY'].
									"</td>";

									print "<form action='deleteGuard.php' method='post'>";
									print "<td><input type='hidden' name='deleteGuard' value='".$row['GUARDID']."'>";
									print "<button type='submit' name='deleteGuardSubmit' class='btn btn-default btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>";

									print "</form></tr>";



								}
							}
							db2_free_stmt($stmt);
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
                
                
                <h1>NUMBER OF GUARD : 
                
                <?php 
						require_once ('/var/www/html/app/model/connect.php');

						$sql = "
SELECT COUNT(*) as NUMBEROFGUARD FROM EMM_ZOO.EMPLOYEE JOIN EMM_ZOO.GUARD ON EMM_ZOO.EMPLOYEE.EMPID = EMM_ZOO.GUARD.GUARDID;";
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
								while ($row = db2_fetch_assoc($stmt)) {
									print $row['NUMBEROFGUARD'];
}
							}
							db2_free_stmt($stmt);
						} 
						else {
							echo db2_conn_errormsg($conn);
						}
						?>
                </h1>
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
								<form name="sentMessage" action="addGuard.php" method="post" id="contactForm" >
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												EmployeeID :
												<?php
												if ($conn) {
													$sql = "SELECT EMPID, FIRSTNAME, LASTNAME FROM EMM_ZOO.EMPLOYEE;";
													$stmt = dbQuery($conn,$sql);
													if($stmt == FALSE) {
														die('Critical error: '. db2_stmt_error($stmt));
													}
													echo("<select name='empId' style='border:2px solid #FFA54F;text-align:center;'>\n");
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
												<br><br> Guard ID :
												<input type="text"  placeholder="GUARD ID *" name="guardId" style='border:2px solid #FFA54F;'>
											</div>
										</div>
										<div class="clearfix"></div>
										<div id="success"></div>
										<div class="col-md-6">
											<button type="submit" class="btn btn-xl">SAVE</button>
											<button type="close" class="btn btn-xl">CLOSE</button>
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
