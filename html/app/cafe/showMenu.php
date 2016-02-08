<?php
    require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.CAFE_MENU, EMM_ZOO.CAFE_SHOP WHERE EMM_ZOO.CAFE_MENU.MENUID = EMM_ZOO.CAFE_SHOP.SHOPID ORDER BY MENUID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            print "<tr>";
            print "<th>Menu No.</th>";
            print "<th>Name</th>";
            print "<th>Category</th>";
            print "<th>Price/th>";
            print "<th>Shop No.</th>";
            print "<th>Shop Name</th>";
            print "<th>Edit</th>";
            print "<th>Delete</th>";
            print "</tr>";
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>".$row['MENUID']."</td><td>".$row['NAME']."</td><td>".$row['CATEGORY']."</td><td>".$row['PRICE']."</td><td>".$row['SHOPID']."</td><td>".$row['SHOPNAME']."</td><td><a onclick=\"return editMenu(".$row['MENUID'].");\">Edit</a></td><td><a onclick=\"return delMenu(".$row['MENUID'].");\">Delete</a></td></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
    	echo db2_conn_errormsg($conn);
    }
?>
