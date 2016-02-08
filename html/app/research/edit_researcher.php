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
	<h2>Researcher list</h2>
            <div class="modal-body">
              <table class="table table-striped order-table">
                <thead>
                  <tr>
					<!-- Name of columns on the screen -->
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
					<th>Animal</th>
					<th>Animal ID</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="myTable">
				
                <?php 
					require_once ('/var/www/html/app/model/connect.php');

						$sql = "select EMM_ZOO.employee.empid, firstname, lastname, animalname, EMM_ZOO.animal.animalid from EMM_ZOO.employee, EMM_ZOO.researcher, EMM_ZOO.animal where EMM_ZOO.employee.empid=EMM_ZOO.researcher.empid and EMM_ZOO.animal.animalid=EMM_ZOO.researcher.animalid order by EMM_ZOO.employee.empid;";
						if ($conn) {
							$stmt = db2_exec($conn, $sql);
							if($stmt) {
							while ($row = db2_fetch_assoc($stmt)) {
								#print "<form type='post' name='alter_form'>";
								#Edit here for adding columns, use the name of column
								print "<tr><td>" . $row['EMPID']. "</td><td>" . $row['FIRSTNAME']. "</td><td>" . $row['LASTNAME']. "</td><td>" . $row['ANIMALNAME']. "</td><td>" . $row['ANIMALID']. "</td>";
								
								
								print "<td><form method='POST' action='delete_row_researcher.php' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'> <input type='hidden' value=". $row['EMPID']." name='EMPID'><input type='hidden' value=". $row['ANIMALID']." name='ANIMALID'>
									<button type='submit' name='delete' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></form></td></tr>";
								
								#print "</form>";
							}
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
					<tr><td><b>Add Employee (EmpID)</b></td> <td><b>Add animal (AnimalID)</b></td>
                    <tr>
                      <form method="post" action="addEmpAnimalRes.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                        
                        <td>
                          <select class='form-control' name='add_EMPID'>
							<?php 
							require_once ('/var/www/html/app/model/connect.php');
								
								$sql = "SELECT empid FROM EMM_ZOO.employee ORDER BY empid;";

								if ($conn) {
									$stmt = db2_exec($conn, $sql);
									if($stmt) {
										while ($row = db2_fetch_assoc($stmt)) {
											print "<option value='". $row['EMPID']. "'>" .$row['EMPID']. "</option>";   
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
						
                        <td>
                          <select class='form-control' name='add_ANIMALID'>
							<?php 
							require_once ('/var/www/html/app/model/connect.php');
								
								$sql = "SELECT animalid FROM EMM_ZOO.animal ORDER BY animalid;";
								
								if ($conn) {
									$stmt = db2_exec($conn, $sql);
									if($stmt) {
										while ($row = db2_fetch_assoc($stmt)) {
											print "<option value='". $row['ANIMALID']. "'>" .$row['ANIMALID']. "</option>";   
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
