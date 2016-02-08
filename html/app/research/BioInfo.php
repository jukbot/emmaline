<!DOCTYPE html>
<?php
require_once ('InfoUpload.php');
require_once ('/var/www/html/app/library/function.php');
if (isset($_POST['submit_info'])) {
	echo "yessssssss!!";
	uploadBioInfo();
	echo "<script>";
    echo "alert('Added successfully')";
    echo "</script>";
    header("Refresh:0; url=BioInfo.php"); 
}
?>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biological Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
	<body>
    <!-- Animal Biological Information -->
	<h2>Animal Biological Information</h2>
            <div class="modal-body">
              <table class="table table-striped order-table">
                <thead>
                  <tr>
                    <th>Species ID</th>
                    <th>Species Name</th>
                    <th>Phylum</th>
					<th>Class</th>
					<th>Order</th>
					<th>Family</th>
					<th>Genus</th>
					<th>Is Warm Blood</th>
					<th>Body Cover Type</th>
					<th>Reproduction</th>
					<th>Habitat</th>
					<th>Common Food</th>
					<th>Body Temperature</th>
					<th>Range of Envi Temperature</th>
					<th>Live Span</th>
					<th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="myTable">
				
                <?php 
					require_once ('/var/www/html/app/model/connect.php');
						$insertSQL = "INSERT ;";
						$sql = "SELECT * FROM EMM_ZOO.BIOINFO;";
						$editRow=0;
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
							while ($row = db2_fetch_assoc($stmt)) {
								#print "<form type='post' name='alter_form'>";
								
								
								print "<tr><td>" . $row['SPECIESID']. "</td><td>" . $row['SPECIESNAME']. "</td><td>" . $row['PHYLUM']. "</td><td>" . $row['CLASS']. "</td><td>" . $row['ORDER']. "</td><td>" . $row['FAMILY']. "</td><td>" . $row['GENUS']. "</td><td>" . $row['WARMBLOODED']. "</td><td>" . $row['BODYCOVER']. "</td><td>" . $row['REPRODUCTION']. "</td><td>" . $row['HABITAT']. "</td><td>" . $row['COMMONFOOD']. "</td><td>" . $row['BODYTEMP']. "</td><td>" . $row['ENVITEMPRANGE']. "</td><td>" . $row['LIFESPAN']. "</td>";

								print "<td><form action='EditBioInfo.php' method='POST'><input type='hidden' value=". $row['SPECIESID']." name='Edit_species'> <button type='submit' name='edit=". $row['SPECIESID']."' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></form></td>";
								
								
								print "<td><form action='delete_.php' method='POST'><input type='hidden' value=". $row['SPECIESID']." name='delete_species'> <button type='submit' name='delete=". $row['SPECIESID']."' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td></form></tr>";
								
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
				<form class="col s12" method="post" accept-charset="utf-8">
					<div class="modal-dialog modal-lg" role="document">
          				<div class="modal-content">
            				<div class="modal-header">
              					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              				<div class="row">
	                				<h2 class="text-center">ADD ANIMAL BIOLOGICAL INFORMATION</h2>
	                  				
	              				</div>
            				</div>
	            			<div class="modal-body">
	            				<div class="row">
	            					<div class="col-md-4 col-md-offset-4"</div> 
										<label>Animal ID</label>
										<br>
										<select id='AnimalID' class='form-control' name='AnimalID'>
											<option value="" disabled selected>Choose AnimalID</option>
											<?php include 'animalIDForAdd.php'; ?> 
											</select>
										
										<br>
										<label>Species Name</label>
										<input name="species" id="species" type="text" placeholder="Input species name" required/>
										<br><br>
										<label>Phylum</label>
										<input name="Phylum" id="Phylum" type="text" placeholder="Input phylum" required/>
										<br><br>
										<label>Class</label>
										<input name="Class" id="Class" type="text" placeholder="Input Class" required/>
										<br><br>
										<label>Order</label>
										<input name="Order" id="Order" type="text" placeholder="Input Order" required/>
										<br><br>
										<label>Family</label>
										<input name="Family" id="Family" type="text" placeholder="Input Family" required/>
										<br><br>
										<label>Genus</label>
										<input name="Genus" id="Genus" type="text" placeholder="Input Genus" required/>
										<br><br>
										<label>Animal is warm-blood?</label>
										<select id="warmblooded" name="warmblooded" class="validate" required>
											<option value="TRUE" selected>TRUE </option>
											<option value="FALSE">FASLE</option></select>
										<br><br>
										<label>Body Cover</label>
										<input name="Cover" id="Cover" type="text" placeholder="Input Skin Cover Type" required/>
										<br><br>
										<label>Reproduction</label>
										<input name="Reproduction" id="Reproduction" type="text" placeholder="Input Reproduction " required/>
										<br><br>
										<label>Habitat</label>
										<input name="Habitat" id="Habitat" type="text" placeholder="Input Habitat" required/>
										<br><br>
										<label>Common Food</label>
										<input name="food" id="food" type="text" placeholder="Input Common Food" required/>
										<br><br>
										<label>Body Temperature(C)</label>
										<input type="number" step="any" id="BodyTemp" name="BodyTemp"  />
										<br><br>
										<label for="quantity">Environment Temperature(C)</label>
										<input type="number" step="any" id="EnviTemp" name="EnviTemp"  />
										<br><br>
										<label for="quantity">Life span (years)</label>
										<input type="number" step="any" id="LifeSpan" name="LifeSpan"  />
										<br><br>
										<td>&nbsp;</td>
				                        <td><button type="submit" name="submit_info" class="btn btn-info">  Submit </button></td>
										
						
						</div>
                			</div>
                		</div>
                	</div>
                </form>
            </div> 

			
                          
	</body>		