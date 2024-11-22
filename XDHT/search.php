<?php
include('includes/db.php');
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Search Books</h1>
    <form method="GET">
        <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Search for books">
        <button type="submit">Search</button>
    </form>
    <div class="books-list">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="book-item">
                <h2><?php echo $row['title']; ?></h2>
                <p><strong>Author:</strong> <?php echo $row['author']; ?></p>
                <p><strong>Year:</strong> <?php echo $row['year']; ?></p>
                <p><?php echo $row['description']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
