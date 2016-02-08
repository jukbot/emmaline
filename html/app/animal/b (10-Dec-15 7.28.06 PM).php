<html>
  <head>
    <title>ANIMAL MANAGEMENT : animal information</title>
    <script language="JavaScript" type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">


    <script language="JavaScript" type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
    <script language="JavaScript" type="text/javascript" src="aaa.js"></script>

  </head>

<body>
  <?php
  require_once ('../model/connect.php');

  if ($conn) {
  $sql = "SELECT ANIMALNAME, ANIMALID FROM EMM_ZOO.ANIMAL;";
  $stmt = dbQuery($conn,$sql);

  if($stmt == FALSE) {
   die('Critical error: '.db2_stmt_error($stmt));
  }

  echo("<br> <select>\n");
  while ($row = dbFetchArray($conn,$stmt)) {
  echo "\t
    <option value='$row[0]'>$row[1]</option>\n";
  }
  echo "</select>\n";

    // include (dirname(__FILE__).'/app/model/connect.php');

      $sql = "SELECT speciesid, speciesname FROM EMM_ZOO.BIOINFO;";

      print "SQL " .$sql;

      $stmt = dbQuery($conn,$sql);
      if($stmt == FALSE) {
    	   die('Statement error: '. db2_stmt_error($stmt));
      }

      echo("<br> <select>\n");
      while ($row = dbFetchArray($conn,$stmt)) {
        echo "\t
          <option value='$row[0]'>$row[1]</option>
        \n";
      }
      echo "</select>\n";
      db2_free_stmt($stmt);
      db2_close($conn);

    } else {
      echo "Connection failed" .db2_conn_errormsg($conn);
    }


// Upload Picture File Funciton
if(isset($_REQUEST['submit'])) {

  $target_dir = "upload/"; // folder name path to upload here
  $uploadOk = 1; // upload status tracking
  $filename = $_FILES["imgfile"]["name"];
  $target_file = $target_dir . basename($_FILES["imgfile"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imgfile"]["tmp_name"]);
    if($check !== false) {
        echo "File type:" . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Error: This file is not an image type.";
        $uploadOk = 0;
    }
}

     // Check file size
    if($_FILES["imgfile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files  are allowed.";
    $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Upload failed.";
    // if everything is ok, try to upload file
    }
    else {
    if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)) {
        echo "<br>The file ". basename( $_FILES["imgfile"]["name"]). " uploaded successfully.
        <a href='upload/$filename'>Click here</a> to view the uploaded image";
        //
    } else {
        echo "Sorry, there was an error uploading your file.";
        // debug path upload file
        var_dump($_FILES["imgfile"]);
      }
    }
}

else
{
?>
<form method="post" enctype="multipart/form-data">
File name:<input type="file" name="imgfile"><br>
<input type="submit" name="submit" value="Upload">
</form>
<?php
}
?>
  </body>
</html>
