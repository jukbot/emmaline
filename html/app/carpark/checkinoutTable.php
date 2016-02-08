<?php
require_once('/var/www/html/app/model/connect.php');
$conn = dbConnect();
if ($conn) {
    $sql  = "SELECT * FROM EMM_ZOO.PARKCHECKINOUT ORDER BY CHECKIN ASC;";
    $stmt = dbQuery($conn, $sql);
    while ($row = dbFetchArray($conn, $stmt)) {
        print "\t<tr><td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
<td>$row[3]</td>
<td>$row[4]</td>
<td><a class='modal-trigger' href='#checkout$row[0]'>Checkout</a></td>
</tr>\n";

        // Delete Modal Structure
        print " <div id='checkout$row[0]' class='modal'>";
        print " <div class='modal-content'>";
        print " <h4>Confirm Checkout</h4>";
        print " <p>No fee charge</p>";
        print " </div>";
        print " <div class='modal-footer'>";
        print " <form action='checkout.php' method ='get'>";
        print " <input type='hidden' value='$row[0]' name='ticketID'>";
        print " <button class='modal-action modal-close btn blue darken-3 waves-effect waves-light' type='submit'>Confirm</button>";
        print " &nbsp;&nbsp;&nbsp;<a href='#!' class='modal-action modal-close btn-flat waves-effect waves-light'>Close</a>";
        print " </form></div></div>";
    }
    db2_free_stmt($stmt);
    db2_close($conn);
} else {
    echo "Connection failed" . db2_conn_errormsg($conn);
}
?>