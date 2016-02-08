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
	
      <!-- ZONE -->
	<h2>Researcher list</h2>
            <div class="modal-body">
              <table class="table table-striped order-table">
                <thead>
                  <tr>
                    <th>Zone ID</th>
                    <th>Zone Type</th>
                    <th>Zone Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="myTable">
				
                <?php 
					require_once ('/var/www/html/app/model/connect.php');

						$sql = "SELECT * FROM EMM_ZOO.ZONETYPE INNER JOIN EMM_ZOO.ZONE ON (EMM_ZOO.ZONETYPE.ZONETYPEID = EMM_ZOO.ZONE.ZONETYPEID) ORDER BY ZONEID;";
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
							while ($row = db2_fetch_assoc($stmt)) {
								print "<form type='post' name='alter_form'>";
								print "<tr><td>" . $row['ZONEID']. "</td><td>" . $row['ZONETYPENAME']. "</td><td>" . $row['ZONENAME']. "</td>";
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
                      <form method="post" name="zoneSubmitForm">
                        <td><b>Add Zone</b></td>
                        <td>
                          <select class='form-control' name='zoneTypeValue'>
                            <?php include 'zoneTypeForAddZone.php'; ?>
                          </select>
                        </td>
                        <td><input type="text" class="form-control" name="zoneNameValue"><br></td>
                        <td>&nbsp;</td>
                        <td><button type="submit" name="addZoneSubmit" class="btn btn-info">Add</button></td>
                      </form>
                    </tr>
                </div>
              </table>
              <div class="text-center">
