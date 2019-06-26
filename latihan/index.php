<?php
require "fungsi.php";
//mengambil data query /data tabel mahasiswa
$latihan = query("SELECT * FROM siswa");
//ubah ke variabel latihan
$latihan = query("SELECT * FROM siswa");
//jika tombol pencarian di klik
if (isset($_POST['pencarian'])) {
    $latihan = cari($_POST['cari']);
}



?>
<!-- kita jalankan fungsi query yang ada di tabel fungsi.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Hello World!!!</title>
</head>

<body>
    <h1>Identitas siswa</h1>
    <a href="tambah.php">Tambah Data siswa</a>
    <br><br>
    <form method="post" action="">
        <input type="text" name="cari" size="30" autofocus placeholder="Masukkan data pencarian" autocomplete="off">
        <button type="submit" name="pencarian">Cari</button>

    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>nama</th>
            <th>alamat</th>
            <th>email</th>
            <th>jenis_kelamin</th>

        </tr>
        <?php if (empty($cari)) : ?>

        <?php endif; ?>
        <?php $i = 1; ?>
        <?php foreach ($latihan as $way) : ?>
            <!-- kita loaping pakai foreach untuk meloping array -->

            <tr>
                <td><?= $i; ?></td>
                <!-- gunanya membaca id di server -->
                <td>
                    <a href="hapus.php?id=<?= $way["id"]; ?>" onclick="return confirm('yakin??');">hapus</a>
                    <a href="ubah.php?id=<?= $way["id"]; ?>">ubah</a>
                </td>


                <td><?= $way["nama"];  ?></td>
                <td><?= $way["alamat"]; ?></td>
                <td><?= $way["email"]; ?></td>
                <td><?= $way["jenis_kelamin"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach;  ?>

    </table>

</body>

</html>