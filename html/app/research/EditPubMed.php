<!DOCTYPE html>
<?php
require_once ('InfoUpload.php');
require_once ('/var/www/html/app/library/function.php');
if (isset($_POST['submit_Edit'])) {
			$PUBMEDID = $_POST['PUBMEDID'];
			$Title = $_POST['Title'];
			$Year = $_POST['Year'];
			$Author = $_POST['Author'];
			$Journal = $_POST['Journal'];
			$ResearchType= $_POST['ResearchType'];
			$data = array($PUBMEDID,$Title,$Year,$Author,$Journal,$ResearchType);
		    
		require_once ('/var/www/html/app/model/connect.php');
		$conn = dbConnect();
		if ($conn) {
			// DEFAULT if you set generated as identify with specifier this will auto increament for integer.
			$sql = "UPDATE EMM_ZOO.PUBMEDREFERENCES
					SET TITLE='$data[1]',YEAR='$data[2]',AUTHOR='$data[3]',JOURNAL='$data[4]',RESEARCH_TYPE='$data[5]'
						WHERE $data[0]=PUBMEDID";
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
		$sql = "SELECT * FROM EMM_ZOO.PUBMEDREFERENCES WHERE PUBMEDID = $id;";
		echo $id;
		
		if ($conn) {
			$stmt = db2_exec($conn, $sql);
			if($stmt) {
				$row = db2_fetch_assoc($stmt);
				$data = array($row['PUBMEDID'],$row['TITLE'],$row['YEAR'],$row['AUTHOR'],$row['JOURNAL'],$row['RESEARCH_TYPE']);			
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
	                				<h2 class="text-center">EDIT PUBLICATION</h2>
	                  				
	              				</div>
            				</div>
	            			<div class="modal-body">
	            				<div class="row">
	            					<div class="col-md-4 col-md-offset-4"</div>
			          					<label>PUBMED ID</label>
										<br>
										<input name="PUBMEDID" id="PUBMEDID" type="text" value="<?php echo $data[0] ?>" required/>
										<br><br>
										<label>TITLE</label>
										<br>
										<input name="Title" id="Title" type="text" value="<?php echo $data[1] ?>" required/>
										<br><br>
										<label>YEAR</label>
										<br>
										<input name="Year" id="Year" type="text" value="<?php echo $data[2] ?>" required/>
										<br><br>
										<label>AUTHORS</label>
										<br>
										<input name="Author" id="Author" type="text" value="<?php echo $data[3] ?>" required/>
										<br><br>
										<label>JOURNAL</label>
										<br>
										<input name="Journal" id="Journal" type="text" value="<?php echo $data[4] ?>" required/>
										<br><br>
										<label>RESEARCH TYPE</label>
										<br>
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