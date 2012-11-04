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
	 echo "<script language=\"javascript\">alert('留言成功，我们会及时与您联系，谢谢！');history.go(-1)</script>";

 }

?>

<SCRIPT language=javascript>
function CheckPost()
{
	if (myform.name.value=="")
	{
		alert("请填写您的姓名");
		myform.name.focus();
		return false;
	}
	if (myform.phone.value=="")
	{
		alert("请填写您的电话号码");
		myform.phone.focus();
		return false;
	}
	if (myform.qq.value=="")
	{
		alert("请输入您的qq号码");
		myform.qq.focus();
		return false;
	}
	if (myform.content.value=="")
	{
		alert("请输入留言内容");
		myform.content.focus();
		return false;
	}
}
</SCRIPT>

<form method="post" action="add_message.php" name="myform" onsubmit="return CheckPost()";>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="10%" align="right">姓&nbsp名：</td>
                  <td colspan="2"><label>
                    <input name="name" type="text" class="text" id="name" size="18" maxlength="12">
                  </label></td>
                  </tr>
                <tr>
                  <td align="right">电&nbsp话：</td>
                  <td colspan="2"><label>
                    <input name="phone" type="text" class="text" id="phone" size="18" maxlength="12">
                  </label></td>
                  </tr>
                <tr>
                  <td align="right">Q&nbsp;Q：</td>
                  <td colspan="2"><label>
                    <input name="qq" type="text" class="text" id="qq" size="18" maxlength="12">
                  </label></td>
                </tr>
                <tr>
                  <td align="right" valign="top">内&nbsp容：</td>
                  <td colspan="2"><label>
                    <textarea name="content" cols="70" rows="10" class="text" id="content"></textarea>
                  </label></td>
                  </tr>
                <tr>
                  <td><label></label></td>
                  <td><input name="submit" type="submit" class="button" value="发布留言"></td>
                  <td width="78%"><label>
                    <input name="Submit2" type="reset" class="button" value="取消">
                  </label></td>
                </tr>
              </table>
</form>
