<?php

session_start();
$logged_in = isset($_SESSION['email']);

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);

$servername = "127.0.0.1";
$username = "root";
$db_password = "root";
$dbname = "users";

// Create connection 
$conn = new mysqli($servername, $username, $db_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if ($email == "") {
        die("Error: Email is required.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    // Validate password
    if ($password == "") {
        die("Error: Password is required.");
    }
    else if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }
    else {
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $sql = "SELECT password FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $fetch = $row['password'];
            if ($fetch == $password) {
                $logged_in = true;
                $_SESSION['email'] = $email;
                if ($_SESSION['email'] == 'kaloyanvelikov8@gmail.com12') {
                    header("Location:  ../php/addEntry.php");
                    exit();
                }
                else {
                    header("Location: ../php/viewBlog.php");
                    exit();
                }
            }
            else {
                echo "Email already exists.";
                header("Location: ../php/login.php");
                die("Error: Email already exists.");
            }
        }
        else if ($result->num_rows == 0) {
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            $result = $conn->query($sql);
            $logged_in = true;
            $_SESSION['email'] = $email;
            if ($_SESSION['email'] == 'kaloyanvelikov8@gmail.com')
            {
                header("Location:  ../php/addEntry.php");
                exit();
            }
            else {
                header("Location: ../php/viewBlog.php");
                exit();
            }
        }
    }

}

else {
    die("Error: Invalid request method.");    
}
$conn->close();
?>