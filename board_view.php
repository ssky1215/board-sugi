<?php
include_once('./db.php');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

$AID=$_GET['AID'];
$sql="SELECT * FROM BOARD WHERE aid = '$AID'";
$result = mysql_query($sql);
$BOARD = mysql_fetch_assoc($result);
?>
<script language='javascript'>
function boarddelete(){
	location.href='board_delete.php?AID=<?php echo $BOARD['aid'];?>';
}
function boardmodify(){
	location.href='board_modify.php?AID=<?php echo $BOARD['aid'];?>';
}
</script>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
   <style type="text/css">
            body {
                font-size: 0.8em;
                font-family: dotum;
                line-height: 1.6em;
            }
            header {
                border-bottom: 1px solid #ccc;
                padding: 20px 0;
            }
            nav {
                float: left;
                margin-right: 20px;
                min-height: 500px;
                border-right: 1px solid #ccc;
            }
            nav ul {
                list-style: none;
                padding-left: 0;
                padding-right: 20px;
            }
            article {
                float: left;
            }
            a {
                text-decoration: none;
            }
            a:link, a:visited {
                color: #333;
            }
            a:hover {
                color: #f60;
            }
            h1 {
                font-size: 1.8em;
            }
        </style>
</head>
<body>
<div>
<header>
<h1> 수 기 게 시 판<h1>
</header>
<nav>
<ul>
<li>
<a href="../index.php"> 자 바 </a>
</li>
<li>
<a href="./board_list.php?page=1"> 게 시 판 </a>
</li>
</ul>
</nav>
<article>
<h2> 게 시 판 글 보 기 </h2>
<div>
<table width="100%" border=0 cellspacing=0 cellpadding=0 >
<tr><td width=55 align=center><b>이 름</b></td><td><?=$BOARD['dbname']?></td></tr>
<tr height="1" bgcolor="#dddddd"><td colspan="4"></td></tr>
<tr><td width=55 align=center><b>제 목</b></td><td><?=$BOARD['dbsubject']?></td></tr>
<tr height="1" bgcolor="#dddddd"><td colspan="4"></td></tr>
<tr><td width=55 align=center><b>내 용</b></td><td><?=$BOARD['dbmemo']?></td></tr>
<tr height="1" bgcolor="#dddddd"><td colspan="4"></td></tr>
</table> 
<table width=700 cellspacing=0 cellpadding=0 border=0>
<tr><td>&nbsp;</td></tr>
<tr><td><input type="button" value="목록" 
OnClick="window.location='board_list.php?page=1'">
	<input type="button" value="삭제" 
	OnClick="javascript:boarddelete()">
	<input type="button" value="수정" 
	OnClick="javascript:boardmodify()"></td>
</tr>
</table>
</div></article></body></html>
