<!DOCTYPE html>
<?php
require_once ('/var/www/html/app/library/function.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
  header('Location: ../login.php');
  exit();
}
require_once ('/var/www/html/app/model/connect.php');
?>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Researcher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
	
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

						$sql = "SELECT * FROM EMM_ZOO.BIOINFO;";
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
							while ($row = db2_fetch_assoc($stmt)) {
								print "<form type='post' name='alter_form'>";
								print "<tr><td>" . $row['SPECIESID']. "</td><td>" . $row['SPECIESNAME']. "</td><td>" . $row['PHYLUM']. "</td><td>" . $row['CLASS']. "</td><td>" . $row['ORDER']. "</td><td>" . $row['FAMILY']. "</td><td>" . $row['GENUS']. "</td><td>" . $row['WARMBLOODED']. "</td><td>" . $row['BODYCOVER']. "</td><td>" . $row['REPRODUCTION']. "</td><td>" . $row['HABITAT']. "</td><td>" . $row['COMMONFOOD']. "</td><td>" . $row['BODYTEMP']. "</td><td>" . $row['ENVITEMPRANGE']. "</td><td>" . $row['LIFESPAN']. "</td>";
								print "<td><button type='submit' name='edit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
								print "<td><button type='submit' name='delete' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
								print "</form>";
							}
						}
						db2_free_stmt($stmt);
						} 
						else {
							echo db2_conn_errormsg($conn);
						}
				?>
                </tbody>
				
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
              <div class="text-center">
