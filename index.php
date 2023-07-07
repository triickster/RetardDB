<!DOCTYPE html>
<html>
<head>
	<title>popbob foundation - retard DB</title>
	<script src="https://hcaptcha.com/1/api.js" async defer></script>
	<style>
:root {
  --background-color: #f5f5f5;
  --primary-color: #0078d7;
  --secondary-color: #999999;
  --font-color: #333333;
  --box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
  --border-color: #eaeaea;
}

body {
  margin: 0;
  padding: 0;
  font-family: Segoe UI, sans-serif;
  font-size: 16px;
  background-color: var(--background-color);
  color: var(--font-color);
}

header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 100;
  background-color: var(--primary-color);
  box-shadow: var(--box-shadow);
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 32px;
  height: 64px;
}

header h1 {
  margin: 0;
  font-size: 24px;
  font-weight: 600;
  color: white;
  line-height: 64px;
}

.close:hover {
    cursor: grab;
}
header button {
  background-color: transparent;
  border: none;
  color: white;
  font-size: 16px;
  font-weight: 600;
  padding: 8px 16px;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

header button:hover {
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 4px;
}
.container {
  margin-top: 96px;
  padding: 16px;
}
.table {
  width: 100%;
  margin-top: 16px;
  border-collapse: collapse;
}

.table th,
.table td {
  border: 1px solid var(--border-color);
  padding: 12px;
  text-align: left;
  font-weight: 400;
}

.table th {
  background-color: var(--background-color);
  color: var(--secondary-color);
  font-weight: 600;
  position: sticky;
  top: 0;
}

.table tr:hover {
  background-color: rgba(0, 0, 0, 0.05);
}
.form {
  max-width: 600px;
  margin: 0 auto;
  border: 1px solid var(--border-color);
  box-shadow: var(--box-shadow);
  background-color: white;
  padding: 35px;
  border-radius: 4px;
}

.form label {
  display: block;
  margin-bottom: 8px;
  font-weight: 600;
}

.form input[type="text"],
.form textarea {
  display: block;
  width: 100%;
  padding: 12px;
  border: 1px solid var(--border-color);
  border-radius: 4px;
  margin-bottom: 16px;
}



.form .file-upload {
  display: flex;
  align-items: center;
  margin-bottom: 16px;
}

.form .file-upload label {
  background-color: var(--primary-color);
  color: white;
  font-weight: 600;
  padding: 8px 16px;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.form .file-upload label:hover {
  background-color: rgba(0, 120, 215, 0.8);
}

.form .file-upload input[type="text"] {
  margin-left: 16px;
}

.form input[type="submit"] {
  background-color: var(--primary-color);
  border: none;
  color: white;
  font-size: 16px;
  font-weight: 600;
  padding: 12px 24px;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}
button {
      background-color: var(--primary-color);
  border: none;
  color: white;
  font-size: 16px;
  font-weight: 600;
  padding: 10px 15px;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}
.form input[type="submit"]:hover {
  background-color: rgba(0, 120, 215, 0.8);
}

.form {
    position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  width: 40%;
}

/* Search Styles */
.search {
  margin-top: 16px;
  padding: 8px;
  border: 1px solid var(--border-color);
  border-radius: 4px;
}

.search input[type="text"] {
  border: none;
  width: 100%;
  font-size: 16px;
  padding: 8px;
  color: var(--font-color);
}

.search button {
  background-color: var(--primary-color);
  border: none;
  color: white;
  padding: 8px 16px;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.search button:hover {
  background-color: rgba(0, 120, 215, 0.8);
}
	</style>
</head>
<body>
	<header>

	    	<button onclick="showForm()">Submit a retard</button>
	    	<h3 style="
    color:  white;
    display:  inline-block;
"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Trollface_non-free.png/220px-Trollface_non-free.png" style="display: inline-block;height: 30px;text-align: justify;vertical-align: text-top;"> database by popbob foundation  </h3>
		<h1 align=center>Retard DB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1> <!--i fix later -->
	
	</header>
	
	<div class="container">
	    <a href="./pedo" style="text-decoration:none;">
	        <!--
	    <button style="display: inline-block;">visit the pedo database instead</button> -->
	    
	    </a>
	    <p style="display: inline-block; font-size: 10px; font-family: monospace; float: right">the owner of this site does not endorse anything from these pages, as they are user-submitted</p>
	<!--	<input type="text" class="search" placeholder="Search...">
-->		
		<table class="table">
			<thead>
				<tr>
					<th>Image/PFP of Retard</th>
					<th>Description of Retard</th>
					<th>Discord ID to be aware of retard</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$data = file_get_contents('data.json');
					$data = json_decode($data, true);
					
					foreach($data as $item) {
						echo '<tr>';
						echo '<td><a href="'. $item['image'] .'"><img src="'. $item['image'] .'" width="100px"></a></td>';
						echo '<td>'. $item['description'] .'</td>';
						echo '<td><a href="https://discordapp.com/users/'. $item['discord_id'] .'" target="_blank">'. $item['discord_id'] .'</a></td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
	
	<div class="form" style="display: none;" >
	    		    					<a class="close" onclick="this.parentNode.style.display = 'none';" style="color: #ff0000;
    text-align: right;
    align-items: right;
    position: relative;
    margin: auto;
    float: right;">&#10006;</a>

		<form method="post" autocomplete="off" enctype="multipart/form-data" action="submitform.php"  onsubmit="return validateForm();">

			<label>Upload PFP/Image of Retard</label>
			<input type="file" name="image" id="image">
			
			<label onclick="alert('provide a description of what this retardnigger does for a living')">Description of Retard (e.g. does he larp/is he a pedo)</label>
			<textarea name="description" id="description" rows="4"></textarea>
			
			<label>Discord ID</label>
			<input type="text" name="discord_id" id="discord_id">
						<div class="h-captcha" data-sitekey=""></div>
			<input type="submit" value="Submit">

			<p id="cooldown-message" style="display:none;">Please wait 5 minutes before uploading again.</p>
		</form>
	</div>
	
	
	<script>
	  const form = document.querySelector('.form');
  const cooldownMessage = document.querySelector('#cooldown-message');
  let lastUploadTime = 0;
  
  function submitForm() {
    const now = Date.now();
    if (now - lastUploadTime > 300000) {
      lastUploadTime = now;
      form.submit();
    } else {
      cooldownMessage.style.display = 'block';
      setTimeout(function() {
        cooldownMessage.style.display = 'none';
      }, 5000);
    }
  }
  
		function showForm() {
			document.querySelector('.form').style.display = 'block';
		}
		
		function validateForm() {
			var image = document.getElementById("image").value;
			if (image == "") {
				alert("upload an image you retarded nigger");
				return false;
			}
			return true;
		}
	</script>
	<?php

	?>


</body>
</html>
