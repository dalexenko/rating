<?
require "include/config.php";
require "include/output_fns.php";
$r = $_POST['r'];
$s = $_POST['s'];
$filename = $_POST['filename'];
if (($r) && ($s) && ($filename)) {
    $ip = $REMOTE_ADDR;
    print_header();
    $r = $r - 5;
    $conn = conn_db();
    $query = "insert into rtn_ipadres (ip) values ('$ip')";
    $result = mysql_query($query, $conn) or die ("Invalid query");

    $query_select = "select summary from rtn_picslist where filename='$filename'";
    $result_select = mysql_query($query_select, $conn);
    $row_select = mysql_fetch_array($result_select);
    $s_new = $row_select[0] + $s;
    $query = "update rtn_picslist set  summary=$s_new where filename='$filename'";
    $result = mysql_query($query, $conn) or die ("Invalid query");
    $query_view = "select * from rtn_picslist where filename = '$filename'";
    $result_view = mysql_query($query_view, $conn);
    while ($row = mysql_fetch_array($result_view)) {
        echo "
<center>
<hr>
<table class='tablerating'>
<tr class='tablerating'><td align=center><img src='$dir_icons/tn_$row[0]'>
</td>
</tr>
</table>
<hr>
<b>Спасибо за Ваш выбор!</b><br><br>
";
        print_back_form($r);
    }
    mysql_close($conn);
} else {
    refresh();
}
?>