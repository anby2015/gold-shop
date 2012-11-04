<?php

$conn = @mysql_connect("localhost", "root", "") or die("Êý¾Ý¿âÁ´½Ó´íÎó");
mysql_select_db("gold_shop", $conn);

function htmtocode($content) {
	$content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}

?>
