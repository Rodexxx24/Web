<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Robot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function generateID($conn, $kategori) {
    $sql = "SELECT COUNT(*) as total FROM Katalog WHERE kategori = '$kategori'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['total'] + 1;
    
    $prefix = strtoupper(substr($kategori, 0, 3));
    $id = $prefix . "-" . str_pad($count, 5, "0", STR_PAD_LEFT);
    
    return $id;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_item = $_POST['nama_item'];
    $kategori = $_POST['kategori'];
    $rating = $_POST['rating'];
    $harga = $_POST['harga'];
    $id_item = generateID($conn, $kategori);

    $sql = "INSERT INTO Katalog (id_item, nama_item, kategori, rating, harga) 
            VALUES ('$id_item', '$nama_item', '$kategori', '$rating', '$harga')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: CRUD.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang Baru</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <h2>Tambah Barang Baru</h2>
    <form action="" method="post">
        <label for="nama_item">Nama Barang:</label>
        <input type="text" id="nama_item" name="nama_item" required><br><br>
        
        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Micro Controller">Micro Controller</option>
            <option value="Sirkuit Elektronik">Sirkuit Elektronik</option>
            <option value="Sensor">Sensor</option>
            <option value="Power Supply">Power-Supply</option>
            <!-- Tambahkan kategori lain jika diperlukan -->
        </select><br><br>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="">Pilih Rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" step="0.01" required><br><br>

        <div class="button-container">
            <input class="submit" type="submit" value="Tambahkan Data">
            <button type="button" onclick="window.location.href='CRUD.php'">Batal</button>
        </div>
    </form>
</body>
</html>

<?php
$conn->close();
?>
