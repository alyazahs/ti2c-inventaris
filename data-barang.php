<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $no = $_POST["no"];
    $nama_merek = $_POST["nama_merek"];
    $warna = $_POST["warna"];
    $jumlah = $_POST["jumlah"];

    // Query untuk memasukkan data ke dalam database
    $sql = "INSERT INTO printer (no, nama_merek, warna, jumlah) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $no, $nama_merek, $warna, $jumlah);

    if ($stmt->execute()) {
        // Jika query berhasil dijalankan, redirect ke halaman lain atau tampilkan pesan sukses
        header("Location: data-barang.php?success=1");
        exit();
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup statement
    $stmt->close();
}

if (isset($_GET["delete"])) {
    $no = $_GET["delete"];
    $sql_delete = "DELETE FROM printer WHERE no = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("i", $no);

    if ($stmt->execute()) {
        $delete_message = "Data barang berhasil dihapus.";
    } else {
        $delete_message = "Gagal menghapus data barang.";
    }

    // Tutup statement
    $stmt->close();
}

// Query untuk mendapatkan data dari tabel printer
$sql = "SELECT * FROM printer";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #d5bdaf;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #003049;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .edit-btn {
            background-color: #2196f3;
        }

        .edit-btn, .delete-btn {
            margin-right: 5px;
        }

        p.message {
            text-align: center;
            color: #4caf50;
            margin-top: 20px;
        }

        p.error-message {
            text-align: center;
            color: #f44336;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <header>
    <h2>Data Barang</h2>
    </header>

    <?php if (isset($delete_message)): ?>
        <p style="color:#ececec;"><?= $delete_message ?></p>
    <?php endif; ?>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>NO</th>
                <th>Nama Merk Barang</th>
                <th>Warna</th>
                <th>Jumlah</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["no"] ?></td>
                    <td><?= $row["nama_merek"] ?></td>
                    <td><?= $row["warna"] ?></td>
                    <td><?= $row["jumlah"] ?></td>
                    <td>
                        <a class="btn delete-btn" href="?delete=<?= $row["no"] ?>">(-) Hapus Data</a>
                        <a class="btn edit-btn" href="edit.php?id=<?= $row["no"] ?>"><i class="gg-pen"></i>Edit</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p style="color: #ececec;">Tidak ada data yang ditemukan.</p>
    <?php endif; ?>

    <a href="input-data.php" class="btn">(+) Tambah Data Barang</a>
    <br>
    <a class="btn" href="index.php"> Kembali ke Halaman Utama</a>
</body>

</html>

<?php
// Tutup koneksi
$conn->close();
?>
