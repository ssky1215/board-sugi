<?php
include_once('./db.php'); 
$AID=$_GET['AID'];
$sql="UPDATE BOARD SET 
`dbsubject`='$_POST[dbsubject]',`dbmemo`='$_POST[dbmemo])', `dbdate`=NOW() 
WHERE aid='$AID'";
$result=mysql_query($sql);
if(!$result){
	$message='오류: '.mysql_error()."\n";
	$message='쿼리: '.$sql;
	die($message);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
 <script language=javascript>
  self.window.alert("입력한 글을 수정하였습니다.");
  location.href='./board_list.php?page=1';
 </script>