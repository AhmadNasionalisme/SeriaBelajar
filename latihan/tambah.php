<?php
require "fungsi.php";
if (isset($_POST["sumbit"])) {
    //cek pengiriman data
    if (cekData($_POST) > 0) {
        echo "
        <script>
		alert('data berhasil ditambahkan!!');
		document.location.href='index.php';
		</script>
        ";
    } else {
        echo "
        <script>
		alert('data gagal ditambahkan!!');
		document.location.href='index.php';
		</script>
        ";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tambah data siswa</title>
</head>

<body>
    <h1>Tambah Data Siswa</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama Siswa</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="alamat">alamat Siswa</label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label for="email">email Siswa</label>
                <input type="email" name="email" id="email" required>
            </li>
        </ul>
        <ul>
            <li>
                <label for="jk">jenis_kelamin</label>
                <select name="jenis_kelamin" id="jk">
                    <option value="laki_laki">laki_laki</option>
                    <option value="perempuan">perempuan</option>
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