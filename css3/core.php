<?php

if ($_SERVER["SERVER_NAME"] == 'mw') {
	echo "<!-- PHP " . phpversion() . "-->";
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
}

$here = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['PHP_SELF'];
$here = substr($here,0,strrpos($here,"/")+1);

function get_props() {
	global $here;
	if ($handle = opendir($here)) {
		while (false !== ($file = readdir($handle))) {
			if (substr($file,-5) == ".html" && substr($file,0,4) != "val-" && $file != " bare.html") {
				$prop[] = substr($file,0,-5);
			}
		}
		closedir($handle);
	}
	return $prop;
}

function get_vals() {
	global $here;
	if ($handle = opendir($here)) {
		while (false !== ($file = readdir($handle))) {
			if (substr($file,-5) == ".html" && substr($file,0,4) == "val-") {
				$prop[] = substr($file,0,-5);
			}
		}
		closedir($handle);
	}
	return $prop;
}

function get_prefix($agent=null) {
	global $debug;
	// Declare known browsers to look for
	$known = array('gecko', 'webkit', 'msie', 'opera');
	$agent = strtolower($agent ? $agent : $_SERVER['HTTP_USER_AGENT']);

	$prefix = '';
	if (!$debug) {
	if (substr_count($agent,'msie')) $prefix = "ms";
	if (substr_count($agent,'gecko')) $prefix = "moz";
	if (substr_count($agent,'webkit')) $prefix = "webkit";
	if (substr_count($agent,'opera')) $prefix = "o";
	}
	return $prefix;
}

?>