<?php

if (isset($_POST['uploadit'])) {
	$file = $_FILES['ufile']['tmp_name'];
	$fh = fopen($file, "r");
	$content = fgets($fh);
	fclose($fh);

	$content = file_get_contents($file);
	$conv_content = utf8_decode($content);

	header("Content-type: text/csv");
	header('Content-Disposition: attachment; filename="'.$_FILES['ufile']['name'].'"');
	header("Content-Length: ".strlen($conv_content));
	echo $conv_content;

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="sv-SE">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Jonas superkonverterare för UTF8-filer (Excel fix)</title>
</head>
<body>
<p>Välj den CSV-fil du vill konvertera:</p>
<form enctype="multipart/form-data" action="conv.php" method="post">

<input name="ufile" type="file" /><br />

<input type="submit" name="uploadit" value="Konvertera" />
</form>
<p>Du kommer få en fil tillbaka i webbläsaren, det är den konverterade filen. Öppna den i Microsoft Excel. På Mac måste du ange att källan är Windows-fil... </p>
</body>
</html>
