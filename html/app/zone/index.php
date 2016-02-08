<!DOCTYPE html>

<?php
require_once ('/var/www/html/app/library/function.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
	header('Location: ../login.php');
	exit();
}
require_once ('controller.php');
if (isset($_POST['addZoneSubmit']) && (!empty($_POST['zoneNameValueForAddZone'])) ) { //zoneTypeValueForAddZone 
	addZone();
}
if (isset($_POST['addZoneTypeSubmit']) && (!empty($_POST['zoneTypeNameValueForAddZoneType'])) ) {
	addZoneType();
}
if (isset($_POST['addBuildingSubmit']) && (!empty($_POST['buildingNameValueForAddBuilding'])) ) { //zoneValueForAddBuilding
	addBuilding();
}
if (isset($_POST['addCageSubmit']) && (!empty($_POST['cageNameValueForAddCage']))) { // cageTypeValueForAddCage , buildingValueforAddCage , cageKeeperValueForAddCage
	addCage();
}
if (isset($_POST['addCageTypeSubmit']) && (!empty($_POST['cageTypeNameValueForAddCageType'])) ) {
	addCageType();
}
if (isset($_POST['addToySubmit'])) { // toyTypeValueForAddToy , cageValueForAddToy
	addToy();
}
if (isset($_POST['addToyTypeSubmit']) && (!empty($_POST['toyTypeNameValueForAddToyType'])) ) {
	addToyType();
}
if (isset($_POST['animalInSubmit'])) { // animalValueForAnimalIn , cageValueForAnimalIn
	animalIn();
}
?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zone</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		h1 {
			margin: 1em 0 0.5em 0;
			color: white;
			font-weight: normal;	
			font-family: 'Ultra', sans-serif;   
			font-size: 36px;
			line-height: 42px;
			text-transform: uppercase;
			text-shadow: 0 2px blue, 0 6px #777;
		}
		body { overflow: hidden; }
	</style>
</head>

