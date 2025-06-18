<?php
include("db_config.php");  // Contains your DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));

    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("INSERT INTO newsletter (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        
        if ($stmt->execute()) {
            echo "Thank you for subscribing!";
        } else {
            echo "Error: Could not save your details.";
        }

        $stmt->close();
    } else {
        echo "Invalid input.";
    }
    $conn->close();
}
?>
