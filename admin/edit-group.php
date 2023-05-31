<?php
// Include database connection file
include "../dbconn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the edit form is submitted with the group ID
    if (isset($_POST["edit_group_id"])) {
        // Get the group ID and updated values from the form submission
        $groupID = $_POST["edit_group_id"];
        $groupName = $_POST["edit_g_name"];
        $groupDescription = $_POST["edit_g_descript"];
        $groupLink = $_POST["edit_g_link"];

        // Update the group in the database
        $sql = "UPDATE whatsapp_groups SET g_name = '$groupName', g_descript = '$groupDescription', g_link = '$groupLink' WHERE id = $groupID";
        if ($conn->query($sql) === TRUE) {
            // Redirect back to the group list page
            header("Location: manage-groups.php");
            exit();
        } else {
            echo "Error updating group: " . $conn->error;
        }
    } else {
        echo "Invalid request!";
    }
}

// Close the database connection
$conn->close();
