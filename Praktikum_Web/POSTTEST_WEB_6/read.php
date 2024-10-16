<?php 
include 'koneksi.php';

$sql = "SELECT * FROM katalog";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>
</head>
<body>
    <h1>Item List</h1>
    <a href="create.php">Add New Item</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Item</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>File</th>
            <th>Action</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_item']; ?></td>
                    <td><?php echo $row['nama_item']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td>
                        <?php if (!empty($row['file_name'])): ?>
                            <a href="<?php echo $row['file_path']; ?>"><?php echo $row['file_name']; ?></a>
                        <?php else: ?>
                            No file
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id_item']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?php echo $row['id_item']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No records found</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
