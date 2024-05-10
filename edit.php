
<?php
include "koneksi.php";
session_start();

$update_message = "";

$id = $_GET["id"]; 

$sql = "SELECT * FROM printer WHERE no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no = $_POST["no"];
    $nama = $_POST["nama"];
    $warna = $_POST["warna"];
    $jumlah = $_POST["jumlah"];

    $sql_update = "UPDATE printer SET no = ?, nama = ?, warna = ?, jumlah = ? WHERE no = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("ssssi", $no, $nama_merek, $warna, $jumlah);

    if ($stmt->execute()) {
        $update_message = "Data berhasil diperbarui.";
    } else {
        $update_message = "Gagal memperbarui data.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang</title>

</head>
<body>

    <div class="container">
        <h3>UBAH DATA BARANG</h3>

        <div class="update-message">
            <?= $update_message ?>
            <?php if ($update_message === "Data berhasil diperbarui.") : ?>
                <a href="data-barang.php" class="button">Data Barang</a> 
            <?php endif; ?>
        </div>

        <form action="" method="POST">
            <div class="form-group">
                <label for="no">Nomor</label>
                <input type="text" id="no" name="no" value="<?= htmlspecialchars($data['no']) ?>" required>
            </div>
        
            <div class="form-group">
                <label for="nama">Nama Merk Barang</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama_merek']) ?>" required>
            </div>

            <div class.form-group>
                <label for="warna">Warna Barang</label>
                <input type="text" id="warna" name="warna" value="<?= htmlspecialchars($data['warna']) ?>" required>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah Barang</label>
                <input type="number" id="jumlah" name="jumlah" value="<?= htmlspecialchars($data['jumlah']) ?>" required>
            </div>

            <div class="button-row">
                <a href="index.php" class="button">Kembali ke Beranda</a>
                <button type="submit" class="button" style="border:none;">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</body>
</html>
