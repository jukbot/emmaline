<!DOCTYPE html>
<html>
  <head>
    <title>ANIMAL MANAGEMENT : Animal Tranferation</title>
    <link rel="stylesheet" href="css/menu.css">
      <script language="JavaScript" type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
    <script language="JavaScript" type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
    <script language="JavaScript" type="text/javascript" src="aaa.js"></script>
  </head>

<body background="image/truck.jpg">
  <img src="image/truck.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:auto;z-index:-1;'>
  <div id='cssmenu'>
    <ul>
      <li><a class="active" href="https://emmalinezoo.com">EMMALINE ZOO</a></li>
      <li><a href="https://emmalinezoo.com/app/animal/takecare.php#">Animal Management</a></li>
      <li><a href="https://emmalinezoo.com/app/animal/aniInfo.php">Animal Infomation</a></li>
      <li><a href="https://emmalinezoo.com/app/animal/tranfer.php#">Tranferation</a></li>
    </ul>
  </div>
  <div>
    <h1 style="color:GRAY">Animal tranferation : For searching, import or export animal from where</h1>
    <h3 style="color:GRAY"> TransportID :
    <input type="text" id="tran1" style="border-radius:25px;text-align:center;">

    <br> From location :
    <input type="text" id="tran2" style="border-radius:25px;text-align:center;">

    <br> To location :
    <input type="text" id="tran3" style="border-radius:25px;text-align:center;">

    <br> AnimalID :
    <input type="text" id="tran4" style="border-radius:25px;text-align:center;">

    <br> Name of animal :
    <input type="text" id="tran5" style="border-radius:25px;text-align:center;">

    <br> Name of staff :
    <input type="text" id="tran6" style="border-radius:25px;text-align:center;">
    <br>
        
    <button class="btnExample" type="submit" value="Submit"/>SUBMIT</button>
      <style>
        .btnExample {
         width:100px ;
         height:50px;
         color: white;
         background: red;
         font-size: 20px;
         font-weight: bold;
         border: 1px solid white;
         border-radius:25px
       }

        .btnExample:hover {
        color: red;
        background: yellow;
      }
      </style>
      </h3>
    
      <?php require_once ('../model/connect.php');

    if ($conn) {
      $sql = "SELECT t.transportationid, t.empid, e.firstname, t.animalid, a.animalname, t.from_location, t.to_location
        FROM EMM_ZOO.ANIMALTRANSFER as t, EMM_ZOO.EMPLOYEE as e, EMM_ZOO.ANIMAL as a
        WHERE a.animalid = t.animalid and e.empid = t.empid;";

        //print "SQL " .$sql;

      $stmt = dbQuery($conn,$sql);

      if($stmt == FALSE) {
    	   die('Critical error: '. db2_stmt_error($stmt));
    }

    echo("<table id='qqqq' role='grid'>\n");
    echo("<thead>
      <tr>
        <th>TRANSPORTATION ID</th>
        <th>EMPLOYEE ID</th>
        <th>NAME OF EMPLOYEE ID</th>
        <th>ANIMAL ID</th>
        <th>NAME OF ANIMAL</th>
        <th>FROM</th>
        <th>TO</th>
      </tr>
    </thead>");
    echo("<tbody>");
    while ($row = dbFetchArray($conn,$stmt)) {
    echo "\t<tr>
      <td>$row[0]</td>
      <td>$row[1]</td>
      <td>$row[2]</td>
      <td>$row[3]</td>
      <td>$row[4]</td>
      <td>$row[5]</td>
      <td>$row[6]</td>
    </tr>\n";
    }
    echo("</tbody>");
    echo "</table>\n";
    db2_free_stmt($stmt);
    dbClose($conn);
    }
    else {
    echo "Connection failed" .db2_conn_errormsg($conn);
    }
    ?>
  
        
  </div>
  </body>


</html>
