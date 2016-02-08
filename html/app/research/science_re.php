<!DOCTYPE html>
<!-- saved from url=(0057)https://emmalinezoo.com/app/research/science_re.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Researcher</title>
     <script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:1449923503,byc:1,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"0a40ced6cd9fc5bd9de45f30356dc812",petok:"14274430af293d5c7c3a8a917ec10a407537dfb1-1449931596-1800",zone:"emmalinezoo.com",rocket:"a",apps:{},sha2test:0}];document.write('<script type="text/javascript" src="//ajax.cloudflare.com/cdn-cgi/nexp/dok3v=38857570ac/cloudflare.min.js"><'+'\/script>');}}catch(e){};
//]]>
</script><script type="text/javascript" src="./Researcher_files/cloudflare.min.js"></script><style type="text/css">.cf-hidden { display: none; } .cf-invisible { visibility: hidden; }</style><script data-module="cloudflare/rocket" id="cfjs_block_e319b2f5ce" onload="CloudFlare.__cfjs_block_e319b2f5ce_load()" onerror="CloudFlare.__cfjs_block_e319b2f5ce_error()" onreadystatechange="CloudFlare.__cfjs_block_e319b2f5ce_readystatechange()" type="text/javascript" src="./Researcher_files/rocket.js"></script>
<link rel="stylesheet" href="./Researcher_files/bootstrap.min.css">
    <link rel="stylesheet" href="./Researcher_files/style.css">
  </head>
	
      <!-- ZONE -->
	<body><h2>Animal Character</h2>
            <div class="modal-body">
              <div class="row">
					</div><table class="table table-striped order-table">
                <thead>
                  <tr>
					<!-- Name of columns on the screen -->
                    <th>PubmedID</th>
                    <th>Title</th>
                     <th>year</th>
					<th>Author</th>
					<th>Journal</th>
                    <th>ResearchType</th>
					<th>SpeciesID</th>
                  </tr>
                </thead>
                <tbody id="myTable">
				
				<?php
					$sql="select EMM_ZOO.pubmedreferences.pubmedid, title, year, author, journal, research_type, EMM_ZOO.behavcharacref.species
							from EMM_ZOO.pubmedreferences, EMM_ZOO.behavcharacref
							where EMM_ZOO.behavcharacref.pubmedid = EMM_ZOO.pubmedreferences.pubmedid";
				?>
				
                <tr><td>1001</td><td>Virology for Animal</td><td>2001</td><td>J.K.</td><td>Pathogenesis</td><td>Pathogenesis</td><td>1</td><td><form><button type="submit" name="edit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></form></td><td><form method="POST" action="https://emmalinezoo.com/app/research/science_re.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)"> <input type="hidden" value="10001" name="PubmedID"><input type="hidden" value="1" name="SpeciesID">
									<button type="submit" name="delete" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove"></span></button></form></td></tr><tr><td>10002</td><td>Bacteria in animal</td><td>2007</td><td>Zheng. L.</td><td>Bacteria and Pathogenesis</td><td>Pathogenesis</td><td>1</td><td><form><button type="submit" name="edit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></form></td><td><form method="POST" action="https://emmalinezoo.com/app/research/science_re.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)"> <input type="hidden" value="10002" name="EMPID"><input type="hidden" value="Virology for Animal" name="Title">
									<button type="submit" name="delete" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove"></span></button></form></td></tr><tr><td>10003</td><td>Clinical for Animal</td><td>2014</td><td>Den. H.</td><td>Animal</td><td>Pathogenesis</td><td>3</td><td><form><button type="submit" name="edit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></form></td><td><form method="POST" action="https://emmalinezoo.com/app/research/science_re.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)"> <input type="hidden" value="10003" name="PubmedID"><input type="hidden" value="Bacteria in animal" name="Title">
									<button type="submit" name="delete" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove"></span></button></form></td></tr>                </tbody>
				
				<tbody id="myTable">
                <tr></tr>
					<tr><tr>
                      <form method="post" action="https://emmalinezoo.com/app/research/addEmpAnimalRes.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)"></form>
                    </tr>
					<tr>
						<label>Add PubmedID</label>
						<input name="PubmedID" id="PubmedID" type="text" required/>
						<br><br>
						<label>Add Title</label>
						<input name="Title" id="Title" type="text" required/>
						<br><br>
						<label>Add year</label>
						<input name="year" id="year" type="text" required/>
						<br><br>
						<label>Add Author</label>
						<input name="Author" id="Author" type="text" required/>
						<br><br>
						<label>Add Journal</label>
						<input name="Journal" id="Journal" type="text" required/>
						<br><br>
						<td>&nbsp;</td>
                        <td><button type="submit" class="btn btn-info">Add</button></td>
					</tr>
              </tbody></table>
              <div class="text-center">
</div></div></body></html>