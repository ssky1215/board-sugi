<?php
session_cache_limiter('');
session_start();
include_once('./db.php');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");


$tot=mysql_query("select * from BOARD");
$tot_cnt = mysql_num_rows($tot);
$view_list=5;
$total_page=ceil($tot_cnt/$view_list);
$view_page=($total_page>5)?5:$total_page;
$now_page=$_GET['page'];
$start_lim=($now_page-1)*$view_list;
$end_lim=$view_list;
$qrl="select * from BOARD order by aid desc limit $start_lim, $end_lim";
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
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
            a:link {
                color: "blue";
            }
            a:visited {
            	  color: grey;
            	  }
            a:hover {
                color: #f60;
            }
            h1 {
                font-size: 1.8em;
            }
        </style>
   <script language="javascript">
    function logincheck()
 {
  var form = document.loginform;
  
  if(!form.uid.value){
   alert( "아이디를 적어주세요" ); 
   form.uid.focus();  
   return;
  }
  if( !form.upass.value )
  {
   alert( "비밀번호를 적어주세요" );
   form.upass.focus();
   return;
  }
  
  form.submit();
 }
</script>

</head>
<body>
<div>
<header>
<div>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
 <tr>
 <td><h1> 수 기 게 시 판<h1></td>
 <td>
 <?php
 if(empty($_SESSION['UID'])){
 ?>
 <table width="40%" cellpadding="0" cellspacing"0" border="0" align="right">
 <form action="loginproc.php" name="loginform" method="post">
 <tr>
 <td>아 이 디 </td>
 <td><input type="text" name="uid" size="7" value="" ></td>
 </tr><tr>
 <td>비밀번호
 </td>
 <td><input type="password" name="upass" size="7" value=""></td>
 </tr></form>
 <tr><td>
 <input type="button" value=" login " OnClick="javascript:logincheck()">
 </td><td>
 <input type="button" value="회원가입" OnClick="window.location = 'member.php'"> 
 <input type="button" value="logout" OnClick="window.location = 'logout.php'">
 </td></tr></table>
<?php
}
else {
?>
<table width="40%" cellpadding="0" cellspacing"0" border="0" align="right">
<tr><td><?=$_SESSION['UID']?>님 로그인...</td></tr>
<tr><td>
<input type="button" value="logout" OnClick="window.location = 'logout.php'">
</td></tr></table>
<?php
}
?>

 </td></tr></table>
</div>

</header>
<nav>
<ul>
<li>
<a> 자 바 </a>
</li>
<li>
<a href="./board_list.php?page=1"> 게 시 판 </a>
</li>
</ul>
</nav>
<article>
<h2> 자 유 게 시 판 </h2>
<div>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr><td>총 게시물수 : <?= $tot_cnt?></td><td align=right>페이지 : <?= $now_page ?>
</td></tr>
<tr height="1" bgcolor="#dddddd"><td colspan="4"></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
 <tr>
  <th width=50><p align=center>번호</p></th>
  <th width=100><p align=center>이름</p></th>
  <th width=420><p align=center>제목</p></th>
  <th width=100><p align=center>등록일</p></th>
 </tr>
<tr height="2" bgcolor="#dddddd"><td colspan="4"></td></tr>
 <?php
 $rs=mysql_query($qrl);
 for( $i=0; $row=mysql_fetch_array($rs); $i++ ) {
 $tot=$tot_cnt-$start_lim;
 $tot_cnt--
?>

<tr>
 <td width=50><p align=center>
 <?= $tot ?></p></td>
 <td width=100><p align=center>
 <?=$row['dbname']?></p></td>
 <td width=420><p align=center>
 <a href='board_view.php?AID=<?php echo $row['aid'];?>'>
 <?=$row['dbsubject']?></a></p></td>
 <td width=100><p align=center>
 <?=$row['dbdate']?></p></td>
 <?php
 }
 ?>
 </tr>
 <tr height="1" bgcolor="#dddddd"><td colspan="4"></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
 <tr align="center">
 <td align=right>
 <?php $url="./board_list.php";?>
 <?php echo get_paging($total_page, $now_page, $_SERVER['PHP_SELF']);?>
 </td>

  <td align="right"><input type=button 
  value="글쓰기" OnClick="window.location = 'board_write.php'"></td>
 </tr>
</table>
</div>
</article>
</body>