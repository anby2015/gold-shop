<?php
	require_once('conn.php');
	$id = $_GET['id'];
	//�������ɾ������is_show����Ϊ3������Ϊɾ����
	$SQL="update guest_book set is_show=3 where id=".$id;
	echo "ɾ���ɹ�";
	mysql_query($SQL);
	echo "<script>location.href='ckly.php'</script>";
?>
