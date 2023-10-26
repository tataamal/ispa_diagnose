<?php 

function getAllUser($connection)
{
    $query = "SELECT * FROM tbl_user";
    $result = mysqli_query($connection, $query);
    return $result;

}

function hitungUser($connection)
{
    $user = mysqli_query($connection,"SELECT COUNT(*) FROM tbl_user");
    $total_user = mysqli_fetch_array($user)[0];
    return $total_user;
}

?>