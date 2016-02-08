<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SANITATION EQUIPMENTS</title>
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
					
					<h3>
					Check Equipments use log
					</h3>
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
									
									<li>
										<a href="sani_equip.php">Check Equipment Stock</a>
									</li>
									<li class="active">
										<a href="equipUselog.php">Uselog History</a>
									</li>
									
									
								</ul>
								
								<div class="row">
									<nav class="search-bar">
										<div class="nav-wrapper">
											<form>
												<div class="input-field">
													<input id="search" type="search" class="light-table-filter" data-table="order-table" placeholder="Search equipment use.." required="">
													<label for="search" class="active"><i class="material-icons">search</i></label>
													<i class="material-icons">close</i>
												</div>
											</form>
										</div>
									</nav>
								</div>
								
							</nav>
							<table class="table">
								<thead>
									<tr>
										<th>Equipment ID</th>
										<th>Equipment Name</th>
										<th>Employee ID</th>
										<th>WorkzoneID</th>
										<th>BorrowDate</th>
										<th>ReturnDate</th>
									</tr>
								</thead>
								<tbody>
									<?php include 'query/EquipmentUseLog.php' ?>
								</tbody>
								
							</table>
                            
                            <div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<a href="addUselogHome.php">
						<button type="button" class="btn btn-lg btn-success">
						
						Add
						
						</button>
					</a>
				</div>
			</div>
		</div>
                            
						</div>
					</div>
				</div>
			</body>
		</html>