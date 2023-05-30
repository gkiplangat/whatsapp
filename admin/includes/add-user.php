<?php
// Include database connection file
include "../../dbconn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["fullname"]) && isset($_POST["password"])&& isset($_POST["acc_code"]) ) {

        // Retrieve form data
        $email = $_POST["email"];
        $fullName = $_POST["fullname"];
        $password = $_POST["password"];
        $acc_code = $_POST ["acc_code"];

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Error: Invalid email format";
            exit;
        }else
        // Check if email already exists in the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            echo "Error: Email already exists";
        }else{

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (email, fullname, password, acc_code) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $fullName, $password, $acc_code);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Registration successful";
        } else {
            echo "Error: Registration failed";
        }

        // Close the prepared statement
        $stmt->close();
        }
    } else {
        echo "Error: Form fields not set";
    }
}

// Close the database connection
$conn->close();
