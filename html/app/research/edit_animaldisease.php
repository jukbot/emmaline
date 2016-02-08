<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/library/function.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
  header('Location: ../login.php');
  exit();
}

?>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Researcher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
	
      <!-- ZONE -->
	<h2>Animal Disease</h2>
            <div class="modal-body">
              <table class="table table-striped order-table">
                <thead>
                  <tr>
					<!-- Name of columns on the screen -->
                    <th>Disease ID</th>
                    <th>Name</th>
                    <th>Spreading period</th>
					<th>Blood diagnostic</th>
					<th>Skin change</th>
                    <th>Mucus</th>
					<th>Behaviour change</th>
					<th>Infection by</th>
					<th>Major organ damage</th>
					<th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="myTable">
				
                <?php 
					require_once ('/var/www/html/app/model/connect.php');

						$sql = "select EMM_ZOO.animaldisease.diseaseid, EMM_ZOO.animaldisease.common_name, EMM_ZOO.animaldisease.spreading_period,blood,skin,mucus,behaviorchange,infection,organ1 from EMM_ZOO.diseasesymptom, EMM_ZOO.animaldisease, EMM_ZOO.disease_link where EMM_ZOO.diseasesymptom.symptomid=EMM_ZOO.disease_link.symptomid AND EMM_ZOO.animaldisease.diseaseid=EMM_ZOO.disease_link.diseaseid;";

						if ($conn) {
							$stmt = db2_exec($conn, $sql);
		
							while ($row = db2_fetch_assoc($stmt)) {
                                
							print "<tr><td>" . $row['DISEASEID']. "</td><td>" . $row['COMMON_NAME']. "</td><td>" . $row['SPREADING_PERIOD']. "</td><td>" . $row['BLOOD']. "</td><td>" . $row['SKIN']. "</td><td>" . $row['MUCUS']. "</td><td>" . $row['BEHAVIORCHANGE']. "</td><td>" . $row['INFECTION']. "</td><td>" . $row['ORGAN1']. "</td>";
								
								print "<td><form method='POST' action='Edit_disease.php' > <input type='hidden' value=". $row['DISEASEID']." name='diseaseid'>  <button type='submit' name='edit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></form></td>";
								
								print "<td><form method='POST' action='delete_row_disease.php' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'>   <input type='hidden' value=". $row['DISEASEID']." name='diseaseid'>
									<button type='submit' name='delete' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></form></td></tr>";
								
							
							}
							db2_free_stmt($stmt);
						}
				
						else {
							echo db2_conn_errormsg($conn);
						}
				?>
                </tbody>
				
				<table style="width:100%">
                <div class="row">
				 <form method="post" action="addDisease.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">				
					<tr></tr>
					<tr></tr>
					<tr><h2>Add new disease</h2></tr>
					<tr><td><b>Disease(ID)</b></td> <td><input type="text" class='form-control' name="diseaseid"></td>
					<tr><td><b>Common name</b></td><td><input type="text" class='form-control' name="name"></td>
					<tr><td><b>Spreading period</b></td><td><input type="text" class='form-control' name="spread"></td>
					<tr><td><b>Symptom ID</b></td><td><input type="text" class='form-control' name="symid"></td>
					<tr><td><b>Blood diagnosis</b></td><td><input type="text" class='form-control' name="blood"></td>
					<tr><td><b>Skin damage</b></td><td><input type="text" class='form-control' name="skin"></td>
					<tr><td><b>Mucus</b></td><td><input type="text" class='form-control' name="mucus"> </td>
					<tr><td><b>Behaviour change</b></td><td><input type="text" class='form-control' name="behave"></td>
					<tr><td><b>Infection</b></td><td><input type="text" class='form-control' name="infect"></td>
					<tr><td><b>Main organ damage</b></td><td><input type="text" class='form-control' name="organ"></td>
                    <tr>
                     
                        <td>&nbsp;</td>
                        <td><button type="submit" class="btn btn-info">Add</button></td>
                      </form>
                    </tr>
                </div>
              </table>
              <div class="text-center">
	<?php
	db2_close($conn);//
	?>