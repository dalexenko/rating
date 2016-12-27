<html>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>администрирование топ 20</title>
<LINK REL=stylesheet HREF="rating.css" TYPE="text/css">
<?
$conn = mysql_connect("localhost", "root", "")
or die ("Could not connect");
$tbl = mysql_select_db("rating", $conn);
$result = mysql_query("update rtn_picslist set summary=0", $conn);
if ($result) {
    echo "результаты рейтинга обнулены";
} else {
    echo "ошибка выполнения";
}
?>