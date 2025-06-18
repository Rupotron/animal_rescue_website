<?php
include("db_config.php");

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$amount = $_POST['amount'] ?? 0;

if ($name && $email && $amount > 0) {
    // 1. Save to DB
    $stmt = $conn->prepare("INSERT INTO donations (name, email, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $email, $amount);
    $stmt->execute();
    $stmt->close();

    // 2. Send Email Notification to Admin
    $admin_email = "admin@yourdomain.com"; // CHANGE to your actual admin email
    $subject = "New Donation Received";
    $message = "
        A new donation has been made:

        Name: $name
        Email: $email
        Amount: ₹$amount

        Please verify the payment in your UPI app.
    ";
    $headers = "From: dasrup4545@gmail.com\r\n"; // Use your domain email
    $headers .= "Reply-To: $email\r\n";

    mail($admin_email, $subject, $message, $headers);
}

$conn->close();
?>