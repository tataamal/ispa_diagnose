<?php 

function hitungAdmin($connection)
{
    $admin = mysqli_query($connection,"SELECT COUNT(*) FROM tbl_admin");
    $total_admin = mysqli_fetch_array($admin)[0];
    return $total_admin;
}

?>