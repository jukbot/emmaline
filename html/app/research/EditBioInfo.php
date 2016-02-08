<!DOCTYPE html>
<?php
require_once ('InfoUpload.php');
require_once ('/var/www/html/app/library/function.php');
if (isset($_POST['submit_Edit'])) {
			$AnimalID = $_POST['AnimalID'];
			$species = $_POST['species'];
			$Phylum = $_POST['phylum'];
			$Class = $_POST['Class'];
			$Order = $_POST['Order'];
			$Family= $_POST['Family'];
			$Genus= $_POST['Genus'];
			$warmblooded= $_POST['warmblooded'];
			$Cover= $_POST['Cover'];
			$Reproduction= $_POST['Reproduction']; 
			$Habitat= $_POST['Habitat'];
			$food= $_POST['food'];
			$BodyTemp= $_POST['BodyTemp'];
			$EnviTemp= $_POST['EnviTemp'];
			$LifeSpan= $_POST['LifeSpan'];
			// an array that want to insert this can be multiple array at the time.
			$data = array($AnimalID, $species, $Phylum, $Class, $Order, $Family, $Genus, $warmblooded, $Cover, $Reproduction, $Habitat, $food, $BodyTemp, $EnviTemp, $LifeSpan);
		    
		require_once ('/var/www/html/app/model/connect.php');
		$conn = dbConnect();
		if ($conn) {
			// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
			$sql = "UPDATE EMM_ZOO.BIOINFO
					SET SPECIESNAME='$data[1]', PHYLUM='$data[2]', CLASS='$data[3]', ORDER='$data[4]', FAMILY='$data[5]', GENUS='$data[6]'
									, WARMBLOODED='$data[7]', BODYCOVER='$data[8]', REPRODUCTION='$data[9]', HABITAT='$data[10]', COMMONFOOD='$data[11]',
									BODYTEMP='$data[12]', ENVITEMPRANGE='$data[13]', LIFESPAN='$data[14]'
					WHERE $data[0]=SPECIESID";
					#echo $sql;
			$stmt = db2_exec($conn, $sql);
			if ($stmt) {
				$resultMessage = "Successfully added to Biological information";
						echo "Successfully added";
						 header('Location: BioInfo.php');
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
		$id=$_POST['Edit_species'];
		$sql = "SELECT * FROM EMM_ZOO.BIOINFO WHERE SPECIESID = $id;";
		#echo $id;
		
		if ($conn) {
			$stmt = db2_exec($conn, $sql);
			if($stmt) {
				$row = db2_fetch_assoc($stmt);
				$data = array($row['SPECIESID'],$row['SPECIESNAME'],$row['PHYLUM'],$row['CLASS'],$row['ORDER'],$row['FAMILY'],$row['GENUS'],
								$row['WARMBLOODED'],$row['BODYCOVER'],$row['REPRODUCTION'],$row['HABITAT'],$row['COMMONFOOD'],
								$row['BODYTEMP'],$row['ENVITEMPRANGE'],$row['LIFESPAN']);			
		}
		db2_free_stmt($stmt);
		} 
		else {
			echo db2_conn_errormsg($conn);
		}
			
	?>
	<body>
		<form type='post' method="post" name='alter_form'>

			<div class="container">	
				<form class="col s12" method="post" accept-charset="utf-8">
					<div class="modal-dialog modal-lg" role="document">
          				<div class="modal-content">
            				<div class="modal-header">
              					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              				<div class="row">
	                				<h2 class="text-center">EDIT BIOLOGICAL INFORMATION</h2>
	                  				
	              				</div>
            				</div>
	            			<div class="modal-body">
	            				<div class="row">
	            					<div class="col-md-4 col-md-offset-4"</div>
									<label>AnimalID</label><input name="AnimalID" id="AnimalID" type="text" value="<?php echo $data[0] ?>" required/>
									<br><br>
									<label>Species Name</label><input name="species" id="species" type="text" value="<?php echo $data[1] ?>" required/>
									<br><br>
									<label>Phylum</label><input name="phylum" id="phylum" type="text" value="<?php echo $data[2] ?>" required/>
									<br><br>
									<label>Class</label> <input name="Class" id="Class" type="text" value="<?php echo $data[3] ?>" required/>
									<br><br>
									<label>Order</label>
									<input name="Order" id="Order" type="text" value="<?php echo $data[4] ?>" required/>
									<br><br>
									<label>Family</label>
									<input name="Family" id="Family" type="text" value="<?php echo $data[5] ?>" required/>
									<br><br>
									<label>Genus</label>
									<input name="Genus" id="Genus" type="text" value="<?php echo $data[6] ?>" required/>
									<br><br>
									<label>Animal is warm-blood?</label>
									<input id="warmblooded" name="warmblooded"  type="text" value="<?php echo $data[7] ?>" required/>
									<br><br>
									<label>Body Cover</label>
									<input name="Cover" id="Cover" type="text" value="<?php echo $data[8] ?>" required/>
									<br><br>
									<label>Reproduction</label>
									<input name="Reproduction" id="Reproduction" type="text" value="<?php echo $data[9] ?>" required/>
									<br><br>
									<label>Habitat</label>
									<input name="Habitat" id="Habitat" type="text" value="<?php echo $data[10] ?>" required/>
									<br><br>
									<label>Common Food</label>
									<input name="food" id="food" type="text" value="<?php echo $data[11] ?>" required/>
									<br><br>
									<label>Body Temperature(C)</label>
									<input type="number" step="any" id="BodyTemp" name="BodyTemp" value="<?php echo $data[12] ?>" required/> 
									<br><br>
									<label for="quantity">Environment Temperature(C)</label>
									<input type="number" step="any" id="EnviTemp" name="EnviTemp"  value="<?php echo $data[13] ?>" required/>
									<br><br>
									<label for="quantity">Life span (years)</label>
									<input type="number" step="any" id="LifeSpan" name="LifeSpan"  value="<?php echo $data[14] ?>" required/>
									<br> <input type="Submit" value="Submit" name="submit_Edit"/>
			</div>
		</form>
	</body>