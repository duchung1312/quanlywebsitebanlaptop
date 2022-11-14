<?php

if (isset($_GET['sbm']) && !empty($_GET['batdau']) && !empty($_GET['ketthuc'])) {
    $batdau = $_GET['batdau'];
    $ketthuc = $_GET['ketthuc'];
    $sql_query = "SELECT * FROM khachhang WHERE NgaySinh BETWEEN '$batdau' AND '$ketthuc';";
    $query = mysqli_query($links, $sql);
    $total_prd = mysqli_num_rows($query);
} else {
    $sql_query = "SELECT * FROM khachhang";
    $query = mysqli_query($links, $sql);
}

if (isset($_POST['All'])) {
    unset($_POST['sbm']);
}

?>