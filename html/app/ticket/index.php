<?php
require_once ('/var/www/html/app/library/function.php');

if(!isset($_SESSION['current_user_name']) && !isset($_COOKIE[$cookie_name])) {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>EMM TICKET</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
        <style>
            body {
                background-color: #FFF;
                width: 100%;
                margin: 0;
                position: absolute;
            }
            .box {
                margin: 0 auto;
                padding: 100px 220px; 
                font-size: 2rem;
                background-color: #FFF;
                color:black;
            }
            a, a:hover {
                text-decoration: none;
            }
            h1 {
                margin: auto;padding: 50px 0;
            }
            .btn {
                margin: auto; 
                width: 1280px;
            }            
            .one {
                background-color: #848482;
            }
            .one:hover {
                background-color: #64FBFF;
            }
            .two {
                background-color: #848482;
            }
            .two:hover {
                background-color:  #FF6EEB;
            }
            .three { 
                background-color: #848482;
            }
            .three:hover { 
                background-color: #B6B6B4;
            }
            .four {
                background-color: #848482;
            }
            .four:hover {
                background-color: #6CBB3C;
            }
        </style>
</head>
    <body>
            <h1 class="text-center">Emmaline Ticket Seller App</h1>
        <table align="center">
            <tr>
                <td>
                    <a href="GateTricket.php">
                        <div type = "button" class="box one ">Gate</div>
                    </a>
                </td>
                 <td>
                    <a href="transpotationIn-Out.php">
                        <div type = "button" class="box two">Transport</div>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="ShowList.php">
                        <div type = "button" class="box three">Animal Show</div>
                    </a>
                </td>
                <td>
                    <a href="TourTicket.php">
                        <div type = "button" class="box four">Tour</div>
                    </a>
                </td>
            </tr>
        </table>
    </body>
</html>