<!DOCTYPE html>
<?php 
require_once ('saleController.php');

if (isset($_POST['submit']) && $_POST['typeC'] != null) {
  updateTicket();
  header("Refresh:0");
}
?>
<script>
function numChild() {
    document.getElementById('TicketNumC').value = parseInt(document.getElementById('TicketNumC').value) + 1;
    calPrice()
}
function numChildD() {
    document.getElementById('TicketNumC').value = parseInt(document.getElementById('TicketNumC').value) - 1;
    calPrice()
}
function numAdult() {
    document.getElementById('TicketNumA').value = parseInt(document.getElementById('TicketNumA').value) + 1;
    calPrice()
}
function numAdultD() {
    document.getElementById('TicketNumA').value = parseInt(document.getElementById('TicketNumA').value) - 1;
    calPrice()
}
function numForeign() {
    document.getElementById('TicketNumF').value = parseInt(document.getElementById('TicketNumF').value) + 1;
    calPrice()
}
function numForeignD() {
    document.getElementById('TicketNumF').value = parseInt(document.getElementById('TicketNumF').value) - 1;
    calPrice()
}
function calPrice(){
    document.getElementById('cal').innerHTML = "Price is " +(parseInt(document.getElementById('TicketNumC').value)*50+parseInt(document.getElementById('TicketNumA').value)*100 + parseInt(document.getElementById('TicketNumF').value)*200);
}
</script>

<style>
    .button {
         background-color: #8FFAF9;
         width: 100%;
         margin: 0;
         position: absolute;
    }
</style>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>EMM PARKING</title>
        <link rel="stylesheet"        href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
</head>
    <body style="width: 1280px; margin: auto; background-color:8391EB">
        <div style="margin: auto; width: 1280px;">
            <h1 style="margin: auto;padding: 50px 0;" align="center">Gate Ticket</h1>
        </div>
        <form method="post" >
        <table align="center">
            <tr>
                <td>
                   <!-- <form name="children" method="post"> -->
                        <input name="typeC" type="hidden" id="type" class="button" value="Children">
                        <input type="button"  onclick="numChild()" name="submitC" value="children:50฿" style="background-color:8FFAF9; width:600px; height:250px;font-size:50px;"/>
                        <br> Number of ticket <input name="TicketNumC" type="text" id="TicketNumC" value = 0 size="35" >
                    <input type="button"  onclick="numChildD()"  value="Decrease by one"/>
                   <!-- </form> -->
                </td>
                 <td>
                   <!--  <form name="Adult" method="post"> -->
                        <input name="typeA" type="hidden" id="type" value="Adult">
                        <input type="button" onclick="numAdult()" name="submitA" value="Adult:100฿" style="background-color:D72A2A; width:600px; height:250px;font-size:50px;"/ >
                         <br> Number of ticket <input name="TicketNumA" type="text" id="TicketNumA" value = 0 size="35">
                     <input type="button"  onclick="numAdultD()"  value="Decrease by one"/>
                    <!-- </form> -->
                </td>
            </tr>
            <tr>
                <td>
                  <!--  <form name="Foreigner" method="post"> -->
                        <input name="typeF" type="hidden" id="type" value="Foreigner">
                        <input type="button" onclick="numForeign()" name="submitF" value="Foreigner:200฿" style="background-color:DBA2C6; width:600px; height:250px;font-size:50px;"/>
                        <br> Number of ticket <input name="TicketNumF" type="text" id="TicketNumF" value = 0 size="35">
                    <input type="button"  onclick="numForeignD()"  value="Decrease by one"/>
                  <!--  </form> -->
               <!-- </td>-->
                    <td>
                    <div align = "center">
            <p id = cal>Price is 0</p>
        </div>
                </td>
            </tr>
        </table>
            <div align = "center">
                <input type="submit" name="submit" value="submit" style="background-color:DBA2C6; width:250px; height:50px;font-size:20px;"/>
            </div>
            </form>
    <br>
        <a href="index.php" style="text-decoration: none;">
                        <button>Back</button>
         </a>
    </body>
</html>