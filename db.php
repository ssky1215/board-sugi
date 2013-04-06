<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<body>
	<?php
$link=mysql_connect('localhost','root','120012');
if (!$link) {
  die('접속실패 : ' .mysql_error());
} 
$db_selected =mysql_select_db('sugiboard',$link);
if (!$db_selected) {
   die ('Can\'t use foo : ' .mysql_error());
} 
?>
<?php
function get_paging($totalpage, $cpage, $go_url)
{
	
if(!$pagenumber){
	$pagenumber = 5;
}	
$startpage = intval(($cpage - 1)/$pagenumber)*$pagenumber+1;
$endpage = intval(((($startpage -1)+ $pagenumber)/$pagenumber)*$pagenumber);

if($totalpage <= $endpage)
$endpage = $totalpage;

if($cpage > $pagenumber) {
	$curpage = intval($startpage - 1);
	$url_page="<a href='$go_url"."?page=$curpage'>";
	echo ("$url_page");
	echo("prev</a>");
}
else{
	echo("prev</a>");
}
$curpage = $startpage;
while($curpage <= $endpage):

if ($curpage == $cpage){
	echo "<b>$cpage</b>";
} else {
	$url_page = "<a href='$go_url"."?page=$curpage'>";
	echo ("$url_page");
	echo("[$curpage]</a>");
}
	$curpage++;
	
endwhile;

if($totalpage > $endpage){
	$curpage = intval($endpage +1);
	$url_page = "..<a href='$go_url"."?page=$curpage'>";
	echo("$url_page");
	echo("next</a>");
}
else {
	echo("next");
}
}
?>

</body>

</html>
