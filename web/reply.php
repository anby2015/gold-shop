<?php
	require_once('conn.php');
	$id = $_GET['id'];
	//不是真的删除，将is_show设置为3，就认为删除了
	$SQL="select * from guest_book where id=".$id;
	$query=mysql_query($SQL);
	$row=mysql_fetch_array($query);
//	echo "<script>location.href='ckly.php'</script>";
?>
<table width="660" border="0" cellpadding="5" cellspacing="1" bgcolor="">
  <tr bgcolor="">
  <td width="">第 <?=$row[id]?> 位</td>
  <td width="">来 自：<?=$row[ip]?></td>
  <td width="">留言时间：<?=$row[insert_time]?></td>
  </tr>
  <tr bgcolor="">
  <td width="">姓 名：<?=$row[name]?></td>
  <td width="">电 话：<?=$row[phone]?></td>
  <td width="">Q Q：<?=$row[qq]?> </td>
  </tr>
  <tr bgColor="">
  <td width="">留言内容：<?
  echo htmtocode($row[content]);
   ?></td>
  </tr>
  <tr >
 
  </tr>
</table>
<form action="add_reply_message.php?id=<?=$id?>" method="post" name="myform" onsubmit="return CheckPost();">
  回复内容：<textarea name="reply"  cols="60" rows="9"></textarea><br/>

  <input type="submit" name="submit" value="回复留言"/>
</form>
