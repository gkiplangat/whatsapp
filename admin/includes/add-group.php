<?php
// Include database connection file
include "../../dbconn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["g_name"]) && isset($_POST["g_descript"]) && isset($_POST["g_link"])) {

        // Retrieve form data
        $g_name = $_POST["g_name"];
        $g_descript = $_POST["g_descript"];
        $g_link = $_POST["g_link"];

        // Check if email already exists in the database
        $stmt = $conn->prepare("SELECT * FROM whatsapp_groups WHERE g_link = ?");
    $stmt->bind_param("s", $g_link);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Error: Link already exists";
    } else {

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO whatsapp_groups (g_name, g_descript, g_link) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $g_name, $g_descript, $g_link);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Group Added successful";
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
