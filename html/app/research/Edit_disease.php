<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Disease</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>				
				
				<table style="width:100%">
                <div class="row">
				 <form method="post" action="Edit_disease_tool.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">				
					<tr></tr>
					<tr></tr>
					<tr><h2>Change disease</h2></tr>
					<tr><td><b>Disease(ID)</b></td> <td><input type="text" class='form-control' name="diseaseid"></td>
					<tr><td><b>Common name</b></td><td><input type="text" class='form-control' name="name"></td>
					<tr><td><b>Spreading period</b></td><td><input type="text" class='form-control' name="spread"></td>
					<tr><td><b>Symptom ID</b></td><td><input type="text" class='form-control' name="symid"></td>
					<tr><td><b>Blood diagnosis</b></td><td><input type="text" class='form-control' name="blood"></td>
					<tr><td><b>Skin damage</b></td><td><input type="text" class='form-control' name="skin"></td>
					<tr><td><b>Mucus</b></td><td><input type="text" class='form-control' name="mucus"> </td>
					<tr><td><b>Behaviour change</b></td><td><input type="text" class='form-control' name="behave"></td>
					<tr><td><b>Infection</b></td><td><input type="text" class='form-control' name="infect"></td>
					<tr><td><b>Main organ damage</b></td><td><input type="text" class='form-control' name="organ"></td>
                    <tr>
                     
                        <td>&nbsp;</td>
                        <td><button type="submit" class="btn btn-info">Add</button></td>
                      </form>
                    </tr>
                </div>
              </table>