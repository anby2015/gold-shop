<?php
	require_once('conn.php');
	$id = $_GET['id'];
	//�������ɾ������is_show����Ϊ3������Ϊɾ����
	$SQL="select * from guest_book where id=".$id;
	$query=mysql_query($SQL);
	$row=mysql_fetch_array($query);
//	echo "<script>location.href='ckly.php'</script>";
?>
<table width="660" border="0" cellpadding="5" cellspacing="1" bgcolor="">
  <tr bgcolor="">
  <td width="">�� <?=$row[id]?> λ</td>
  <td width="">�� �ԣ�<?=$row[ip]?></td>
  <td width="">����ʱ�䣺<?=$row[insert_time]?></td>
  </tr>
  <tr bgcolor="">
  <td width="">�� ����<?=$row[name]?></td>
  <td width="">�� ����<?=$row[phone]?></td>
  <td width="">Q Q��<?=$row[qq]?> </td>
  </tr>
  <tr bgColor="">
  <td width="">�������ݣ�<?
  echo htmtocode($row[content]);
   ?></td>
  </tr>
  <tr >
 
  </tr>
</table>
<form action="add_reply_message.php?id=<?=$id?>" method="post" name="myform" onsubmit="return CheckPost();">
  �ظ����ݣ�<textarea name="reply"  cols="60" rows="9"></textarea><br/>

  <input type="submit" name="submit" value="�ظ�����"/>
</form>
