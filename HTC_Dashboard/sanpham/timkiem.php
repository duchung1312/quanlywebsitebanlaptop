<?php
if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sql_query="SELECT * FROM sanpham WHERE TenSP LIKE '%$search%'";
    $query = mysqli_query($links, $sql);
    $total_prd = mysqli_num_rows($query);
} else {
    $sql_query="SELECT * FROM sanpham";
    $query = mysqli_query($links, $sql);
}

if (isset($_POST['All'])) {
    unset($_POST['sbm']);
}
?>