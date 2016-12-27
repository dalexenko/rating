<?
require "include/config.php";
require "include/output_fns.php";
$r = $_POST['r'];
if ($r) {
    print_header();
    $r = $r - 5;
    print_back_form($r);
    $r = $r + 5;
    $conn = conn_db();
    $query = "select summary from rtn_picslist where summary<>0 group by summary desc";
    $result = mysql_query($query, $conn) or die ("Invalid query");
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $pics_top[$i] = $row[0];
        $i++;
    }
    $pics_num = count($pics_top);
    if ($pics_num > $maxtop) {
        $to = $maxtop;
    } else {
        $to = $pics_num;
    }
    for ($i = 0; $i < $to; $i++) {
        $n = $i + 1;
        echo "
<table class='tablerating' align=center>
<tr class='tablerating'>
<td align=center><h3>$n</h3></td>	
";
        $query = "select * from rtn_picslist where summary=$pics_top[$i]";
        $result = mysql_query($query, $conn) or die ("Invalid query");
        while ($row = mysql_fetch_array($result)) {
            echo "
<td align=center>
<form action='view.php' method='post'>
<input type='hidden' name='r' value='$r'>
<input type='hidden' name='pic' value='$row[0]'>
<input type='image' src='$dir_icons/tn_$row[0]' border='0' alt='$row[0]' class='formlink'>
</form>
</td>
";
        }
        echo "
<td align=center>
score <br>
<b>$pics_top[$i]</b>
</td>
</tr>
</table>
<br>
";
    }

    mysql_close($conn);
    print_footer();
} else {
    refresh();
}
?>