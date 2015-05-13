<!DOCTYPE html>
<head>
	<title>Upload Multiple Images and Text Demo</title>
	<style>
		input {
			margin-bottom:10px;
		}
	</style>
</head>
<body>
<div style="width:360px; margin:0 auto;">
	<form action="upload.php" method="post" enctype="multipart/form-data" style="width:100%;">
		<fieldset>
			<legend>Upload files:</legend>
			Image #1: <input type="file" name="fileToUpload0" id="fileToUpload"> </br>
			Image #2: <input type="file" name="fileToUpload1" id="fileToUpload2"> <br/>
			Text #1: <input type="text" name="content[]" id="text1"> <br/>
			Text #2: <input type="text" name="content[]" id="text2"> <br/>
			<div style="text-align:center">
				<input type="submit" value="Submit" name="submit">
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>
