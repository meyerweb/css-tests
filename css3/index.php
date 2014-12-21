<?php
$inc = $_SERVER['DOCUMENT_ROOT'] . '/inc/';
?>
<!DOCTYPE html>
<html>
<head>
<title>CSS3 tests: index</title>
<?php include($inc . "head.html"); ?>
<style type="text/css" media="all">
table {margin: 1em; border-collapse: collapse;}
th {text-align: left;}
th, td {padding: 0.25em 1.25em 0.1em 1.25em;}
td {border-bottom: 1px solid silver;}
tr:first-child td {border-top: 1px solid silver;}
</style>
</head>
<body id="www-meyerweb-com" class="css">
<?php include($inc . "page-top.html"); ?>

<h2>CSS3 Tests</h2>
<p>
<strong>NOTE:</strong> this is a personal test suite and is neither meant to be fully comprehensive nor conform to the latest best practices in testing.  It works for me and that's really it was ever intended to do.  Reports of errors and inaccuracies in the tests themselves are <a href="mailto:eric@meyerweb.com?subject=CSS3%20tests%20problem">always welcome</a>.
</p>
<p>
<em><strong>WARNING:</strong></em> the URIs within this test suite <strong>are NOT guaranteed <a href="http://www.w3.org/Provider/Style/URI">to be cool</a></strong>, though the URI of <em>this</em> page will remain cool.  Bookmark or link individual tests at your own risk.
</p>

<?php

include_once "./core.php";
$debug = 0;
$files = get_props();
natcasesort($files);
//$files = array_reverse($files);
echo "<table>\r";
echo "<thead><tr><th>Property</th><th>(prefixed)</th></tr></thead>";
foreach ($files as $prop) {
	echo "<tr>";
	echo "<td><a href=\"show.php?p=$prop\">$prop</a></td>";
	if ($p = '-'.get_prefix().'-') {
		echo "<td><a href=\"show.php?p=$prop&amp;-=$p\">" . $p . "$prop</a></td>";
	}
	echo "</tr>\r";
}

echo "</table>\r";

?>

<?php include($inc . "page-end.html"); ?>
</body>
</html>
