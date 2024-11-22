<?php
include('includes/db.php');
$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header('Location: manage_books.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
