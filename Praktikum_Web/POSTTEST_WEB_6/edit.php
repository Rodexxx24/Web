<?php
include 'koneksi.php'; // Include database connection

$id_item = $_GET['id'];
$sql = "SELECT id_item, nama_item, kategori, rating, harga, file_name, file_path FROM Katalog WHERE id_item = '$id_item'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_item = $row['nama_item'];
    $kategori = $row['kategori'];
    $rating = $row['rating'];
    $harga = $row['harga'];
    $currentFile = $row['file_name'];
    $currentFilePath = $row['file_path'];
} else {
    echo "Data tidak ditemukan.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_item = $_POST['nama_item'];
    $kategori = $_POST['kategori'];
    $rating = $_POST['rating'];
    $harga = $_POST['harga'];
    $newFileName = $currentFile;
    $newFilePath = $currentFilePath;

    // Proses jika ada file baru yang diunggah
    if (!empty($_FILES['file']['name'])) {
        // Menghapus file lama jika ada
        if (file_exists($currentFilePath)) {
            unlink($currentFilePath);
        }
        
        // Informasi file baru
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $tmpName = $_FILES['file']['tmp_name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $maxFileSize = 1 * 1024 * 1024; // 1MB

        // Validasi ukuran file
        if ($fileSize > $maxFileSize) {
            echo "Ukuran file terlalu besar. Maksimal 1MB.";
            exit();
        }

        // Format penamaan file baru
        $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
        $newFilePath = 'uploads/' . $newFileName;

        // Pindahkan file ke folder tujuan
        if (!move_uploaded_file($tmpName, $newFilePath)) {
            echo "Gagal mengunggah file.";
            exit();
        }
    }

    // Perbarui data di database
    $sql = "UPDATE Katalog SET 
            nama_item = '$nama_item',
            kategori = '$kategori',
            rating = '$rating',
            harga = '$harga',
            file_name = '$newFileName',
            file_path = '$newFilePath'
            WHERE id_item = '$id_item'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: CRUD.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <h2>Edit Barang</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama_item">Nama Barang:</label>
        <input type="text" id="nama_item" name="nama_item" value="<?php echo $nama_item; ?>" required><br><br>
        
        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Micro Controller" <?php if ($kategori == 'Micro Controller') echo 'selected'; ?>>Micro Controller</option>
            <option value="Sensor" <?php if ($kategori == 'Sensor') echo 'selected'; ?>>Sensor</option>
            <option value="Power Supply" <?php if ($kategori == 'Power Supply') echo 'selected'; ?>>Power Supply</option>
            <option value="Sirkuit Elektronik" <?php if ($kategori == 'Sirkuit Elektronik') echo 'selected'; ?>>Sirkuit Elektronik</option>
        </select><br><br>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="">Pilih Rating</option>
            <option value="1" <?php if ($rating == '1') echo 'selected'; ?>>1</option>
            <option value="2" <?php if ($rating == '2') echo 'selected'; ?>>2</option>
            <option value="3" <?php if ($rating == '3') echo 'selected'; ?>>3</option>
            <option value="4" <?php if ($rating == '4') echo 'selected'; ?>>4</option>
            <option value="5" <?php if ($rating == '5') echo 'selected'; ?>>5</option>
        </select><br><br>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="<?php echo $harga; ?>" step="0.01" required><br><br>

        <label for="file">Unggah File Baru (opsional):</label>
        <input type="file" id="file" name="file"><br><br>
        <p>File saat ini: <?php echo $currentFile ? "<a href='$currentFilePath'>$currentFile</a>" : 'Tidak ada file'; ?></p><br>

        <div class="button-container">   
            <input class="submit" type="submit" value="Simpan Perubahan">
            <a class="submit" href="CRUD.php">Batal</a>
        </div>
    </form>
</body>
</html>

<?php
$conn->close();
?>
