<?php
session_cache_limiter('');
session_start();
include_once('./db.php'); 
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");


$ui=$_POST['uid'];
$up=$_POST['upass'];
$sql="select * from login where UID='$ui'";
$qry=mysql_query($sql);
$rows=mysql_fetch_array($qry);
$crow=mysql_num_rows($qry);

if ($crow>1){
	echo("<script language=javascript>
  self.window.alert('로그인오류관리자에문의');
  location.href='./board_list.php?page=1';
 </script>;");
}elseif ($crow<1){
	echo("<html><head><script language=javascript>
  self.window.alert('아이디가 등록되어 있지않습니다');
  location.href='./board_list.php?page=1';
 </script></head></html>");
}else {
	if($rows['UPASS'] == $up){
		$_SESSION['UID']=$rows['UID'];
		echo("<html><head><script language=javascript>
  self.window.alert('로그인 성공');
  location.href='./board_list.php?page=1';
 </script></head></html>");
	}
	else{
		echo("<html><head><script language=javascript>
  self.window.alert('비밀번호 오류');
  history.go(-1);
 </script></head></html>");
	}
}
?>




