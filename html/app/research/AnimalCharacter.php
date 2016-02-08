<!DOCTYPE html>
<?php
require_once ('CharacterUpload.php');
require_once ('/var/www/html/app/library/function.php');

if (isset($_POST['submit_info'])) {
	echo "yes";
	CharacterUpload();
	echo "<script>";
    echo "alert('Added successfully')";
    echo "</script>";
    header("Refresh:0; url=CharacterUpload.php"); 
}

?>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animal Character</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
	<body>
    <!-- Animal Character Information -->
	<h2>Animal Character Information</h2>
            <div class="modal-body">
              <table class="table table-striped order-table">
                <thead>
                  <tr>
					<th>AnimalID</th>
                    <th>RecordID</th>
					<th>EmpID</th>
                    <th>Height</th>
                    <th>Weight</th>
					<th>Length</th>
					<th>Pattern</th>
                    <th>BodyTemperature</th>
                  </tr>
                </thead>
                <tbody id="myTable">
				
                <?php 
					require_once ('/var/www/html/app/model/connect.php');
						$insertSQL = "INSERT ;";
						$sql = "SELECT * from EMM_ZOO.animal_charactoristics;";
						
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
							while ($row = db2_fetch_assoc($stmt)) {
								#print "<form type='post' name='alter_form'>";
								
								
								print "<tr><td>" . $row['ANIMALID']. "</td><td>" . $row['RECORDID']. "</td><td>" . $row['EMPID']. "</td><td>" . $row['HEIGHT']. "</td><td>" . $row['WEIGHT']. "</td><td>" . $row['LENGTH']. "</td><td>" . $row['PATTERN']. "</td><td>" . $row['BODYTEMP']. "</td>";

								print "<td><form action='EditCharacter.php' method='POST'><input type='hidden' value=". $row['RECORDID']." name='EditCharacter'> <button type='submit' name='edit=". $row['RECORDID']."' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></form></td>";
								
								print "<td><form action='delete_Character.php' method='POST'><input type='hidden' value=". $row['RECORDID']." name='delete_Character'> <button type='submit' name='delete=". $row['RECORDID']."' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td></form></tr>";
								
								#print "</form>";
								
								
							}
						}
						db2_free_stmt($stmt);
						} 
						else {
							echo db2_conn_errormsg($conn);
						}
						
						//if ($DE>0)
						//{$sql = "delete from EMM_ZOO.BIOINFO where SPECIESID=$DE;";							}
							
				?>
				
                </tbody>
				</table>
			</div>	
				<div class="container">	
					<div class="modal-dialog modal-lg" role="document">
          				<div class="modal-content">
            				<div class="modal-header">
              					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              				<div class="row">
	                				<h2 class="text-center">ADD ANIMAL CHARACTER INFORMATION</h2>		
	              				</div>
            				</div>
	            			<div class="modal-body">
	            				<div class="row">
	            					<div class="col-md-4 col-md-offset-4"</div> 
										<label>AnimalID</label>
										<br>
										<form class="col s12" method="post">
										<select id='AnimalID' class='form-control' name='AnimalID'>
											<option value="" disabled selected>Choose AnimalID</option>
											<?php include 'animalIDForAdd.php'; ?> 
											</select>
										<br>
										<label>RecordID</label>
										<input name="RecordID" id="RecordID" type="text" placeholder="Input RecordID" required/>
										<br><br>							
										<label>EmpID</label>
										<input name="EmpID" id="EmpID" type="text" placeholder="Input EmpID" required/>
										<br><br>
										<label>Height</label>
										<input name="Height" id="Height" type="text" placeholder="Input Height" required/>
										<br><br>
										<label>Weight</label>
										<input name="Weight" id="Weight" type="text" placeholder="Input Weight" required/>
										<br><br>
										<label>Length</label>
										<input name="Length" id="Length" type="text" placeholder="Input Length" required/>
										<br><br>
										<label>Pattern</label>
										<input name="Pattern" id="Pattern" type="text" placeholder="Input Pattern" required/>
										<br><br>
										<label>BodyTemperature</label>
										<input name="BodyTemperature" id="BodyTemperature" type="text" placeholder="Input BodyTemperature" required/>
										<td>&nbsp;</td>
				                        <td><button type="submit" name="submit_info" class="btn btn-info">  Submit </button></td>
										</form>
						
						</div>
                			</div>
                		</div>
                	</div>
            </div> 

			
                          
	</body>		