<?php
	require_once('conn.php');
	$id = $_GET['id'];
	$reply = $_POST['reply'];
	$SQL="update guest_book set reply='".$reply."',reply_time=CURRENT_TIMESTAMP where id=".$id;
	//echo $SQL;

	$query=mysql_query($SQL);
	mysql_fetch_array($query);
	echo "Ìí¼Ó³É¹¦";
	echo "<script>location.href='ckly.php'</script>";

?>
