<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set
    if (isset($_POST["email"]) && isset($_POST["fullname"]) && isset($_POST["password"])) {
        // Retrieve form data
        $email = $_POST["email"];
        $fullName = $_POST["fullname"];
        $password = $_POST["password"];

        // Validate and sanitize the data (you can add more validation if needed)

        // Database connection details
        $servername = "localhost"; // Replace with your server name
        $username = "username"; // Replace with your database username
        $password = "password"; // Replace with your database password
        $dbname = "database"; // Replace with your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (email, full_name, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $fullName, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Registration successful";
        } else {
            echo "Error: Registration failed";
        }

        // Close the prepared statement and the database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Error: Form fields not set";
    }
}
