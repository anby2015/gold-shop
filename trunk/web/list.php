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
	echo "�� $num ��".
		" <a href=$url?page=".($pageval-1).">��һҳ</a> <a href=$url?page=".($pageval+1).">��һҳ</a>";
 }
 $SQL="SELECT * FROM `guest_book` where is_show !=3 order by id desc limit $page $pagesize";
 $query=mysql_query($SQL);
 while($row=mysql_fetch_array($query)){

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
  <td colspan="3">�������ݣ�<?
  echo htmtocode($row[content]);
   ?></td>
  </tr>
  
  <tr bgColor=""> 
      <?php if ($row[reply] != "") {
	      echo "<td colspan=3><b>����Ա�ظ���$row[reply] </b></td>";
           }
      ?>
  </tr>
  <tr bgColor="" align="right">
  <td> </td>
  <td> </td>
  <td><a href="delete.php?id=<?=$row[id]?>">ɾ��</a> <a href="reply.php?id=<?=$row[id]?>">�ظ�</a></td>
  </tr>
</table>
 <hr color="#A67D3D" noshade="noshade" size="1" />
<?
  }
if($num > $pagesize){
	if($pageval<=1)$pageval=1;
	echo "�� $num ��".
		" <a href=$url?page=".($pageval-1).">��һҳ</a> <a href=$url?page=".($pageval+1).">��һҳ</a>";
 }
?>

