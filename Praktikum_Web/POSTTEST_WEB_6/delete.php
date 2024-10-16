<?php 
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_item = $_GET['id'];

    $sql = "SELECT file_path FROM katalog WHERE id_item = '$id_item'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filePath = $row['file_path'];

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $sql = "DELETE FROM katalog WHERE id_item = '$id_item'";
        if ($conn->query($sql) === TRUE) {
            header("Location: CRUD.php"); 
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Record not found.";
    }
} else {
    echo "No ID provided.";
}
?>
