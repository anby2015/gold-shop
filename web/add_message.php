<?php

 include("conn.php");
 session_start();

 if($_POST['submit'] && $_POST['code'] == $_SESSION['code']){
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
 else {
	 echo "<script language=\"javascript\">alert('校验码输入有误,请重新输入！');history.go(-1)</script>";
 }

?>
