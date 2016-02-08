<!DOCTYPE html>
<?php 
require_once ('../model/connect.php');
require_once ('up.php');

if (isset($_POST['product_id']) && (!empty($_POST['product_id'])))  {
  uploadProduct();
 // header("Refresh:0");
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    


    <title>Contact - Business Casual - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">  

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">  

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
    </head>

    <body>

        <div class="brand">Business Casual</div>
        <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                    <a class="navbar-brand" href="index.html">Business Casual</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="product.php">Products</a>
                        </li>
                        <li>
                            <a href="promotion.php">Promotion</a>
                        </li>
                        <li>
                            <a href="sold.php">Sold History</a>
                        </li>
                        <li>
                            <a href="order.php">Order</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

            </div>
            <!-- /.container -->
        </nav>


        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><strong>Show Products</strong>
                    </h2>
                    <hr>
                    <form role="form" method = "post">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    
                                           <?php

        
          require_once ('../model/connect.php');



          if ($conn) {
            $sql = "SELECT p.PRODUCTNO,p.PRODUCTNAME,p.TYPE,p.PRICE,s.AMOUNT,s.SHOPLOCATION,p.EXPDATE
                    FROM EMM_ZOO.PRODUCT as p,EMM_ZOO.SHOP_STOCK as s
                    WHERE s.PRODUCTNO=p.PRODUCTNO
                    ORDER BY p.PRODUCTNO";

            $stmt = dbQuery($conn,$sql);

            if($stmt == FALSE) {
               die('Critical error: '. db2_stmt_error($stmt));
          }

         
          echo("<thead>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Type</th>
              <th>Price</th>
              <th>Amount</th>
              <th>SHOP_LOCATION</th>
              <th>Expr</th>
              
            </tr>
          </thead>");
          echo("<tbody>");
          while ($row = dbFetchArray($conn,$stmt)) {
          echo "\t<tr>
            <td align=\"center\">$row[0]</td>
            <td align=\"center\">$row[1]</td>
            <td align=\"center\">$row[2]</td>
            <td align=\"center\">$row[3]</td>
            <td align=\"center\">$row[4]</td>
            <td align=\"center\">$row[5]</td>
            <td align=\"center\">$row[6]</td>
            
          </tr>\n";
          }
          echo("</tbody>");
          echo "</table>\n";
          db2_free_stmt($stmt);
          db2_close($conn);
          }
          else {
          echo "Connection failed" .db2_conn_errormsg($conn);
          }
      ?>
                            </table>                

                        </div>
                    </div>

                    <br> </br>
                    <hr>
                    <h2 class="intro-text text-center"><strong>Add Products</strong>
                    </h2>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>ProductID</label>
                            <input type="text" name="product_id" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>

                        

                        <div class="form-group col-lg-4">
                            <label>Expr : (put 9999-99-99 for no expire date )</label>
                            <input type="text" name="expr" placeholder ="yyyy-mm-dd" class="form-control">
                        </div>
                        
                        <div class="form-group col-lg-4">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control">
                        </div>
                        
                        <div class="form-group col-lg-4">
                                <label>Type</label>
                               <select name="type"  class="form-control" rows="5" style="width : 250px">
                                <option value="Food">Food</option>
                                <option value="Toy">Toy</option>
                                <option value="Ice-cream">Ice-cream</option>
                                <option value="Ohter">--Other--</option>
                        </select><br>
                            </div>

                        <div class="form-group col-lg-4">
                                <label>Location</label>
                               <select name="location"  class="form-control" rows="5" style="width : 250px">
                                <option value="shop1">SHOP1</option>
                                <option value="shop2">SHOP2</option>
                                <option value="shop3">SHOP3</option>
                                <option value="shop4">SHOP4</option>
                        </select><br>
                            </div>

                        <div class="clearfix"></div>

                        <div class="form-group col-lg-12">
                            
                            <button type="submit" class="btn btn-default">ADD</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>

<!-- /.container -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
