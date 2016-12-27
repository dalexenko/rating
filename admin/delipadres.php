<html>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>администрирование топ 20</title>
<LINK REL=stylesheet HREF="rating.css" TYPE="text/css">
<?
$conn = mysql_connect("localhost", "root", "")
or die ("Could not connect");
$tbl = mysql_select_db("u226856428_test", $conn);
$result = mysql_query("truncate table rtn_ipadres", $conn);
if ($result) {
    echo "Таблица очищена";
} else {
    echo "ошибка выполнения";
}
?>