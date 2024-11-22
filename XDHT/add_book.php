<?php
include('includes/db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO books (title, author, year, description) VALUES ('$title', '$author', '$year', '$description')";
    if ($conn->query($sql) === TRUE) {
        header('Location: manage_books.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Add New Book</h1>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        
        <label for="author">Author:</label>
        <input type="text" name="author" required><br>

        <label for="year">Year:</label>
        <input type="number" name="year" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>

        <button type="submit">Add Book</button>
    </form>
</body>
</html>
