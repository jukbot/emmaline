<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Order Food</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=no">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        
    </head>
    <body>
    <center>
        <nav class="white" role="navigation">
        <div class="nav-wrapper container">
          <ul class="right hide-on-med-and-down">
            <li class=" waves-effect waves-light"><a href="index.php">Menu</a></li>
            <li><form method="post" name="logout"><button class="btn-flat" type="submit" name="submit">Logout</button></form></li>    
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li class=" waves-effect waves-light"><a href="index.php">Menu</a></li>
              <li><form method="post" name="logout"><button class="btn-flat" type="submit" name="submit">Logout</button></form></li>    
          </ul>
        </nav>
            <h1>Suplied Food Order</h1>

          <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="food_name" type="text" class="validate">
                        <label for="food_name">Food Name</label>
                    </div>
                    <div class="input-field col s6">
                        <select>
                          <option value="" disabled selected>Select Food Type</option>
                          <option value="1">Meat</option>
                          <option value="2">Fish</option>
                          <option value="3">Vegetable</option>
                          <option value="4">Fruit</option>
                        </select>
                        <label>Food Type</label>
                    </div>
                </div>
                
                <div class="input-field col s6">
                    <input id="amount" type="text" class="validate">
                    <label for="amount">Amount</label>
                </div>

                <div class="input-field col s6">
                    <input id="cost" type="text" class="validate">
                    <label for="cost">Cost</label>
                </div>

                <div class="row center">
                    <button class="btn waves-effect waves-light" type="submit" name="submit_order">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
          </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="application/javascript"></script>
    <script src="js/materialize.js" type="application/javascript"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
    
    $('select').material_select();
    }); 
</script>
    </body>
</html>
