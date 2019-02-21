<?php
// this is what the webhook on Github calls to make a pull happen, apparently
$result = `git pull 2>&1`;
$test = shell_exec("whoami");

if (!isset($_POST['payload']) ) {
	echo $result;
	if ($result) echo "<pre>$result</pre>"; else echo "<p>Nothing happened.</p>";
	if ($test) echo "<pre>$test</pre>"; else echo "<p>I don't know who I am.</p>";
}
?>
