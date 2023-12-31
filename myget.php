<?php 





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <link rel="stylesheet" href="styles.css">


    <style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
}

header {
    background-color: #333;
    color: white;
    padding: 10px 0;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

nav li {
    display: inline;
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: 1.2em;
}

main {
    padding: 20px 0;
}

.featured-books {
    margin-bottom: 40px;
}

.book-card {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    text-align: center;
}

.book-card img {
    max-width: 100%;
}

.about-us {
    margin-bottom: 40px;
}

footer {
    background-color: #333;
    color: white;
    padding: 10px 0;
    text-align: center;
}

        </style>
</head>
<body>

<header>
    <div class="container">
        <h1>Bookstore</h1>
        <nav>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Authors</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <section class="featured-books">
        <h2>Featured Books</h2>
        <?php
        // Your PHP code to fetch and display featured books goes here
        // Example:
        for ($i = 1; $i <= 3; $i++) {
            echo '<div class="book-card">';
            echo '<img src="book' . $i . '.jpg" alt="Book ' . $i . '">';
            echo '<h3>Book Title ' . $i . '</h3>';
            echo '<p>Author: Author Name ' . $i . '</p>';
            echo '</div>';
        }
        ?>
    </section>

    <section class="about-us">
        <h2>About Us</h2>
        <p>Welcome to our bookstore! We offer a wide range of books from various genres. Explore our collection and find your next favorite read.</p>
    </section>
</main>

<footer>
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> Bookstore. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
