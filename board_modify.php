<?php
include_once('./db.php');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
$AID=$_GET['AID'];
$sql="SELECT * FROM BOARD WHERE aid = '$AID'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
?>
<script language="javascript"> 
 function writeCheck()
 {
  var form = document.modifyform;
  
  if( !form.dbsubject.value )
  {
   alert( "제목을 적어주세요" );
   form.dbsubject.focus();
   return;
  }
  if( !form.dbmemo.value )
  {
   alert( "내용을 적어주세요" );
   form.dbmemo.focus();
   return;
  }
  form.submit();
 }
</script>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>게시판 수정하기</title>
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
            footer {
                clear: both;
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
<h2> 게 시 판 글 수 정 </h2>
<div>
<form action="board_modify_insert.php?AID=<?php echo $row['aid'];?>" name="modifyform" method="post">
<table width=700 border=1 cellspacing=0 cellpadding=5>
<form  action="board_write_insert.php" name="writeform" method="post" >
	<tr><td><b>이름</b></td><td><?=$row['dbname']?></td></tr>
<tr><td><b>제목</b></td><td>
	<input type="text" name="dbsubject" size="25"  maxlength="50" value="<?=$row['dbsubject']?>"></td></tr>
<tr><td><b>내용</b></td><td>
	<textarea name="dbmemo" cols="50" rows="10"><?=$row['dbmemo']?></textarea></td></tr>
</form>
</table>

<table width=700 border=0 cellspacing=0 cellpadding=0>
<tr><td><input type="button" value="재등록" OnClick="javascript:writeCheck()">
	<input type="button" value="목록" 
	OnClick="window.location='board_list.php?page=1'">
</td></tr>
</table></div></article>
</body></html>