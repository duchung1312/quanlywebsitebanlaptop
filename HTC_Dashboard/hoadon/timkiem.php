<?php
if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sql_query="SELECT * FROM hoadon WHERE TenHD LIKE '%$search%'";
    $query = mysqli_query($links, $sql);
    $total_prd = mysqli_num_rows($query);
} else {
    $sql_query="SELECT * FROM hoadon";
    $query = mysqli_query($links, $sql);
}

if (isset($_POST['All'])) {
    unset($_POST['sbm']);
}
?>