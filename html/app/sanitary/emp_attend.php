<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>ABOUT SANITATION EMPLOYEE</title>
		<link rel="stylesheet" href="css/style_cn.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
    	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	<body>
		<div class="menu-bar" align="center">
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="sani_emp.php">EMPLOYEE</a></li>
				<li><a href="sani_equip.php">EQUIPMENTS</a></li>
				<li><a href="sani_garbage.php">GARBAGE COLLECTOR</a></li>
			</ul>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li>
							<a href="sani_emp.php">Employee List</a>
						</li>
						<li class="active">
							<a href="emp_attend.php">Employee Attendance</a>
						</li>
						<li>
							<a href="sani_schedule.php">WorkSchedule</a>
						</li>
						<li>
							<a href="sani_finance.php">Finance</a>
						</li>

					</ul>
					<h3>
					Employee Attendance
					</h3>
					<div class="row">
						<nav class="search-bar">
							<div class="nav-wrapper">
								<form>
									<div class="input-field">
										<input id="search" type="search" class="light-table-filter" data-table="order-table" placeholder="Search something.." required="">
										<label for="search" class="active"><i class="material-icons">search</i></label>
										<i class="material-icons">close</i>
									</div>
								</form>
							</div>
						</nav>
					</div>
					<table class="table order-table">
						<thead>
							<tr class="success">
								<th>Date</th>
								<th>Emp ID</th>
								<th>Duty Name</th>
								<th>Start Time</th>
								<th>End Time</th>
							</tr>
						</thead>
						<tbody id="query/EmployeeAttend.php">
							<?php include 'query/EmployeeAttend.php' ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<a href="addEmpAttHome.php">
						<button type="button" class="btn btn-lg btn-success">
						
						Add
						
						</button>
					</a>
				</div>
			</div>
		</div>
		<script src="js/filter.js" type="application/javascript"></script>
      <script> LightTableFilter.init() </script>
	</body>
</html>