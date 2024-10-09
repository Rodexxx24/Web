<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Robot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id_item, nama_item, kategori, rating, harga FROM Katalog";
$result = $conn->query($sql);

echo "<div style='margin-bottom: 20px;'>
        <a href='create.php'>
            <button>Tambah Barang</button>
        </a>
      </div>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Rating</th>
        <th>Harga</th>
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
        echo "<td>
                <a href='edit.php?id=" . $row["id_item"] . "'>Edit</a> | 
                <a href='delete.php?id=" . $row["id_item"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus item ini?\")'>Hapus</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada data yang ditemukan</td></tr>";
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