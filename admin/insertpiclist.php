<HTML>
<BODY>
<?
$location_icon = '../pics/images';
$conn = mysql_connect("localhost", "root", "")
or die ("Could not connect");
$tbl = mysql_select_db("rating", $conn);
$handle = opendir($location_icon);
$i = 1;
while (false !== ($fl = readdir($handle))) {
    if ($fl != "." && $fl != "..") {
        echo $fl . "<br>";
        $result = mysql_query("insert into rtn_picslist (filename, summary) values ('$fl', '0')", $conn)
        or die ("Invalid query");
    }
}
closedir($handle);
mysql_close($conn);
?>
</BODY>
</HTML>