<?php
// Include database connection file
include "../dbconn.php";

// Retrieve data from the database
$sql = "SELECT * FROM whatsapp_groups";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group List</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center">Manage Your WhatsApp Groups</h3>
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGroupModal">Add New Whatsapp Group</button>
        </div>

        <!-- Add Group Modal -->
        <div class="modal fade" id="addGroupModal" tabindex="-1" role="dialog" aria-labelledby="addGroupModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGroupModalLabel">Add New Group</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="includes/add-group.php" method="POST">
                            <div class="form-group">
                                <label for="text">Group Name</label>
                                <input type="text" class="form-control" name="g_name" placeholder="Enter Group Name">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Group Description</label>
                                <input type="text" class="form-control" name="g_descript" placeholder="Enter Group Description">
                            </div>
                            <div class="form-group">
                                <label for="group-link">Group Link</label>
                                <input type="text" class="form-control" name="g_link" placeholder="Enter Group Link">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row["g_name"]; ?></td>
                                <td><a href="<?php echo $row["g_link"]; ?>">Click Here</a></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $row["id"]; ?>">Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row["id"]; ?>">Delete</button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row["id"]; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?php echo $row["id"]; ?>">Edit Group</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="edit-group.php" method="POST">
                                                <div class="form-group">
                                                    <input type="hidden" name="edit_group_id" value="<?php echo $row["id"]; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="edit-g_name">Group Name</label>
                                                    <input type="text" class="form-control" id="edit-g_name" name="edit_g_name" value="<?php echo $row["g_name"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit-g_descript">Group Description</label>
                                                    <input type="text" class="form-control" id="edit-g_descript" name="edit_g_descript" value="<?php echo $row["g_descript"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit-g_link">Group Link</label>
                                                    <input type="text" class="form-control" id="edit-g_link" name="edit_g_link" value="<?php echo $row["g_link"]; ?>">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $row["id"]; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel<?php echo $row["id"]; ?>">Delete Group</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete the group: <?php echo $row["g_name"]; ?>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="delete-group.php" method="POST" style="display: inline;">
                                                <input type="hidden" name="group_id" value="<?php echo $row["id"]; ?>">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4">No groups found</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>