<?php
include("db_config.php");

$name     = $_POST['name'] ?? '';
$email    = $_POST['email'] ?? '';
$date     = $_POST['date'] ?? '';
$time     = $_POST['time'] ?? '';
$service  = $_POST['service'] ?? '';
$location = $_POST['location'] ?? '';

if ($name && $email && $date && $time && $service && $location) {
    $stmt = $conn->prepare("INSERT INTO appointments (name, email, date, time, service, location) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssssss", $name, $email, $date, $time, $service, $location);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: ../thankyou.html");  // ✅ redirect after success
        exit();
    } else {
        echo "Database error: " . $conn->error;
    }
} else {
    echo "All fields are required!";
}
?>
