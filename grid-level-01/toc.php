<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>/bkkt</title>
<style type="text/css" media="all">
body {padding: 1em 2em;}
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
echo "<thead><tr><th>Filename</th><th>Updated</th>";
echo "</thead>";
echo "<tbody>";

foreach ($files as $file) {
	echo "<tr>";
	echo "<td><a href=\"$file\">$file</a></td>";
	echo "<td><a href=\"$file\">" . time_elapsed_string(filemtime($file)) . "</a></td>";
	echo "</tr>\n";
}

echo "</tbody>";
echo "</table>";



function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}



?>

</body>
</html>
