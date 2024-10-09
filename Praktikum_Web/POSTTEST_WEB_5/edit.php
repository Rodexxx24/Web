<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Robot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$id_item = $_GET['id'];
$sql = "SELECT id_item, nama_item, kategori, rating, harga FROM Katalog WHERE id_item = '$id_item'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_item = $row['nama_item'];
    $kategori = $row['kategori'];
    $rating = $row['rating'];
    $harga = $row['harga'];
} else {
    echo "Data tidak ditemukan.";
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_item = $_POST['nama_item'];
    $kategori = $_POST['kategori'];
    $rating = $_POST['rating'];
    $harga = $_POST['harga'];

    $sql = "UPDATE Katalog SET 
            nama_item = '$nama_item',
            kategori = '$kategori',
            rating = '$rating',
            harga = '$harga'
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
    <form action="" method="post">
        <label for="nama_item">Nama Barang:</label>
        <input type="text" id="nama_item" name="nama_item" value="<?php echo $nama_item; ?>" required><br><br>
        
        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Micro Controller" <?php if ($kategori == 'microcontroller') echo 'selected'; ?>>Micro Controller</option>
            <option value="Sensor" <?php if ($kategori == 'sensor') echo 'selected'; ?>>Sensor</option>
            <option value="Power Supply" <?php if ($kategori == 'power_supply') echo 'selected'; ?>>Power Supply</option>
            <option value="Sirkuit Elektronik" <?php if ($kategori == 'sirkuit_elektronik') echo 'selected'; ?>>Sirkuit Elektronik</option>
            <!-- Tambahkan kategori lain jika diperlukan -->
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
