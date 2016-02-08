<!DOCTYPE html>
<html>
    <?php
    require_once ('../model/connect.php');
    ?>
    <head>
        <!-- Latest compiled and minified CSS -->
        <script src="jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel = "stylesheet" href="stlye1.css">
        <title>Transportation : Car's information</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/business-frontpage.css" rel="stylesheet">
    </head> 
    <body style="background-color:#FFFFCC">
        <div class="container">
            <div class="row">
                <center><h1 style="color:#CC99FF"><br>CAR'S INFORMATION</h1></center>
                <div class="col-lg-8 col-lg-offset-2" style="padding-top: 20px;padding-left: 60px; color:#8B0000">
                    <div class="table-responsive">
                        <table class="table">
                           <thead>
                            <?php
                                    require_once ('../model/connect.php');
                                    if ($conn) {
                                        $sql = "SELECT * FROM EMM_ZOO.CARS ORDER BY EMM_ZOO.CARS.CARTYPE;";
                                        $stmt = dbQuery($conn,$sql);
                                        if($stmt == FALSE) {
                                        die('Critical error: '. db2_stmt_error($stmt));
                                    }
                                    echo("<tr>
                                            <th>CARID</th>
                                            <th>LICENSE_PLATE </th>
                                            <th>TYPE</th>
                                            <th>AVAILABLE(YES/NO)</th>       
                                        </tr>
                                </thead>");
                                echo("<tbody>");
                                    while ($row = dbFetchArray($conn,$stmt)) {
                                    echo "<tr><br>
                                            <td align=\"center\">$row[0]</td>
                                            <td align=\"center\">$row[1]</td>
                                            <td align=\"center\">$row[2]</td>
                                            <td align=\"center\">$row[3]</td></tr>";
                                     }
                            db2_free_stmt($stmt);
                            db2_close($conn);
                            }
                            else {
                                echo "Connection failed" .db2_conn_errormsg($conn);
                            }
                    ?>
                  </tbody>
                </table>
            </div>
            <br><center>
            <a href="car_infoGcarID.php" onclick="window.history.back();" style:="" "padding-right:="" 70px" style="padding-right: 70px;"><button type="button" class="btn btn-default" style="width : 260px">Order by Type</button></a>
            </center><center>
            <a href="index.php" onclick="window.history.back();" style:="" "padding-right:="" 70px" style="padding-right: 70px;"><button type="button" class="btn btn-default" style="width : 260px">Back</button></a>
            </center>


        </form>
    </div>
</div>
</div>
</div>
</body>
</html>