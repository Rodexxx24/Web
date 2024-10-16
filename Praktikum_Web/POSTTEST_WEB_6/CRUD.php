<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Robot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses Upload File
if (isset($_POST['upload'])) {
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $tmpName = $_FILES['file']['tmp_name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $maxFileSize = 1 * 1024 * 1024; // 1MB

    // Batas ukuran file
    if ($fileSize > $maxFileSize) {
        echo "Ukuran file terlalu besar. Maksimal 1MB.";
        exit();
    }

    // Penamaan file berdasarkan tanggal dan waktu
    $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
    $destination = 'uploads/' . $newFileName;

    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($tmpName, $destination)) {
        // Simpan informasi ke database
        $uploadTime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Katalog (file_name, file_path) VALUES ('$newFileName', '$destination')";
        if (mysqli_query($conn, $sql)) {
            echo "File berhasil diunggah!";
        } else {
            echo "Gagal menyimpan informasi file ke database.";
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

// Menampilkan Data Katalog
$sql = "SELECT id_item, nama_item, kategori, rating, harga, file_name, file_path FROM Katalog";
$result = $conn->query($sql);

echo "<div style='margin-bottom: 20px;'>
        <a href='create.php'>
            <button>Tambah Barang</button>
        </a>
      </div>";

echo "<form action='' method='POST' enctype='multipart/form-data'>
        <label for='file'>Unggah File:</label>
        <input type='file' name='file' required>
        <button type='submit' name='upload'>Upload File</button>
      </form>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Rating</th>
        <th>Harga</th>
        <th>File</th>
        <th>Aksi</th>
      </tr>";

if ($result->num_rows > 0) {
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row["id_item"] . "</td>";
        echo "<td>" . $row["nama_item"] . "</td>";
        echo "<td>" . $row["kategori"] . "</td>";
        echo "<td>" . $row["rating"] . "</td>";
        echo "<td>" . $row["harga"] . "</td>";
        echo "<td><a href='" . $row["file_path"] . "'>" . $row["file_name"] . "</a></td>";
        echo "<td>
                <a href='edit.php?id=" . $row["id_item"] . "'>Edit</a> | 
                <a href='delete.php?id=" . $row["id_item"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus item ini?\")'>Hapus</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Tidak ada data yang ditemukan</td></tr>";
}

echo "</table>";

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CRUD</title>
   <link rel="stylesheet" href="form.css">
</head>
<body>
   
</body>
</html>
