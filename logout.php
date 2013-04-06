<?php
session_cache_limiter('');
session_start();
include_once('./db.php'); 
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

$_session['UID']="";
session_destroy();
echo("<script language=javascript>
  self.window.alert('로그아웃성공');
  location.href='./board_list.php?page=1';
 </script>;");
 ?>