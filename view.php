<?
require "include/config.php";
require "include/output_fns.php";
$r = $_POST['r'];
$pic = $_POST['pic'];
if (($r) && ($pic)) {
//$p = substr($pic, 0, 3);
//$pic_new= $p."jpg";
    print_header();
    $r = $r - 5;
    ?>
    <table>
        <tr>
            <td>
                <?
                $conn = conn_db();
                $query = "select * from rtn_picslist where filename=" . $pic;
                print_back_form($r);
                print_pics($r, $query, $conn);
                ?>
            </td>
            <td>
                <?
                $r = $r + 5;
                print_choice_form($r, $pic);
                ?>
            </td>
        </tr>
    </table>
    <?
    echo "
<table class='tableview'>
<tr class='tablerating'>
<td align=center>
<img src='$dir_images/$pic'>
</td>
</tr>
</table>
";
    ?>
    <table>
        <tr>
            <td>
                <?
                $r = $r - 5;
                print_back_form($r);
                $r = $r + 5;
                ?>
            </td>
            <td>
                <?
                print_choice_form($r, $pic);
                ?>
            </td>
        </tr>
    </table>
    <?
    mysql_close($conn);
    print_footer();
} else {
    refresh();
}
?>
