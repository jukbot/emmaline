<!DOCTYPE html>
<?php 
require_once ('../model/connect.php');
require_once ('upOrder.php');

if (isset($_POST['product_id']) && (!empty($_POST['product_id'])))  {
  upOrder();
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

    <title>About - Business Casual - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
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

</head>

<body>

    <div class="brand">Zoo Shop</div>
    <div class="address-bar"> | give us your money | </div>

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
                    <<li>
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

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
				Products Ordered
			</h3>
			<table class="table table-bordered">
<?php

        
          require_once ('../model/connect.php');



          if ($conn) {
            $sql = "SELECT * FROM EMM_ZOO.PRODUCT;";

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
			<h3>
				Order
			</h3>
			<form class="form-horizontal" role="form" method="post">
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Product ID
					</label>
					<div class="col-sm-10">
						<input type="text" name="product_id" placeholder ="xxxx"  class="form-control" />
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Amount
					</label>
					<div class="col-sm-10">
						<input type="text" name="amount" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						price
					</label>
					<div class="col-sm-10">
						<input type="text" name="price" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Po No
					</label>
					<div class="col-sm-10">
						<input type="text" name="po_no" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Po Date
					</label>
					<div class="col-sm-10">
						<input type="text" name="po_date" placeholder ="yyyy-mm-dd" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Emp ID
					</label>
					<div class="col-sm-10">
						<input type="text" name="emp_id" placeholder ="xxxx" class="form-control"/>
					</div>
				</div><br /><br />
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Supplier ID
					</label>
					<div class="col-sm-10">
						<input type="text" name="supplier_id" placeholder ="xxxx" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Supplier Name
					</label>
					<div class="col-sm-10">
						<input type="text" name="supplier_name" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Contact
					</label>
					<div class="col-sm-10">
						<input type="text" name="contact" placeholder ="xxx-xxx-xxxx" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						First Name
					</label>
					<div class="col-sm-10">
						<input type="text" name="first_name" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Address
					</label>
					<div class="col-sm-10">
						<input type="text" name="address" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 
						<button type="submit" class="btn btn-default">
							Order
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
                </div>
                
                <div class="col-md-6">
                    
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p></p>
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
