<!DOCTYPE html>
<?php
require_once ('InfoUpload.php');
require_once ('/var/www/html/app/library/function.php');
if (isset($_POST['submit_info'])) {
	echo "submit!!!!!!";
	uploadBioInfo();
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
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
							while ($row = db2_fetch_assoc($stmt)) {
								print "<form type='post' name='alter_form'>";
								print "<tr><td>" . $row['SPECIESID']. "</td><td>" . $row['SPECIESNAME']. "</td><td>" . $row['PHYLUM']. "</td><td>" . $row['CLASS']. "</td><td>" . $row['ORDER']. "</td><td>" . $row['FAMILY']. "</td><td>" . $row['GENUS']. "</td><td>" . $row['WARMBLOODED']. "</td><td>" . $row['BODYCOVER']. "</td><td>" . $row['REPRODUCTION']. "</td><td>" . $row['HABITAT']. "</td><td>" . $row['COMMONFOOD']. "</td><td>" . $row['BODYTEMP']. "</td><td>" . $row['ENVITEMPRANGE']. "</td><td>" . $row['LIFESPAN']. "</td>";
								print "<td><button type='submit' name='edit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
								print "<td><button type='submit' name='delete=". $row['SPECIESID']."' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
								print "</form>";
							}
						}
						db2_free_stmt($stmt);
						} 
						else {
							echo db2_conn_errormsg($conn);
						}
						//$DE = $_GET['delete'];
						//if ($DE>0)
						//{$sql = "delete from EMM_ZOO.BIOINFO where SPECIESID=$DE;";							}
							
				?>
                </tbody>
				</table>
			</div>	
			<div class="text-center">		</div>	
			<div class="container">	
				<form class="col s12" method="post" accept-charset="utf-8">
				<div class="row">
					<div class="input-field col s12 m12"> 
						<label>Animal ID</label>
						<br>
						<td><select id='AnimalID' class='form-control' name='AnimalID'>
							<option value="" disabled selected>Choose AnimalID</option>
							<?php include 'animalIDForAdd.php'; ?> 
							</select>
						</td>
						<br><br>
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
							<option value="YES" selected>YES </option>
							<option value="NO">No</option></select>
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
						<input type="Submit" value="Submit" name="submit_info" class="material-icons right"/>
						
						</div> 
					</div>

				</div>
				</form>
			</div>	    
              
			
		
	<!--------------------------------------------------------------------					
			<body>
			<div class="row">
				<div class="container">
				  <div class="row">
					<div class="col s12">
					  <ul class="tabs">
						<li class="tab col s3"><a class="active text-cyan text-darken-1" href="#reserve_add">Add Biological Information</a></li>
						<li class="tab col s3"><a href="#reserve_list">Animal Biological Information</a></li>
					  </ul>
					</div>
					<div id="Bioinfo_add" class="col s12">
					  <div class="section">
						<form class="col s12" method="post" accept-charset="utf-8">
						  <div class="row">
							<div class="input-field col s12 m12">
								<label for="name">Animal ID</label>
								
								<select id="Animal ID" name="type" class="form-control">
								      <?php include 'animalIDForAdd.php'; ?>
								</select>
							</div>
						  </div>
						  
			</div>	  
		 </body>				
		 
		 <option value="" disabled selected>Choose Animal ID</option>
							
							<div class="row">
							<div class="input-field col s12 m12">
							  <i class="material-icons prefix">email</i>
							  <input name="email" id="email" type="email" placeholder="receiver@maildomain.com" class="validate"/>
							  <label for="email">Email</label>
							</div>
						  </div>
						  <div class="row">
							<div class="input-field col s12 m6">
							  <i class="material-icons prefix">phone</i>
							  <input id="icon_telephone" placeholder="0XX-XXX-XXXX" name="mobile" type="text" class="validate"/>
							  <label for="icon_telephone">Mobile</label>
							</div>
							<div class="input-field col s12 m6">
							  <i class="material-icons prefix">today</i>
							  <input id="rev_date" placeholder="Reserve date" name="reserved_date" type="date" class="datepicker"/>
							</div>
						  </div>
						  
							<div class="input-field col s12 m6">
							  <i class="material-icons prefix">add_location</i>
							  <input type="number" name="quantity" min="1" max="20" class="validate"/>
							  <label for="quantity">Amount</label>
							</div>
						  </div>
						  <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>" />
						  <div class="row center">
							<button class="btn btn-large waves-effect waves-light 35 cyan darken-1 submit-margin-top" type="submit" name="submit_reserved">Submit
							<i class="material-icons right">send</i>
							</button>
						  </div>
						</form>
					  </div>
					</div>
	
	
                <div class="row">
                    <tr>
                      <form method="post" name="BIOINFOSubmitForm">
                        <td><b>Add Information</b></td>
                        <td><input type="text" class="form-control" name="speciesName"><br></td>
                        <td>&nbsp;</td>
                        <td><button type="submit" name="addSpeciesNameSubmit" class="btn btn-info">Add</button></td>
                      </form>
                    </tr>
                </div>
              </table>
              <div class="text-center">!>
