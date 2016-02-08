<!DOCTYPE html>
<?php
require_once ('InsertPubMed.php');
require_once ('/var/www/html/app/library/function.php');
if (isset($_POST['submit_Pubmed'])) {
	uploadPubMedInfo();
	echo "<script>";
    echo "alert('Added successfully')";
    echo "</script>";
    header("Refresh:0; url=PubMedRef.php"); 
}
?>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PUBMED References</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
	<body>
    <!-- Animal Biological Information -->
	<h2>PUBMED-Reference Information</h2>
            <div class="modal-body">
              <table class="table table-striped order-table">
                <thead>
                  <tr>
                    <th>PUBMED ID</th>
                    <th>Title</th>
                    <th>Year</th>
					<th>Author</th>
					<th>Journal</th>
					<th>Research type</th>
					<th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="myTable">
				
                <?php 
					require_once ('/var/www/html/app/model/connect.php');
						$insertSQL = "INSERT ;";
						$sql = "SELECT * FROM EMM_ZOO.PUBMEDREFERENCES;";
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
							while ($row = db2_fetch_assoc($stmt)) {
								#print "<form type='post' name='alter_form'>";
								
								
								print "<tr><td>" . $row['PUBMEDID']. "</td><td>" . $row['TITLE']. "</td><td>" . $row['YEAR']. "</td><td>" . $row['AUTHOR']. "</td><td>" . $row['JOURNAL']. "</td><td>" . $row['RESEARCH_TYPE']. "</td>";

								print "<td><form action='EditPubMed.php' method='POST'><input type='hidden' value=". $row['PUBMEDID']." name='Edit_PubMed'> <button type='submit' name='edit=". $row['PUBMEDID']."' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></form></td>";
								
								
								print "<td><form action='delete_PubMed.php' method='POST'><input type='hidden' value=". $row['PUBMEDID']." name='delete_PubMed'> <button type='submit' name='delete=". $row['PUBMEDID']."' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td></form></tr>";
								
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
	                				<h2 class="text-center">ADD PUBLICATION</h2>
	                  				
	              				</div>
            				</div>
	            			<div class="modal-body">
	            				<div class="row">
	            					<div class="col-md-4 col-md-offset-4"</div>
			          					<label>PUBMED ID</label>
										<br>
										<input name="PUBMEDID" id="PUBMEDID" type="text" placeholder="Input pubmed id" required/>
										<br><br>
										<label>TITLE</label>
										<br>
										<input name="Title" id="Title" type="text" placeholder="Input title" required/>
										<br><br>
										<label>YEAR</label>
										<br>
										<input name="Year" id="Year" type="text" placeholder="2015" required/>
										<br><br>
										<label>AUTHORS</label>
										<br>
										<input name="Author" id="Author" type="text" placeholder="Input first author name" required/>
										<br><br>
										<label>JOURNAL</label>
										<br>
										<input name="Journal" id="Journal" type="text" placeholder="Input Journal name" required/>
										<br><br>
										<label>RESEARCH TYPE</label>
										<br>
										<select id="ResearchType" name="ResearchType" class="validate" required>

											<option value="Pathogenesis">Pathogenesis </option>
											<option value="Animal">Animal</option></select>
										<br><br>
										<td>&nbsp;</td>
				                        <td><button type="submit" name="submit_Pubmed" class="btn btn-info">  Submit  </button></td>
			                    </div>
                			</div>
                		</div>
                	</div>
                </form>
            </div> 
                          
	</body>		
