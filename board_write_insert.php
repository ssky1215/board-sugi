<?php
include_once('./db.php'); 
 if (!empty ($_POST ['dbname'])){	
 $sql='INSERT INTO `BOARD` (`dbname`, `dbsubject`, `dbmemo`, `dbdate`) 
VALUES(\' '.mysql_real_escape_string($_POST['dbname']).'\',
 \' '.mysql_real_escape_string($_POST['dbsubject']).'\',
 \' '.mysql_real_escape_string($_POST['dbmemo']).'\', NOW())';
 $result=mysql_query($sql);
if(!$result){
	$message='오류: '.mysql_error()."\n";
	$message='쿼리: '.$sql;
	die($message);
}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
 <script language=javascript>
  self.window.alert("입력한 글을 저장하였습니다.");
  location.href='./board_list.php?page=1';
 </script>
</head>
</html>
