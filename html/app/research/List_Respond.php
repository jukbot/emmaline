
							<?php 
							require_once ('/var/www/html/app/model/connect.php');
								
								$sql = "SELECT work_id FROM EMM_ZOO.Research_assignment ;";
								
								if ($conn) {
									$stmt = db2_exec($conn, $sql);
									if($stmt) {
										while ($row = db2_fetch_assoc($stmt)) {
											print "<option value='". $row['work_id']. "'>" .$row['work_id']. "</option>";   
										}
								}
								db2_free_stmt($stmt);
								} 
								else {
									echo db2_conn_errormsg($conn);
								}
									
							?>