<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
 <script language="javascript"> 
 function idCheck()
 {
  var form = document.loginform;
  
  if( !form.uid.value)
  {
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
<h2> 회 원 가 입 하 기 </h2>
<div>
	
<table width="100%" border=0 cellspacing=0 cellpadding=0 >
<form action="member_insert.php" name="loginform" method="post" >
<tr><td>아 이 디</td><td><input type="text" name="uid" size="10" value=""></td></tr>
<tr><td>비 밀 번 호</td><td><input type="password" name="upass" size="10" value=""></td></tr>
</form> </table>
<table width=700 cellspacing=0 cellpadding=0 border=0>
<tr><td>&nbsp;</td></tr>
<tr><td>
<input type="button" value="등록" OnClick="javascript:idCheck()">
<input type="button" value="취소" OnClick="window.location='board_list.php?page=1'"></td></tr>
</table>
</div></article></body>
</html>
