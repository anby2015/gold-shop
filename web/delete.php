<?php
	require_once('conn.php');
	$id = $_GET['id'];
	//不是真的删除，将is_show设置为3，就认为删除了
	$SQL="update guest_book set is_show=3 where id=".$id;
	echo "删除成功";
	mysql_query($SQL);
	echo "<script>location.href='ckly.php'</script>";
?>
