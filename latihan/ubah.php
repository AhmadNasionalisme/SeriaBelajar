<?php
require "fungsi.php";
//ambil jaring lalu kita tangkap data dari url
$jaring = $_GET['id']; //karena dia terbaca dari url kita pakai $_GET
//ambil seluruh data siswa berdasarkan id lalu kita eksekusi
$siswa = query("SELECT * FROM siswa WHERE id=$jaring")[0]; //kita pakai fungsi query yang awal

//kita panggil di tabel
if (isset($_POST['sumbit'])) {
    if (ubahData($_POST) > 0) { //jka lebih besar dari 0 ada data yan dikirim
        echo "
        <script>
        alert('data berhasil di ubah!!');
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal di ubah!!');
        document.location.href='index.php';
        </script>
        ";
    }
}

$jenis_kelamin = ['laki_laki', 'perempuan'];
//cek tombolnya

?>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ubah data siswa</title>
</head>

<body>
    <h1>ubah Data Siswa</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
        <ul>
            <li>
                <label for="nama">Nama Siswa</label>
                <input type="text" name="nama" id="nama" required value="<?= $siswa['nama']; ?>">
            </li>
            <li>
                <label for="alamat">alamat Siswa</label>
                <input type="text" name="alamat" id="alamat" required value="<?= $siswa['alamat']; ?>">
            </li>
            <li>
                <label for=" email">email Siswa</label>
                <input type="email" name="email" id="email" required value="<?= $siswa['email']; ?>">
            </li>
        </ul>
        <ul>
            <li>
                <label for=" jk">jenis_kelamin</label>
                <select name="jenis_kelamin" id="jk">
                    <?php foreach ($jenis_kelamin as $jk) : ?>
                        <?php if ($jk == $siswa['jenis_kelamin']) : ?>
                            <option value='<?= $jk; ?>' selected><?= $jk; ?></option>
                        <?php else : ?>
                            <option value='<?= $jk; ?>'><?= $jk; ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </select>
            </li>
        </ul>
        <ul>
            <li>
                <button name="sumbit" type="submit">kirim</button>
            </li>
        </ul>

    </form>

</body>

</html>