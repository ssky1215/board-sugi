<?php
include_once('./db.php');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
$AID=$_GET['AID'];
$sql="DELETE FROM BOARD WHERE aid = '$AID'";
mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>
<body>
<script language=javascript>
  self.window.alert("글을 삭제하였습니다.");
  location.href='./board_list.php?page=1';
 </script></body></html>	