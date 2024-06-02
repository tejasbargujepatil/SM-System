<?php

// Database connection parameters
$servername = "localhost"; // MySQL server hostname
$username = "root"; // MySQL username
$password = "@Suhana7136."; // MySQL password
$database = "student_enquiries"; // MySQL database name

// Create connection using mysqli extension
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO enquiries (name, email, contact, course) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $contact, $course);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Enquiry submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

?>
