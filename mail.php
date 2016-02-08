<?php

	if($_POST)
	{
	   $email = $_POST['email'];
	   $youremail = "test@test.com"; /** change email address to your own **/
	   $subject = "New newsletter subscriber"; /** enter email subject **/
	   $bodytext = "New newsletter subscriber: " . $email; /** enter email body text **/
	   mail($youremail, $subject, $bodytext, "From:" . $email);
	}
	
?>