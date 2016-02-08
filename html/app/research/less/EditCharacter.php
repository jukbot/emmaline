<!DOCTYPE html>
<?php
require_once ('CharacterUpload.php');
require_once ('/var/www/html/app/library/function.php');
if (isset($_POST['submit_Edit'])) {
			$AnimalID = $_POST['AnimalID'];
			$RecordID = $_POST['RecordID'];
			$EmpID = $_POST['EmpID'];
			$Height = $_POST['Height'];
			$Weight = $_POST['Weight'];
			$Length = $_POST['Length'];
			$Pattern = $_POST['Pattern'];
			$BodyTemperature= $_POST['BodyTemperature'];
			$data = array($AnimalID,$RecordID ,$EmpID, $Height, $Weight, $Length, $Pattern, $BodyTemperature);
		    
		require_once ('/var/www/html/app/model/connect.php');
		$conn = dbConnect();
		if ($conn) {
			// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
			$sql = "UPDATE EMM_ZOO.animal_charactoristics
					SET EmpID='$data[2]',HEIGHT='$data[3]',WEIGHT='$data[4]',LENGTH='$data[5]',PATTERN='$data[6]',BodyTemperature='$data[7]'
						WHERE $data[0]=AnimalID AND $data[1]=RecordID";
					echo $sql;
			$stmt = db2_exec($conn, $sql);
			if ($stmt) {
				$resultMessage = "Successfully added to Biological information";
						echo "Successfully added";
						 header('Location: PubMedRef.php');
						 exit();
			}
			else { // If statement is error why see the code
				die('Critical error:' . db2_stmt_error());
			}
			db2_free_stmt($stmt);
			db2_close($conn);}
		else {
				   echo db2_conn_errormsg();
		}
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

	<?php 
	require_once ('/var/www/html/app/model/connect.php');
		$id=$_POST['Edit_PubMed'];
		$sql = "SELECT * FROM EMM_ZOO.animal_charactoristics WHERE PUBMEDID = $id;";
		echo $id;
		
		if ($conn) {
			$stmt = db2_exec($conn, $sql);
			if($stmt) {
				$row = db2_fetch_assoc($stmt);
				$data = array($row['AnimalID'],$row['RecordID'],$row['EmpID'],$row['Height'],$row['Weight'],$row['Length'],$row['Pattern'],$row['BodyTemperature']);			
		}
		db2_free_stmt($stmt);
		} 
		else {
			echo db2_conn_errormsg($conn);
		}
			
	?>
	<body>
			<div class="container">	
				<form class="col s12" method="post" accept-charset="utf-8">
					<div class="modal-dialog modal-lg" role="document">
          				<div class="modal-content">
            				<div class="modal-header">
              					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              				<div class="row">
	                				<h2 class="text-center">EDIT ANIMAL CHARACTER</h2>
	                  				
	              				</div>
            				</div>
	            			<div class="modal-body">
	            				<div class="row">
	            					<div class="col-md-4 col-md-offset-4"</div>
			          					<label>ANIMALID</label>
										<br>
										<input name="ANIMALID" id="ANIMALID" type="text" value="<?php echo $data[0] ?>" required/>
										<br><br>
										<label>RECORDID</label>
										<br>
										<input name="RECORDID" id="RECORDID" type="text" value="<?php echo $data[1] ?>" required/>
										<br><br>
										<label>EMPID</label>
										<br>
										<input name="EMPID" id="EMPID" type="text" value="<?php echo $data[2] ?>" required/>
										<br><br>
										<label>HEIGHT</label>
										<br>
										<input name="HEIGHT" id="HEIGHT" type="text" value="<?php echo $data[3] ?>" required/>
										<br><br>
										<label>WEIGHT</label>
										<br>
										<input name="WEIGHT" id="WEIGHT" type="text" value="<?php echo $data[4] ?>" required/>
										<br><br>
										<br><br>
										<label>LENGTH</label>
										<br>
										<input name="LENGTH" id="LENGTH" type="text" value="<?php echo $data[4] ?>" required/>
										<br><br>
										<br><br>
										<label>PATTERN</label>
										<br>
										<input name="PATTERN" id="PATTERN" type="text" value="<?php echo $data[4] ?>" required/>
										<br><br>
										<label>BODY TEMPERATURE</label>
										<br>
										<input name="BODY TEMPERATURE" id="BODY TEMPERATURE" type="text" value="<?php echo $data[4] ?>" required/>
										<br><br>
										
										
										<select id="ResearchType" name="ResearchType" class="validate" required>
											<option value="Pathogenesis">Pathogenesis </option>
											<option value="Animal">Animal</option></select>
										<br><br>
										<td>&nbsp;</td>
				                        <td><button type="submit" name="submit_Edit" class="btn btn-info">  Submit  </button></td>
			                    </div>
                			</div>
                		</div>
                	</div>
                </form>
            </div> 
	</body>