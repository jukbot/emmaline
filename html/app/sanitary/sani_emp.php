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
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
						<li class="active">
							<a href="sani_emp.php">Employee List</a>
						</li>
						<li>
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
					List of Employees
					</h3>
                    
                    <div class="sani_emp_length" id="sani_emp_length"><label>Show <select name="sani_emp_length" aria-controls="sani_emp" class=""><option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                                
                    
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
								<th>Emp ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Sex</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'query/EmployeeList.php' ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<a href="addEmpHome.php">
						<button type="button" class="btn btn-lg btn-success">
						
						Add
						
						</button>
					</a>
				</div>
			</div>
		</div>
		<script src="js/filter.js" type="application/javascript"></script>
		<script> LightTableFilter.init() </script>
		<script src="js/init.js" type="application/javascript"></script>
		<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="application/javascript"></script>
		<script src="js/materialize.js" type="application/javascript"></script>
		<script>
		$(document).ready(function(){
		$('.modal-trigger').leanModal({ dismissible: true });
		});
		</script>
	</body>
</html>