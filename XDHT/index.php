<?php
include('includes/db.php');

// Xử lý tìm kiếm nếu có
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
    <title>Library System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="manage_books.php">Manage Books</a></li>
            <li><a href="add_book.php">Add Book</a></li>
            <li><a href="edit_book.php">Edit Book</a></li>
            <li>
                <!-- Form tìm kiếm -->
                <form action="index.php" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Search Books..." value="<?php echo $searchQuery; ?>" />
                    <button type="submit">Search</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <h1>Library Books</h1>
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
