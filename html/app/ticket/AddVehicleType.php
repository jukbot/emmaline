<?php 
require_once ('/var/www/html/app/model/connect.php');
if (isset($_POST['submit']) && $_POST['type'] != null && $_POST['price'] != null) {
        // start connect db
    $conn = dbConnect();  
    if ($conn) {
        
     $type = $_POST['type'];
     $price = $_POST['price'];
        $insert = "INSERT INTO EMM_ZOO.TICKETTRANS_TYPE (TRANSTYPE_ID, TRANSTYPE_NAME, TRANSTYPE_PRICE) VALUES (DEFAULT, '$type', $price);";

        $rc = db2_exec($conn, $insert);

        if ($rc) {
          echo "<script>alert('1 $type has rent');window.location='TranspotationTricket.php';</script>";
        }

        else { // If statement is error why see the code
            // die('Critical error:' . db2_stmt_error($stml));
        }
        // finish all query statement      
        db2_close($conn);
    }
    else {
       echo db2_conn_errormsg($conn);
    } 
  
  //header("Refresh:0");
}
?>

<html>
    <head>
        <link rel="stylesheet"        href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
</head>
    <body style="width: 1280px; margin: auto; background-color:8391EB">
        <div style="margin: auto; width: 1280px;">
            <h1 style="margin: auto;padding: 50px 0;" align="center">Add Type of Transporation</h1>
        </div>
        <form method = "post">
        <table align="center">
            <tr>
                <td>
                        <input name="type" type="text" id="type" >
                        <br>
                        <input name="price" type="number" id="price" value= 0>
                </td>
            </tr>
 
        </table>
            <div align = "center">
            <input type="submit" name="submit" value="submit" style="background-color:DBA2C6; width:250px; height:50px;font-size:25px;"/>
            </div>
        </form>
        <br>
        <a href="index.php" style="text-decoration: none;">
                        <button>Back</button>
         </a>
    </body>
</html>