<?php

$konnek = mysqli_connect("localhost", "root", "", "latihan"); //konekkan ke folder latihan yang berada di htdcocs
function query($bool)
//tampil seluruh data
{
    global $konnek;
    //variabel scupe tidak bisa di hubungkan ke konek database makanya kita pakai global agar dia bisa menjangkau varibel konek
    $result = mysqli_query($konnek, $bool);
    $lemari = []; //kita pakai array kosong
    while ($keranjang = mysqli_fetch_assoc($result)) { //kita jadikan array sebagai associative bukan numeric
        $lemari[] = $keranjang;
    }
    return $lemari; //kembalikan arraynya
}
function cekData($kirim)
//kita tambah data
{
    global $konnek;
    $nama = htmlspecialchars($kirim['nama']);
    $alamat = htmlspecialchars($kirim['alamat']);
    $email = htmlspecialchars($kirim['email']);
    $j_k = htmlspecialchars($kirim['jenis_kelamin']);
    $insert = "INSERT INTO siswa 
    VALUES ('','$nama','$alamat','$email','$j_k')";
    mysqli_query($konnek, $insert);
    return mysqli_affected_rows($konnek);
}
function hapus($data)
{
    global $konnek;
    mysqli_query($konnek, "DELETE FROM siswa WHERE id=$data");
    return mysqli_affected_rows($konnek);
}
function ubahData($data)
//kita ubah data
{
    global $konnek;
    $jaring = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $email = htmlspecialchars($data['email']);
    $j_k = htmlspecialchars($data['jenis_kelamin']);
    $update = "UPDATE siswa SET
    nama='$nama',
    alamat='$alamat',
    email='$email',
    jenis_kelamin='$j_k'
    WHERE id=$jaring;
    ";
    mysqli_query($konnek, $update);
    return mysqli_affected_rows($konnek);
}
function cari($pencarian)
{
    $cari = "SELECT * FROM siswa WHERE
    nama LIKE '%$pencarian%' OR
    alamat LIKE '%$pencarian%' OR
    email LIKE '%$pencarian%' OR
    jenis_kelamin LIKE '%$pencarian%'
    ";
    return query($cari);
}
