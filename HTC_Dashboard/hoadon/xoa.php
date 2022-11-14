<?php
   if(isset($_GET['delete_id']))
   {
       $sql_query="DELETE FROM hoadon WHERE MaHD =".$_GET['delete_id'];
       mysqli_query($links, $sql_query);
       header("Location: $_SERVER[PHP_SELF]");
   }
?>