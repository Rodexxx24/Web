<?php 
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_item = $_GET['id'];
    $sql = "DELETE FROM katalog WHERE id_item = '$id_item'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: CRUD.php"); 
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID provided.";
}
?>
