<?php
require_once ('/var/www/html/app/library/function.php');
if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
	header('Location: ../login.php');
	exit();
}

if (isset($_POST['addZoneSubmit']) && (!empty($_POST['zoneNameValueForAddZone'])) ) { //zoneTypeValueForAddZone 
	addZone();
}
?>

<html lang="en">

<head>
</head>

										<form method="post" name="zoneSubmitForm">
										<td><b>Add Zone</b></td>
										<td>
											<select class='form-control' name='zoneTypeValueForAddZone'>
												<?php include 'EmpSelectAdd.php'; ?>
											</select>
										</td>
										<select class='form-control' name='zoneNameValueForAddZone'>
                                    	<?php include 'ZoneSelectAdd.php'; ?>
                              		    </select>
								
										<td><button type="submit" name="addZoneSubmit" class="btn btn-info">Add</button></td>
									</form>
        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; Database Zoo Project Website 2015</span>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li><a href="#">Privacy Policy</a>
                            </li>
                            <li><a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

                                           
                        
  
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/agency.js"></script>

</body>

</html>
<?php
db2_close($conn);
?>