<?
require "include/config.php";
require "include/output_fns.php";
$conn = conn_db();
$sum_num = pics_sum($conn);
$r = $_POST['r'];
if (!$r) {
    $value = ">> next 5 >>";
    $query = "select * from rtn_picslist limit 0, 5";
    $r = 5;
} elseif (($r + 5) >= $sum_num) {
    $value = "first 5";
    $last = $sum_num - $r;
    $query = "select * from rtn_picslist limit $r, $last";
//unset($r);
    $r = 5;
} else {
    $value = ">> next 5 >>";
    $valuepr = "<< prev 5 <<";
    $rprev = $r - 5;
    $query = "select * from rtn_picslist limit $r, 5";
    $r = $r + 5;
}
print_header();
print_navigation_form($r, $value, $rprev, $valuepr);
print_pics($r, $query, $conn);
print_navigation_form($r, $value, $rprev, $valuepr);
mysql_close($conn);
print_footer();
?>

