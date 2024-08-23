<?php
// Database connection
$servername = "localhost";  
$username = "root";        
$password = "Basket@87"; 
$dbname = "techsx";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$service = $_POST['service'];
$details = $_POST['details'];

// Insert data into database
$sql = "INSERT INTO service_requests (name, email, service, details) VALUES ('$name', '$email', '$service', '$details')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Send email notification
$to = "007kandi@gmail.com"; 
$subject = "New Service Request";
$message = "Name: $name\nEmail: $email\nService: $service\nDetails: $details";
$headers = "From: no-reply@example.com";

mail($to, $subject, $message, $headers);

// Close connection
$conn->close();
?>
