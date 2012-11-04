<?php
 include("conn.php");

 $pagesize=5;
 $url=$_SERVER["REQUEST_URI"];
 $url=parse_url($url);
 $url=$url[path];
 $SQL="SELECT * FROM `guest_book` where is_show !=3 order by id desc";
 $query=mysql_query($SQL);
 $num = mysql_num_rows($query);
 if($_GET[page]){
	 $pageval=$_GET[page];
	 $page=($pageval-1)*$pagesize;
	 $page.=',';
 }
 if($num > $pagesize){
	if($pageval<=1)$pageval=1;
	echo "共 $num 条".
		" <a href=$url?page=".($pageval-1).">上一页</a> <a href=$url?page=".($pageval+1).">下一页</a>";
 }
 $SQL="SELECT * FROM `guest_book` where is_show !=3 order by id desc limit $page $pagesize";
 $query=mysql_query($SQL);
 while($row=mysql_fetch_array($query)){

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
  <td colspan="3">留言内容：<?
  echo htmtocode($row[content]);
   ?></td>
  </tr>
  
  <tr bgColor=""> 
      <?php if ($row[reply] != "") {
	      echo "<td colspan=3><b>管理员回复：$row[reply] </b></td>";
           }
      ?>
  </tr>
  <tr bgColor="" align="right">
  <td> </td>
  <td> </td>
  <td><a href="delete.php?id=<?=$row[id]?>">删除</a> <a href="reply.php?id=<?=$row[id]?>">回复</a></td>
  </tr>
</table>
 <hr color="#A67D3D" noshade="noshade" size="1" />
<?
  }
if($num > $pagesize){
	if($pageval<=1)$pageval=1;
	echo "共 $num 条".
		" <a href=$url?page=".($pageval-1).">上一页</a> <a href=$url?page=".($pageval+1).">下一页</a>";
 }
?>

