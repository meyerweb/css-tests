<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>/bkkt</title>
<style type="text/css" media="all">
.hide_filter {display: none;}
form {padding-top: 0.5em;}
table {border-collapse: separate; border-spacing: 0; margin-top: 1em;}
thead th {border-bottom: 1px solid silver;}
tbody td a {text-decoration: none; padding: 0.25em;}
th, td {padding: 0.2em 0.25em; text-align: left;}
td + td, th + th {text-align: right;}
td + td {font-size: smaller;}
</style>
</head>
<body>

<?php

$root = $_SERVER["DOCUMENT_ROOT"];

if ($handle = opendir("$root/eric/css/tests/grid-level-01")) {
	while (false !== ($file = readdir($handle))) {
		if ( substr($file,-5) == ".html")
		{
			$files[] = $file;
		}
	}
	closedir($handle);
}

natcasesort($files);

echo "<table>";
echo "<thead><tr><th>Filename</th>";
echo "</thead>";
echo "<tbody>";

foreach ($files as $file) {
	echo "<tr>";
	echo "<td><a href=\"$file\">$file</a></td>";
	echo "</tr>\n";
}

echo "</tbody>";
echo "</table>";

?>

</body>
</html>
