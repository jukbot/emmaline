
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Example</title>
	<!-- This is CDN -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/normalize.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js" type="text/javascript"></script>
</head>
<body>

<?php

// include (dirname(__FILE__).'/app/model/connect.php');
require_once ('../model/connect.php');

echo 'PHP is working Juk!!!';

if ($conn) {
echo "<h2>Bank Customer Query on DB2 with F_cking PHP</h2>\n";
$sql = "SELECT * FROM EMM_USER.BANKCUSTOMER;";

// debug
print ("Connection status: ". $conn ."<br>");
print "Example query SQL " .$sql;
$stmt = dbQuery($conn,$sql);

echo "This is statement ID ".$stmt;

if($stmt == FALSE) {
	 die('Critical error: '. db2_stmt_error($stmt));
}

print("<table role='grid'>\n");
print("<thead><tr><th>CUSTID</th><th>FIRSTNAME</th><th>LASTNAME</th><th>INCOME</th><th>DOB</th><th>ADDRESS</th><th>CITY</th></tr></thead>");
while ($row = dbFetchArray($conn,$stmt)) {
print "\t<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>\n";
}
print "</table>\n";
db2_free_stmt($stmt);
dbClose($conn);
}
else {
echo "Connection failed" .db2_conn_errormsg($conn);
}
?>
</body>
</html>