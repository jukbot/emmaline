<!DOCTYPE html>
<?php
require_once ('addUselog.php');
require_once ('/var/www/html/app/library/function.php');
if (isset($_POST['submit']) && (!empty($_POST['equipid']))) {
insertUselog();

//header('Location:reserved.php');
//exit();
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADD USING EQUIPMENT</title>
    <link rel="stylesheet" href="css/style_cn.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  </head>
  <body>
    <div class="menu-bar" align="center">
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="sani_emp.php">EMPLOYEE</a></li>
        <li><a href="sani_equip.php">EQUIPMENTS</a></li>
        <li><a href="sani_garbage.php">GARBAGE COLLECTOR</a></li>
      </ul>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3 class="active">
          Add Using Equipment
          </h3>
          <div class="row">
            <nav class="search-bar">
              <div class="nav-wrapper">
                <form method="post" accept-charset="utf-8">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                        <form role="form" method="post" accept-charset="utf-8">
                          <div class="form-group">
                            
                            <label for="equipid">
                              Equipment ID
                            </label>
                            <input type="text" placeholder="80xx" class="form-control" name="equipid" />
                          </div>
                          
                            <div class="form-group">
                              
                              <label for="equipname">
                                Equipment Name
                              </label>
                              <input type="text" class="form-control" name="equipname" />
                            </div>

                            <div class="form-group">
                              
                              <label for="empid">
                                Employee ID
                              </label>
                              <input type="text" class="form-control" name="empid" />
                            </div>
                            
                            <div class="form-group">
                              
                              <label for="zoneid">
                                WorkzoneID
                              </label>
                              <input type="text" class="form-control" name="zoneid" />
                            </div>
                            
                            <div class="form-group">
                              
                              <label for="borrowdate">
                                BorrowDate
                              </label>
                              <input type="date" class="form-control" name="borrowdate" />
                            </div>
                            
                            <div class="form-group">
                              
                              <label for="returndate">
                                ReturnDate
                              </label>
                              <input type="date" class="form-control" name="returndate" />
                            </div>
                  
                              <div class="form-group">
                              <button type="submit" class="btn btn-default" id = "submit" name = "submit">
                              Submit
                              </button>
                            </form>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
          </div>
        </div>
      </body>
    </html>