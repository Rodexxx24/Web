<?php 
include 'koneksi.php'; // Include database connection

// Query to fetch all items from the katalog table
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
    <a href="create.php">Add New Item</a> <!-- Link to add new item -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Item</th>
            <th>Harga</th>
            <th>Kategori</th>
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
                        <a href="edit.php?id=<?php echo $row['id_item']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?php echo $row['id_item']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No records found</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
