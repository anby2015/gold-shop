<?php

 include("conn.php");

 if($_POST['submit']){
	 if(getenv('HTTP_CLIENT_IP')){
		 $onlineip = getenv('HTTP_CLIENT_IP');
	 }
	 elseif(getenv('HTTP_X_FORWARDED_FOR')){
		 $onlineip = getenv('HTTP_X_FORWARDED_FOR');
	 }
	 elseif(getenv('REMOTE_ADDR')){
		 $onlineip = getenv('REMOTE_ADDR');
	 }
	 else{
		 $onlineip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
	 }
	 //echo "client_ip = $onlineip<br/>";
	 $is_show = 0;//default

	 $sql = "insert into guest_book (id,name,phone,qq,content,insert_time,ip,is_show) " .
		 "values ('','$_POST[name]','$_POST[phone]','$_POST[qq]','$_POST[content]',CURRENT_TIMESTAMP,'$onlineip',$is_show)";
	 mysql_query($sql);
	 echo "<script language=\"javascript\">alert('���Գɹ������ǻἰʱ������ϵ��лл��');history.go(-1)</script>";

 }

?>

<SCRIPT language=javascript>
function CheckPost()
{
	if (myform.name.value=="")
	{
		alert("����д��������");
		myform.name.focus();
		return false;
	}
	if (myform.phone.value=="")
	{
		alert("����д���ĵ绰����");
		myform.phone.focus();
		return false;
	}
	if (myform.qq.value=="")
	{
		alert("����������qq����");
		myform.qq.focus();
		return false;
	}
	if (myform.content.value=="")
	{
		alert("��������������");
		myform.content.focus();
		return false;
	}
}
</SCRIPT>

<form method="post" action="add_message.php" name="myform" onsubmit="return CheckPost()";>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="10%" align="right">��&nbsp����</td>
                  <td colspan="2"><label>
                    <input name="name" type="text" class="text" id="name" size="18" maxlength="12">
                  </label></td>
                  </tr>
                <tr>
                  <td align="right">��&nbsp����</td>
                  <td colspan="2"><label>
                    <input name="phone" type="text" class="text" id="phone" size="18" maxlength="12">
                  </label></td>
                  </tr>
                <tr>
                  <td align="right">Q&nbsp;Q��</td>
                  <td colspan="2"><label>
                    <input name="qq" type="text" class="text" id="qq" size="18" maxlength="12">
                  </label></td>
                </tr>
                <tr>
                  <td align="right" valign="top">��&nbsp�ݣ�</td>
                  <td colspan="2"><label>
                    <textarea name="content" cols="70" rows="10" class="text" id="content"></textarea>
                  </label></td>
                  </tr>
                <tr>
                  <td><label></label></td>
                  <td><input name="submit" type="submit" class="button" value="��������"></td>
                  <td width="78%"><label>
                    <input name="Submit2" type="reset" class="button" value="ȡ��">
                  </label></td>
                </tr>
              </table>
</form>
