<?php
include('includes/db.php');
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

$sql = "SELECT * FROM books WHERE title LIKE '%$searchQuery%' OR author LIKE '%$searchQuery%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
     <!-- Navbar -->
     <nav>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="manage_books.php">Manage Books</a></li>
            <li><a href="add_book.php">Add Book</a></li>
            <li>
                <!-- Form tìm kiếm -->
                <form action="index.php" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Search Books..." value="<?php echo $searchQuery; ?>" />
                    <button type="submit">Search</button>
                </form>
            </li>
        </ul>
    </nav>
    <h1>Manage Books</h1>
    <a href="add_book.php">Add New Book</a>
    <div class="books-list">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="book-item">
                <h2><?php echo $row['title']; ?></h2>
                <a href="edit_book.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_book.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
