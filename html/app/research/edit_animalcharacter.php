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
                    <th>Record ID</th>
                    <th>Height</th>
                    <th>Weight</th>
					<th>Length</th>
					<th>Pattern</th>
                    <th>Body Temperature</th>
					<th>Emotion</th>
					<th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="myTable">
				
                <?php 
					require_once ('/var/www/html/app/model/connect.php');

						$sql = "select * from  EMM_ZOO.animal_charactoristics;";
						//echo $sql;
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							
							echo $stmt;
							while ($row = db2_fetch_assoc($stmt)) {
                                
							print "<tr><td>" . $row['RECORDID']. "</td><td>" . $row['HEIGHT']. "</td><td>" . $row['WEIGHT']. "</td><td>" . $row['LENGTH']. "</td><td>" . $row['PATTERN']. "</td><td>" . $row['BODYTEMP']. "</td></tr>";
								
								print "<td><form><button type='submit' name='edit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></form></td>";
								
							//	print "<td><form method='POST' action='delete_row_disease.php' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'>   <input type='hidden' value=". $row['diseaseid']." name='diseaseid'>
							//		<button type='submit' name='delete' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></form></td></tr>";
								
								#print "</form>";
							}
							db2_free_stmt($stmt);
						}
					

						else {
							echo db2_conn_errormsg($conn);
						}
				?>
                </tbody>
				
				<tbody id="myTable">
                <div class="row">
					<tr></tr>
					<tr><td><b>Add RecordID</b></td>
                    <tr>
                      <form method="post" action="addEmpAnimalRes.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                        
                        <td>
                          <select class='form-control' name='add_RECORDID'>
							<?php 
							require_once ('/var/www/html/app/model/connect.php');
								
								$sql = "SELECT recordID FROM EMM_ZOO.animalrecord ORDER BY recordID;";

								if ($conn) {
									$stmt = db2_exec($conn, $sql);
									if($stmt) {
										while ($row = db2_fetch_assoc($stmt)) {
											print "<option value='". $row['RECORDID']. "'>" .$row['RECORDID']. "</option>";   
										}
								}
								db2_free_stmt($stmt);
								} 
								else {
									echo db2_conn_errormsg($conn);
								}
									
							?>
                          </select>
                        </td>
						
						
						
                        <td>&nbsp;</td>
                        <td><button type="submit" class="btn btn-info">Add</button></td>
                      </form>
                    </tr>
                </div>
              </table>
              <div class="text-center">
