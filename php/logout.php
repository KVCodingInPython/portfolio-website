<?php 

session_start();
session_unset();
session_destroy();

header("Location: " . $_SERVER['HTTP_REFERER']);
echo "Logged out successfully.";
alert("Logged out successfully.");
exit();
?>  