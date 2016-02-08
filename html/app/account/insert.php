<?php
require_once ('/var/www/html/app/model/connect.php');
/*require_once ('addShow.php');
require_once ('updateShow.php');

if(isset($_POST['submit'])){
    addShow();
    //header("Location:Add.php");
}
if(isset($_POST['update'])){
    updateShow();
    //header("Location:Add.php");
}*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>INSERT ZOOSHOP</h2>
  <form role="form" method="post" action ="addShow.php">
    <div class="form-group">
      <label for="email">SHOPEXPENSE_ID:</label>
      <input type="text" name= "shopexid" class="form-control" id="a"  required><br>
      <label for="email">DATES:</label>
      <input type="text" name= "date" class="form-control" id="b"  required><br>
      <label for="email">SHOPEXPENSE_LIST:</label>
      <input type="text" name= "shopexlist" class="form-control" id="c"  required><br>
      <label for="email">PRICE:</label>
      <input type="text" name= "price" class="form-control" id="d"  required><br>
      <label for="email">RESPONPERSONID:</label>
      <input type="text" name= "responid" class="form-control" id="e" required> <br>
  </div>

    
    <button type="submit" name ="submit" class="btn btn-default">INSERT</button>
  </form>
</div>






<div class="container">
  <h2>UPDATE ZOOSHOP</h2>
  <form role="form" method="post" action ="updateShow.php">
    <div class="form-group">

      <label for="email">RESPONPERSONID:</label>
      <input type="text" name= "responid" class="form-control" id="e" required> <br>
       <label for="email">SHOPEXPENSE_ID:</label>
      <input type="text" name= "shopexid" class="form-control" id="e" required> <br>
  </div>


    <button type="submit" name ="nameNa" class="btn btn-default">UPDATE</button>
  </form>
</div>

<div class="container">
  <h2>DELETE</h2>
  <form role="form" method="post" action ="deleteShow.php">
    <div class="form-group">

       <label for="email">SHOPEXPENSE_ID:</label>
      <input type="text" name= "shopexid" class="form-control" id="e" required> <br>
  </div>


    <button type="submit" name ="nameNa" class="btn btn-default">DELETE</button>
  </form>
</div>

</body>
</html>
