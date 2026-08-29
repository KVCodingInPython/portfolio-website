<?php

session_start();

$logged_in = isset($_SESSION['email']);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Error: Invalid request method.');
}

$title = trim($_POST['title']);
$content = trim($_POST['content']);

if ($title === '') {
    die('Error: Title is required.');
}

if ($content === '') {
    die('Error: Content is required.');
}

if ($logged_in === false) {
    die('Error: You must be logged in to post.');
}

date_default_timezone_set('UTC');
// store in MySQL DATETIME format (UTC)
$date_db = date('Y-m-d H:i:s');

$servername = '127.0.0.1';
$username = 'root';
$db_password = 'root';
$dbname = 'posts';

// Create connection
$conn = new mysqli($servername, $username, $db_password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    if ($title == "") {
        die("Error: Title is required.");
    }

    // Validate content
    if ($content == "") {
        die("Error: Content is required.");
    }

    if ($logged_in == false) {
        die("Error: You must be logged in to post.");
    }

    // Prepared insert into the POSTS table (table name on your DB is 'POSTS')
    $sql = "INSERT INTO `POSTS` (title, content, date) VALUES ('$title', '$content', '$date_db')";
    $result = $conn->query($sql);
    if ($result === true) {
        header('Location: ../php/viewBlog.php');
        exit();
    } 
    else {
        echo 'Error inserting post: ' . $conn->error;
    }
}


else {
    die("Error: Invalid request method.");    
}
$conn->close();

?>