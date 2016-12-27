<?
function print_header ()
{
global $r;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>рейтинг моделей</title>
<LINK REL=stylesheet HREF="include/rating.css" TYPE="text/css">
</head>
<script language="JavaScript" SRC="include/jscripts.js"></script>
<body>
<table width=100%>
<tr>
<td>
<?
print_top_form ($r);
?>
</td>
<td>
<?
print_datetime(); 
?>
</td>
</tr>
</table>
<?
}

function print_footer ()
{
?>
</body>
</html>
<?
}
function print_datetime ()
{
$q[]="";
$q[]="января"; 
$q[]="февраля"; 
$q[]="марта"; 
$q[]="апреля"; 
$q[]="мая";
$q[]="июня"; 
$q[]="июля"; 
$q[]="августа"; 
$q[]="сентября"; 
$q[]="октября"; 
$q[]="ноября";
$q[]="декабря";

$e[]="воскресение";
$e[]="понедельник"; 
$e[]="вторник"; 
$e[]="среда"; 
$e[]="четверг"; 
$e[]="пятница";
$e[]="суббота"; 

$m=date('m');
if ($m=="01") $m=1; 
if ($m=="02") $m=2;
if ($m=="03") $m=3;
if ($m=="04") $m=4; 
if ($m=="05") $m=5;
if ($m=="06") $m=6;
if ($m=="07") $m=7;
if ($m=="08") $m=8; 
if ($m=="09") $m=9; 
$we=date('w');
$chislo=date('d'); 
$den_nedeli = $e[$we]; 
$mesyac = $q[$m]; 
$god = date(Y);
echo "<div align='right'><b>".$den_nedeli.", ".$chislo." ".$mesyac." ".$god." года</b></div>";
}

function conn_db()
{
global $host, $rating_db, $user_db, $pass_db;

$conn = mysql_connect($host, $user_db, $pass_db);
if (!$conn) 
{
die('Could not connect: ' . mysql_error());
}
$db_selected = mysql_select_db($rating_db, $conn);
if (!$db_selected) 
{
    die ($rating_db.": " . mysql_error());
}
else
{
return $conn;
}
}

function pics_sum($conn)
{
$result = mysql_query ("select * from rtn_picslist", $conn);
$sum_num = mysql_num_rows ($result);
return $sum_num;
}

function print_top_form ($r)
{
?>
<form action="top.php" method="post">
<input type="hidden" name="r" value="<?=$r?>">
<input type="submit" value="TOP" class='formlink'> 
</form>
<?
}

function print_navigation_form ($r, $value, $rprev, $valuepr)
{
?>
<table align=center>
<tr>
<td>
<form action="index.php" method="post">
<input type="hidden" name="r" value="<?=$rprev?>">
<input type="submit" value="<?=$valuepr?>" class='formlink'>
</form>
</td>
<td>
<form action="index.php" method="post">
<input type="hidden" name="r" value="<?=$r?>">
<input type="submit" value="<?=$value?>" class='formlink'>
</form>
</tr>
</table>
<?
}

function print_pics($r, $query, $conn)
{
global $dir_icons;
$result = mysql_query ($query, $conn);
while ($row = mysql_fetch_array($result))
{
echo "
<table class='tablerating' align=center>
<tr class='tablerating'>
<td align=center>
<form action='view.php' method='post'>
<input type='hidden' name='r' value='$r'>
<input type='hidden' name='pic' value='$row[0]'>
<input type='image' src='$dir_icons/tn_$row[0]' border='0' alt='$row[0]' class='formlink'>
</form>
</td>
<td>
рейтинг - <b>$row[1]</b>
</td>
<td align=center>
<form action='choice.php' method='post'>
<input type='hidden' name='filename' value='$row[0]'>
<input type='hidden' name='r' value='$r'>
<select name='s' class='form'>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</select>
<input type='submit' value='проголосовать' class='form' >
</form>
</td>
</tr>
</table>
<br>
";
}
}

function print_choice_form ($r, $pic)
{
echo "
<form action='choice.php' method='post'>
<input type='hidden' name='filename' value='$pic'>
<input type='hidden' name='r' value='$r'>
<select name='s' class='form'>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</select>
<input type='submit' value='проголосовать'class='form'>
</form>";
}

function print_back_form ($r)
{
echo "
<form action='index.php' method='get'>
<input type='hidden' name='r' value='$r'>
<input type='submit' value='<<' class='formlink'>
</form>
";
}

function refresh ()
{
echo "
<html>
<head>
<title></title>
<META HTTP-EQUIV='Refresh' CONTENT='0; URL=http://dalexenko.hol.es/rating/'>
</head>
<body>
</body>
</html>
"; 
}
?>

