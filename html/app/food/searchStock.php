<?php
require_once ('/var/www/html/app/model/connect.php');
require_once ('/var/www/html/app/library/function.php');

$conn = dbConnect();
if ($conn) {
$sql = "SELECT * FROM EMM_ZOO.FM_STOCK ORDER BY FOODID;";
$stmt = dbQuery($conn,$sql);
$count = 0;
while ($row = dbFetchArray($conn,$stmt)) {
	$count++;
	print "\t<tr><td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td>$row[4]</td>
	<td><button data-target='order$row[0]' class='waves-effect waves-light btn modal-trigger'>Order</button></td>
	<td><button data-target='ex$row[0]' class='waves-effect waves-light btn modal-trigger'>EXPORT</button></td>
	<td><button data-target='de$row[0]' class='waves-effect waves-light btn modal-trigger'>Delete</button></td>
	</tr>\n";

	// Order food Structure

	print "<div id='order$row[0]' class='modal modal-fixed-footer'>";
	print "<form method ='post' name='order_food_form'>";
   print "<div class='modal-content'>";
   print "<h4>Order$row[0]</h4>";
   print "<div class='row'>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='$row[0]' name='food_id' id='food_id' type='text' class='validate' readonly/>";
	print "<label for='food_id'>FOOD ID</label></div>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='$row[1]' name='food_name' id='food_name' type='text' class='validate' readonly/>";
	print "<label for='food_name'>FOOD NAME</label></div>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='$row[2]' name='food_type' id='food_type' type='text' class='validate' readonly/>";
	print "<label for='food_type'>FOOD TYPE</label></div>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='' name='add_amount' id='amount' type='number' min='1' class='validate'/ required>";
	print "<label for='add_amount'>Amount</label></div>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='$row[4]' name='price_per' id='price_per' type='number' class='validate' readonly/>";
	print "<label for='food_id'>PricePerAmount</label></div>";
	print "</div></div>"; //row modal-content

	print "<div class='modal-footer'>";
	print "<button href='#!' class='modal-action modal-close waves-effect waves-green btn' type='submit' name='order'>Order</button>";
	print "</div></form></div>";

	// Export food Structure
	print "<div id='ex$row[0]' class='modal modal-fixed-footer'>";
	print "<form method ='post' name='export_form'>";
	print "<div class='modal-content'>";
	print "<h4>Export $row[1]</h4>";
	print "<div class='row'>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='$row[0]' name='food_id2' id='food_id2' type='text' class='validate' readonly/>";
	print "<label for='food_id2'>FOOD ID</label></div>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='$row[1]' name='food_name2' id='food_name2' type='text' class='validate' readonly/>";
	print "<label for='food_name2'>FOOD NAME</label></div>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='$row[2]' name='food_type2' id='food_type2' type='text' class='validate' readonly/>";
	print "<label for='food_type2'>FOOD TYPE</label></div>";

	print "<div class='input-field col s12 m12'>";
	print "<input value='' name='out_amount' id='out_amount' type='number' min='1' class='validate'/>";
	print "<label for='out_amount'>Export Amount</label></div>";
	print "</div></div>";

	print "<div class='modal-footer'>";
	print "<button href='#!' class='modal-action modal-close cyan darken-1 btn' type='submit' name='export'>Export</button>";
	print "</div></form></div>";

	//delete
		 print " <div id='de$row[0]' class='modal'>";
        print " <div class='modal-content'>";
        print " <h4>Delete Confirm</h4>";
        print " <p>Are you sure do you want do delete?</p>";
        print " </div>";
        print " <div class='modal-footer'>";
        print " <form action='delete.php' method ='get'>";
        print " <input type='hidden' value='$row[0]' name='delete_id'>";
        print " <button class='modal-action modal-close btn red darken-3 waves-effect waves-light' type='submit'>Delete</button>";
        print " &nbsp;&nbsp;&nbsp;<a href='#!' class='modal-action modal-close btn-flat waves-effect waves-light'>Close</a>";
        print " </form></div></div>";
	          
	}
if($count == 0) {
	print "\t<tr><td colspan='8' class='center brown-text'>
	No food found</tr>\n";
	}

db2_free_stmt($stmt);
db2_close($conn);
}

?>
