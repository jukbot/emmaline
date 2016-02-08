<?php 
require_once ('RantTran.php');

if (isset($_POST['submit']) && $_POST['type'] != null) {
  updateTicket();
  header("Refresh:0");
}
?>

<html>
    <head>
        <link rel="stylesheet"        href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
</head>
    <body style="width: 1280px; margin: auto; background-color:8391EB">
        <div style="margin: auto; width: 1280px;">
            <h1 style="margin: auto;padding: 50px 0;" align="center">Transprotation for Rent</h1>
        </div>
        <table align="center">
            <tr>
                <td>
                    <form name="bikecicle" method="post" action="#">
                        <input name="type" type="hidden" id="type" value="Bicycle">
                        <input name="price" type="hidden" id="price" value="40">
                        <input type="submit" name="submit" value="bikecicle:20฿" style="background-color:8FFAF9; width:600px; height:250px;font-size:50px;"/>
                    </form>
                </td>
                 <td>
                    <form name="Boat" method="post" action="#">
                        <input name="type" type="hidden" id="type" value="Boat">
                        <input name="price" type="hidden" id="price" value="50">
                        <input type="submit" name="submit" value="Boat:30฿" style="background-color:DBA2C6; width:600px; height:250px;font-size:50px;"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form name="Minibus" method="post" action="#">
                        <input name="type" type="hidden" id="type" value="Minibus">
                        <input name="price" type="hidden" id="price" value="2000">
                        <input type="submit" name="submit" value="Minibus:2000฿" style="background-color:D72A2A; width:600px; height:250px;font-size:50px;"/>
                    </form>
                </td>
            </tr>
        </table>
        <a href="index.php" style="text-decoration: none;">
                        <button>Back</button>
         </a>
    </body>
</html>