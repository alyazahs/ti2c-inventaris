<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir dan simpan dalam array
    $data_barang = array(
        "no" => $_POST["no"],
        "nama_merek" => $_POST["nama_merek"],
        "warna" => $_POST["warna"],
        "jumlah" => $_POST["jumlah"]
    );

    // Lakukan sesuatu dengan data barang, misalnya menyimpan ke database

    // Tampilkan pesan bahwa data telah disimpan
    echo "<h2>Data Barang Telah Disimpan:</h2>";
    echo "<ul>";
    foreach ($data_barang as $key => $value) {
        echo "<li><strong>$key:</strong> $value</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Barang</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}

		header {
            background-color: #d5bdaf;
            color: #fff;
            padding: 20px;
            text-align: center;
		}

		h1 {
			text-align: center;
			margin-top: 20px;
		}

		form {
			width: 50%;
			margin: 20px auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		table {
			width: 100%;
		}

		td {
			padding: 10px;
		}

		input[type="text"],
		input[type="number"] {
			width: calc(100% - 20px);
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		input[type="submit"] {
			background-color: #4caf50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		input[type="submit"]:focus {
			outline: none;
		}

		.btn {
			background-color: #008CBA;
			color: white;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			border-radius: 5px;
		}

		.btn:hover {
			background-color: #005f6b;
		}
	</style>
</head>
<body>
	<header>
	<h1>Tambah Data Barang</h1>
	</header>
	
	<form action="data-barang.php" method="POST">
		<table>
			<tr>
				<td>No</td>
				<td><input type="text" name="no" placeholder="Masukkan Nomor Barang" required></td>
			</tr>
			<tr>
				<td>Nama Merek</td>
				<td><input type="text" name="nama_merek" placeholder="Masukkan Nama Barang" required></td>
			</tr>
			<tr>
				<td>Warna</td>
				<td><input type="text" id="warna" name="warna" placeholder="Warna Barang" required></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="number" name="jumlah" placeholder="Jumlah Barang" required></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>

	<form action="index.php" method="get">
		<tr>
			<td colspan="2"><input type="submit" name="kembali" value="Kembali"></td>
		</tr>
	</form>

	<form action="input-data.php" method="get">
		<tr>
			<td colspan="2"><input type="submit" name="edit" value="edit"></td>
		</tr>
	</form>
</body>
</html>
