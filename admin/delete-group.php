<?php
// Include database connection file
include "../dbconn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the group ID from the form submission
    $groupID = $_POST["group_id"];

    // Delete the group from the database
    $sql = "DELETE FROM whatsapp_groups WHERE id = $groupID";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the group list page
        header("Location: manage-groups.php");
        exit();
    } else {
        echo "Error deleting group: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
