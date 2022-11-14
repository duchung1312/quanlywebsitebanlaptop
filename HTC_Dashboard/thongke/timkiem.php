<?php
require_once 'db_conn.php';
// Tim Kiems
if (isset($_GET['sbm']) && !empty($_GET['batdau'])&& !empty($_GET['ketthuc'])) {
    $batdau = $_GET['batdau'];
    $ketthuc = $_GET['ketthuc'];
    $sql_query="SELECT * FROM hoadon WHERE NgayBan BETWEEN '$batdau' AND '$ketthuc';";
    $query = mysqli_query($links, $sql);
    $total_prd = mysqli_num_rows($query);
} 

if (isset($_POST['All'])) {
    unset($_POST['sbm']);
}

$sql_tien = "SELECT IFNULL (SUM(TongTien),0) as tong1
FROM hoadon";
$query_tien = mysqli_query($links, $sql_tien);
$row_sum = mysqli_fetch_array($query_tien);
$sum = $row_sum['tong1'];


$sql_kh = "SELECT COUNT(MaKH) as kh
FROM khachhang";
$query_kh = mysqli_query($links, $sql_kh);
$row_kh = mysqli_fetch_array($query_kh);
$kh = $row_kh['kh'];

$sql_dh = "SELECT COUNT(MaDH) as dh
FROM hoadon";
$query_hd = mysqli_query($links, $sql_hd);
$row_hd = mysqli_fetch_array($query_hd);
$hd = $row_kh['hd'];


?>
