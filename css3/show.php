<?php

include_once "./core.php";
$debug = 0;

$property = strip_tags($_GET['p']) ? $_GET['p']: "bare";
$url = $property;

$test = file_get_contents($property . ".html");
if(substr($property,0,4) == 'val-') {$value = substr($property,4);}
if (strrpos($property,"-")) {
	$dash = strrpos($property,"-");
	$trail = substr($property,$dash + 1);
	if (is_numeric($trail)) {
		$property = substr($property,0,$dash);
	}
}

$prefix = isset($_GET['-']) ? strip_tags($_GET['-']) : '';

if ($prefix) {
	$temp = explode("<body",$test);
	$check = preg_match("#\<\!--(.+?)--\>#",$temp[0],$extras);
	if ($check) {
		$properties = explode(" ",trim($extras[1]));
	} else {
		$properties = array();
	}
	array_unshift($properties,$property);
	foreach ($properties as $prop) {
		$temp[0] = str_replace($prop.":",$prefix.$prop.":",$temp[0]);
	}
	$test = join("<body",$temp);
	$pref = "&amp;-=$prefix";
} else $pref = '';

$files = get_props();
natcasesort($files);
$files = array_values($files);
for ($i = 0; $i < count($files); $i++) {
	if ($url == $files[$i]) {
		$prev = $files[$i-1];
		$next = $files[$i+1];
		break;
	}
}

$nav = "<ul id=\"nav\">\r";
$nav .= "<li id=\"i\">▲ <a href=\".\">Index</a></li>\r";
if (isset($prev)) $nav .= "<li>◀ <a href=\"show.php?p=$prev$pref\">$prefix$prev</a></li>\r";
if (!isset($prefix)) {
	$nav .= "<li><a href=\"show.php?p=$url\">$url</a></li>";
} else {
	$pre = get_prefix();
	$nav .= "<li><a href=\"show.php?p=$url&amp;-=-$pre-\">-$pre-$url</a></li>";	
}
if (isset($next)) $nav .= "<li><a href=\"show.php?p=$next$pref\">$prefix$next</a> ►</li>\r";
$nav .= "<li id=\"r\"><a href=\"$url.html\">‘raw’ file</a> ▼</li>";
$nav .= "</ul>\r";

$test = str_replace("</body>",$nav."</body>",$test);

echo $test;

?>