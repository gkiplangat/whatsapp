<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add group</title>
    <!--Bostrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../main.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Group</h3>
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
                        <input type="group-link" class="form-control" name="g_link" placeholder="Enter Group Link">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>