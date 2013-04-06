<?php
include_once('./db.php'); 
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

$ui = $_POST['uid'];
$qrl=mysql_query("SELECT * FROM login WHERE UID='$ui'") ;
$check=mysql_num_rows($qrl);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
 <?php
 if ($check>0)
{
	?>
	<script language=javascript>
  self.window.alert("같은 아이디가 있습니다. 다른 아이디로해주세요!");
  location.href='./member.php?';
 </script>
 <?php
}

 else {	
 $sql=mysql_query('INSERT INTO `login` (`UID`, `UPASS`)
  VALUES(\''.mysql_real_escape_string($_POST['uid']).'\',
 \''.mysql_real_escape_string($_POST['upass']).'\')')
  or die(mysql_error());
?>
 <script language=javascript>
  self.window.alert("회원가입되셨습니다.");
  location.href='./board_list.php?page=1';
 </script>
 <?php
 }
 ?>
</head>
</html>
