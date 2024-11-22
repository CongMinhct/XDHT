<?php
include('includes/db.php');
$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $sql = "UPDATE books SET title = '$title', author = '$author', year = '$year', description = '$description' WHERE id = $id";
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
    <title>Edit Book</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Edit Book</h1>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
        
        <label for="author">Author:</label>
        <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>

        <label for="year">Year:</label>
        <input type="number" name="year" value="<?php echo $row['year']; ?>" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $row['description']; ?></textarea><br>

        <button type="submit">Update Book</button>
    </form>
</body>
</html>
