<?php
require_once('/var/www/html/app/model/connect.php');
$conn = dbConnect();
if ($conn) {
    $sql  = "SELECT * FROM EMM_ZOO.PARKRESERVETOUR ORDER BY RESERVE_DATE ASC;";
    $stmt = dbQuery($conn, $sql);
    while ($row = dbFetchArray($conn, $stmt)) {
        print "\t<tr><td>$row[1]</td>
<td>$row[2]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>$row[3]</td>
<td>&nbsp;&nbsp;<a class='modal-trigger' href='#delete$row[0]'><i class='small material-icons'>delete</i></a></td>
<td><a class='modal-trigger' href='#edit$row[0]'><i class='small material-icons'>edit</i></a></td>
<td><a class='modal-trigger' href='#$row[0]'>View</a></td>
</tr>\n";
        
        // Modal Structure
        print "<div id='$row[0]' class='modal bottom-sheet'>";
        print "<div class='modal-content'>";
        print "<h4>Contact Information</h4>";
        print "<p>Email: $row[6]</p>";
        print "<p>Mobile: $row[3]</p>";
        print "</div>";
        print "<div class='modal-footer'>";
        print "<a href='#!' class='modal-action modal-close btn-flat'>Close</a>";
        print "</div>";
        print "</div>";
        
        // Edit Modal Structure
        print "<div id='edit$row[0]' class='modal bottom-sheet'>";
        print "<form method ='post' name='edit_reserve_form'>";
        print "<div class='modal-content'>";
        print "<h4>Edit Reservation</h4>";
        print "<div class='row'>";
        
        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[1]' name='edit_reserved_name' id='name' type='text' class='validate' maxlength='40' required/>";
        print "<label for='name'>Reserve name</label>";
        print "</div>";
        
        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>today</i>";
        print "<input type='date' value='$row[2]' name='edit_reserved_date' class='datepicker' required/>";
        print "</div>";
        
        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>add_location</i>";
        print "<input type='number' value='$row[5]' id='edit_reserved_amount' name='edit_reserved_amount' min='1' max='20' required/>";
        print "<label for='edit_reserved_amount'>Amount</label>";
        print "</div>";
        
        print "</div>"; // row
        print "</div>"; // modal-content
        
        print "<div class='modal-footer'>";
        print "<input type='hidden' value='$row[0]' name='update_id'>";
        print "<button href='#!' class='modal-action modal-close cyan darken-1 btn' type='submit' name='submit_edit_reserved'><i class='material-icons'>edit</i> Save</button>";
        print "</div>"; //modal-footer
        print "</form>";
        print "</div>"; //modal
        
        
        // Delete Modal Structure
        print " <div id='delete$row[0]' class='modal'>";
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
    db2_free_stmt($stmt);
} else {
    echo "Connection failed" . db2_conn_errormsg($conn);
}
?>