<body background="http://i.imgur.com/ZOoVTN5.png">
	<div class="container">

		<h1><span class='glyphicon glyphicon-edit'></span>  <b>ZONE EDITOR</b></h1>

		<!-- TRIGGER BUTTON -->
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#zone">Zone</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#zoneType">Zone Type</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#building">Building</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#cage">Cage</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#cageType">Cage Type</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#toy">Toy</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#toyType">Toy Type</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#animalIn">Animal In</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#animalOut">Animal Out</button>

		<!-- ZONE -->
		<div class="modal fade bs-example-modal-lg" id="zone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Zone</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table1" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table1">
							<thead>
								<tr>
									<th>Zone ID</th>
									<th>Zone Type</th>
									<th>Zone Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showZoneTable.php'; ?>
							</tbody>
							<div class="row">
								<tr>
									<form method="post" name="zoneSubmitForm">
										<td><b>Add Zone</b></td>
										<td>
											<select class='form-control' name='zoneTypeValueForAddZone'>
												<?php include 'zoneTypeForAddZone.php'; ?>
											</select>
										</td>
										<td><input type="text" class="form-control" name="zoneNameValueForAddZone" required></td>
										<td>&nbsp;</td>
										<td><button type="submit" name="addZoneSubmit" class="btn btn-info">Add</button></td>
									</form>
								</tr>
							</div>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- ZONE TYPE -->
		<div class="modal fade" id="zoneType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Zone Type</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table2" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table2">
							<thead>
								<tr>
									<th>Zone Type ID</th>
									<th>Zone Type Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showZoneTypeTable.php'; ?>
							</tbody>
							<div class="row">
								<tr>
									<form method="post" name="zoneTypeSubmitForm">
										<td><b>Add Zone Type</b></td>
										<td><input type="text" class="form-control" name="zoneTypeNameValueForAddZoneType" required></td>
										<td>&nbsp;</td>
										<td><button type="submit" name="addZoneTypeSubmit" class="btn btn-info">Add</button></td>
									</form>
								</tr>
							</div>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- BUILDING -->
		<div class="modal fade bs-example-modal-lg" id="building" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Building</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table3" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table3">
							<thead>
								<tr>
									<th>Bulding ID</th>
									<th>Bulding Name</th>
									<th>Zone</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showBuildingTable.php'; ?>
							</tbody>
							<div class="row">
								<tr>
									<form method="post" name="zoneSubmitForm">
										<td><b>Add Building</b></td>
										<td><input type="text" class="form-control" name="buildingNameValueForAddBuilding" required></td>
										<td>
											<select class="form-control" name="zoneValueForAddBuilding">
												<?php include 'zoneForAddBuilding.php'; ?>
											</select>
										</td>
										<td>&nbsp;</td>
										<td><button type="submit" name="addBuildingSubmit" class="btn btn-info">Add</button></td>
									</form>
								</tr>
							</div>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- CAGE -->
		<div class="modal fade bs-example-modal-lg" id="cage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Cage</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table4" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table4">
							<thead>
								<tr>
									<th>Cage ID</th>
									<th>Cage Name</th>
									<th>Cage Type</th>
									<th>Building</th>
									<th>Cage Keeper</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showCageTable.php'; ?>
							</tbody>
							<div class="row">
								<tr>
									<form method="post" name="cageSubmitForm">
										<td><b>Add Cage</b></td>
										<td><input type="text" class="form-control" name="cageNameValueForAddCage" required></td>
										<td>
											<select class="form-control" name="cageTypeValueForAddCage">
												<?php include 'cageTypeForAddCage.php'; ?>
											</select>
										</td>
										<td>
											<select class="form-control" name="buildingValueforAddCage">
												<?php include 'buildingForAddCage.php'; ?>\
											</select>
										</td>
										<td>
											<select class="form-control" name="cageKeeperValueForAddCage">
												<?php include 'cageKeeperForAddCage.php'; ?>
											</select>
										</td>
										<td>&nbsp;</td>
										<td><button type="submit" name="addCageSubmit" class="btn btn-info">Add</button></td>
									</form>
								</tr>
							</div>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- CAGE TYPE -->
		<div class="modal fade" id="cageType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Cage Type</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table5" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table5">
							<thead>
								<tr>
									<th>Cage Type ID</th>
									<th>Cage Type Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showCageTypeTable.php'; ?>
							</tbody>
							<div class="row">
								<tr>
									<form method="post" name="cageTypeSubmitForm">
										<td><b>Add Cage Type</b></td>
										<td><input type="text" class="form-control" name="cageTypeNameValueForAddCageType" required></td>
										<td>&nbsp;</td>
										<td><button type="submit" name="addCageTypeSubmit" class="btn btn-info">Add</button></td>
									</form>
								</tr>
							</div>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- TOY -->
		<div class="modal fade bs-example-modal-lg" id="toy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Toy</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table6" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table6">
							<thead>
								<tr>
									<th>Toy ID</th>
									<th>Toy Type</th>
									<th>Cage Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showToyTable.php'; ?>
							</tbody>
							<div class="row">
								<tr>
									<form method="post" name="toySubmitForm">
										<td><b>Add Toy</b></td>
										<td>
											<select class="form-control" name="toyTypeValueForAddToy">
												<?php include 'toyTypeForAddToy.php'; ?>
											</select>
										</td>
										<td>
											<select class="form-control" name="cageValueForAddToy">
												<?php include 'cageForAddToy.php'; ?>
											</select>
										</td>
										<td>&nbsp;</td>
										<td><button type="submit" name="addToySubmit" class="btn btn-info">Add</button></td>
									</form>
								</tr>
							</div>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- TOY TYPE -->
		<div class="modal fade" id="toyType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Toy Type</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table7" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table7">
							<thead>
								<tr>
									<th>Toy Type ID</th>
									<th>Toy Type Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showToyTypeTable.php'; ?> 
							</tbody>
							<div class="row">
								<tr>
									<form method="post" name="toyTypeSubmitForm">
										<td><b>Add Toy Type</b></td>
										<td><input type="text" class="form-control" name="toyTypeNameValueForAddToyType" required></td>
										<td>&nbsp;</td>
										<td><button type="submit" name="addToyTypeSubmit" class="btn btn-info">Add</button></td>
									</form>
								</tr>
							</div>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- ANIMAL IN -->
		<div class="modal fade bs-example-modal-lg" id="animalIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Animal In</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table8" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table8">
							<thead>
								<tr>
									<th>Animal In ID</th>
									<th>Animal Name</th>
									<th>Cage Name</th>
									<th>Time</th>
									<th>Take Out</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showAnimalInTable.php'; ?>
							</tbody>
							<div class="row">
								<tr>
									<form method="post" name="animalInSubmitForm">
										<td><b>Take Animal In</b></td>
										<td>
											<select class="form-control" name="animalValueForAnimalIn">
												<?php include 'animalForAnimalIn.php'; ?>
											</select>
										</td>
										<td>
											<select class="form-control" name="cageValueForAnimalIn">
												<?php include 'cageForAnimalIn.php'; ?>
											</select>
										</td>
										<td>&nbsp;</td>
										<td><button type="submit" name="animalInSubmit" class="btn btn-info">Add</button></td>
									</form>
								</tr>
							</div>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- ANIMAL OUT -->
		<div class="modal fade" id="animalOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center"><b>Animal Out</b></h2>
								<div class="input-group">
									<input type="text" class="form-control light-table-filter" data-table="order-table9" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped order-table9">
							<thead>
								<tr>
									<th>Animal In ID</th>
									<th>Animal Name</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php include 'showAnimalOutTable.php'; ?>
							</tbody>
						</table>
						<div class="text-center">
							<ul class="pagination" id="myPager"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Description Table -->
		<br><br>
		<div class="well">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Functions Available</th>
						<th>View</th>
						<th>Add</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tr>
					<td><b>Zone</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
				</tr>
				<tr>
					<td><b>Zone Type</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
				</tr>
				<tr>
					<td><b>Building</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
				</tr>
				<tr>
					<td><b>Cage</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
				</tr>
				<tr>
					<td><b>Cage Type</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
				</tr>
				<tr>
					<td><b>Toy</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><span class='glyphicon glyphicon-minus'></span></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
				</tr>
				<tr>
					<td><b>Toy Type</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
				</tr>
				<tr>
					<td><b>Animal In</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><span class='glyphicon glyphicon-minus'></span></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>

				</tr>
				<tr>
					<td><b>Animal Out</b></td>
					<td><font color="#b1ff33"><span class='glyphicon glyphicon-ok'></span></font></td>
					<td><span class='glyphicon glyphicon-minus'></span></td>
					<td><span class='glyphicon glyphicon-minus'></span></td>
					<td><span class='glyphicon glyphicon-minus'></span></td>
				</tr>
			</table>
			<div class="alert alert-danger" role="alert"><b><span class='glyphicon glyphicon-alert'></span> Warning !</b> Any bug found please report to Pingmpz.</div>
		</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/filter.js"></script>
		<script src="js/pagination.js"></script>
		<script> LightTableFilter.init() </script>

		<!-- callback model -->
		<div class="modal fade" tabindex="-1" role="dialog" data-target="#NotiModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Notificcation</h4>
					</div>
					<div class="modal-body">
						<p>Added to database successfully!!</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</body>
	</html>

	<?php
	db2_close($conn);
	?>