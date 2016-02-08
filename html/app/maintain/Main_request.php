<?php 
require_once ('../model/connect.php');
?>

<!DOCTYPE html>
<html>
    <head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="js/bootstrap.min.js"></script>
        
        <title>Zoo Maintainance</title>
    </head>
	 <body>
	 	<div class="page-header">
            <h1 style="text-align:center;">Zoo Maintainance Team</h1>
            <h4 style="text-align:center;">Your problem is in our care</h4>
        </div>
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <a href="Main_request.php">
                <button type="button" class="btn btn-default">
                 <span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>
                Request for maintainance</button></a>
            </div>
            <div class="btn-group" role="group">
            	 <a href="404.php">
                <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                Maintainance Works</button></a>
            </div>
            <div class="btn-group" role="group">
            	 <a href="Main_showMainPerson.php">
                <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                Maintainance Personel</button></a>
            </div>
        </div>
	 	<form>
		  <div class="form-group">
		    <label for="InputEmployeeID">Employee ID</label>
		    <input type="text" class="form-control" id="empID" placeholder="Enter your Employee ID">
		  </div>
		  <div class="form-group">
		    <label for="InputZoneID">Zone ID</label>
		    <input type="text" class="form-control" id="zoneID" placeholder="Enter your Zone ID">
		  </div>
		  <label for="maintainType">Type of maintainance</label>
		  <select class="form-control">
			  <option>Building</option>
			  <option>Transport</option>
			  <option>Cage</option>
			  <option>Item</option>
			</select>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

	 </body>

 </html>