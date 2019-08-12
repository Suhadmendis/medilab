<html>
<body>

<form action="after_upload.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file">
<input type="hidden" name="cou" id="cou" value="<?php echo $_GET["cou"]; ?>">

<input type="hidden" name="txt_passno" id="txt_passno">

<script language="JavaScript">
	document.getElementById("txt_passno").value =opener.document.form1.txt_passno.value;
</script>
<br>
<input type="submit" name="submit" value="Upload Image">
</form>

</body>
</html> 