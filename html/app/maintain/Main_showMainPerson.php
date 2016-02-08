

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

	 	<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h3>
					Maintainance Personel
					</h3>
					<table class="table">
						<thead>
							<tr class="success">
								<th>Personel No.</th>
								<th>Employee ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Maintaining Job</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'query/query_maintainPersonel.php' ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	 </body>

 </html>