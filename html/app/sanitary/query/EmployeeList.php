<?php
require_once ('/var/www/html/app/model/connect.php');
$conn = dbConnect();
if ($conn) {
$sql = "SELECT * FROM EMM_ZOO.EMPLOYEE WHERE JOBID = 17 ORDER BY EMPID ASC;";
$stmt = dbQuery($conn,$sql);
while ($row = dbFetchArray($conn,$stmt)) {
print "\t<tr><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td><td>$row[5]</td>
<td>&nbsp;&nbsp;<a class='modal-trigger' href='#delete$row[0]'><i class='small material-icons'>delete</i></a></td>
<td><a class='modal-trigger' href='#edit$row[0]'><i class='small material-icons'>edit</i></a></td></tr>\n";

// Edit Modal Structure
        print "<div id='edit$row[0]' class='modal bottom-sheet'>";
        print "<form method ='post' name='edit_emp_form'>";
        print "<div class='modal-content'>";
        print "<h4>Edit Employee Info</h4>";
        print "<div class='row'>";
        
        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[1]' name='edit_jobid' id='name' type='text' class='validate' maxlength='4' required/>";
        print "<label for='name'>Job ID</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[2]' name='edit_firstname' id='name' type='text' class='validate' maxlength='30' required/>";
        print "<label for='name'>First Name</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[3]' name='edit_lastname' id='name' type='text' class='validate' maxlength='30' required/>";
        print "<label for='name'>Last Name</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[4]' name='edit_birthdate' id='name' type='date' class='validate' required/>";
        print "<label for='name'>Birth Date</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[5]' name='edit_sex' id='name' type='text' class='validate' maxlength='1' required/>";
        print "<label for='name'>Sex</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[6]' name='edit_nationality' id='name' type='text' class='validate' maxlength='30' required/>";
        print "<label for='name'>Nationality</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[7]' name='edit_hiredate' id='name' type='date' class='validate' required/>";
        print "<label for='name'>Hire Date</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[8]' name='edit_address' id='name' type='text' class='validate' maxlength='30' required/>";
        print "<label for='name'>Address</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[9]' name='edit_email' id='name' type='email' class='validate' maxlength='30' required/>";
        print "<label for='name'>Email</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[10]' name='edit_phone' id='name' type='text' class='validate' maxlength='30' required/>";
        print "<label for='name'>Phone</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[11]' name='edit_salary' id='name' type='text' class='validate' maxlength='10' required/>";
        print "<label for='name'>Salary</label>";
        print "</div>";

        print "<div class='input-field col s12 m12'>";
        print "<i class='material-icons prefix'>account_box</i>";
        print "<input value='$row[12]' name='edit_bonus' id='name' type='text' class='validate' maxlength='10' required/>";
        print "<label for='name'>Bonus</label>";
        print "</div>";

        
        print "</div>"; // row
        print "</div>"; // modal-content
        
        print "<div class='modal-footer'>";
        print "<input type='hidden' value='$row[0]' name='update_empid'>";
        print "<button href='#!' class='modal-action modal-close cyan darken-1 btn' type='submit' name='submit_edit_emp'><i class='material-icons'>edit</i> Save</button>";
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
        print " <form action='deleteEmp.php' method ='get'>";
        print " <input type='hidden' value='$row[0]' name='delete_id'>";
        print " <button class='modal-action modal-close btn red darken-3 waves-effect waves-light' type='submit' name='action_delete'>Delete</button>";
        print " &nbsp;&nbsp;&nbsp;<a href='#!' class='modal-action modal-close btn-flat waves-effect waves-light'>Close</a>";
        print " </form></div></div>";
}
db2_free_stmt($stmt);
db2_close($conn);
}
else {
echo "Connection failed" .db2_conn_errormsg($conn);
}
?>