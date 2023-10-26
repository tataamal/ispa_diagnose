<?php 

function hitungIspa($connection)
{
    $ispa = mysqli_query($connection,"SELECT COUNT(*) FROM ispa ");
    $total_ispa = mysqli_fetch_array($ispa)[0];
    return $total_ispa;
}


function addJenis($connection, $tipe, $gejala1, $gejala2, $gejala3)
{
    $query_jenis = "INSERT INTO ispa (tipe, gejala1, gejala2, gejala3) VALUES ('$tipe', '$gejala1', '$gejala2', '$gejala3')";
    
    if (mysqli_query( $connection, $query_jenis) ) {
        return "Data Berhasil Ditambahkan";
    } else {
        return "Data Gagal Ditambahkan". mysqli_error($connection);
    }

}

function updateJenis($connection, $tipe, $gejala1, $gejala2, $gejala3, $id_ispa)
{
    $query = "UPDATE ispa SET tipe = '$tipe', gejala1 = '$gejala1', gejala2 = '$gejala2', gejala3 = '$gejala3' WHERE id_ispa = '$id_ispa' " ;

    if (mysqli_query( $connection, $query) ) {
        return "Data Berhasil Diperbaharui";
    } else {
        return "Data Gagal Diperbaharui". mysqli_error($connection);
    }
}

function deleteJenis($connection, $id_ispa)
{
    $query = "DELETE FROM ispa WHERE id_ispa = '$id_ispa'";

    if(mysqli_query( $connection, $query) ) {
        return "Data Behasil Dihapus";
    } else {
        return "Data Gagal Dihapus". mysqli_error($connection);
    }
}

function getAllJenis($connection)
{
    $query = "SELECT * FROM ispa";
    $result = mysqli_query( $connection, $query );
    return $result;
}

function getIspa($connection, $id_ispa)
{
    $query = "SELECT * FROM ispa WHERE id_ispa = '$id_ispa'";
    $result = mysqli_query( $connection, $query );
    return $result->fetch_assoc();
}

?>