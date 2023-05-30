<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!--Bostrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../main.css">
</head>

<body>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Register Here</h3>
                <form action="includes/add-user.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your Email">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter your Full Name">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="acc_code">Password</label>
                        <input type="number" class="form-control" name="acc_code" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <br>
                    <p>Already have an Account <a href="login.php">Login Here</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>