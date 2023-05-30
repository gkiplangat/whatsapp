<?php include "../dbconn.php" ?>

<?php include "../dbconn.php"; ?>

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
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand navbar-success bg-success">
        <a class="navbar-brand text-light" href="home.php">Dashboard</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="manage-groups.php"><i class="fas fa-cogs"></i> Manage Groups</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar bg-light">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-groups.php"><i class="fas fa-cogs"></i>Manage Groups</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-cogs"></i> Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content -->
            <main role="main" class="col-md-10 ml-sm-auto">
                <div class="container py-5">
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM whatsapp_groups";
                        $query_run = mysqli_query($conn, $query);
                        $check_groups = mysqli_num_rows($query_run) > 0;

                        if ($check_groups) {
                            while ($row = mysqli_fetch_array($query_run)) {
                        ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="../images/logo.jfif" width="250px" height="250px" alt="whatsapp group">
                                            <h3 class="class-title"><?php echo $row["g_name"]; ?></h3>
                                            <p class="class-text"><?php echo $row["g_descript"]; ?></p>
                                            <h5 class="class-link"><a href="<?php echo $row["g_link"]; ?>">Join Here</a></h5>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No Whatsapp Group Found!";
                        }
                        ?>
                    </div>
                </div>
            </main>
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