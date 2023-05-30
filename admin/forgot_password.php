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
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Forgot Password</h3>
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter your Email">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                    <br>
                    <p><a href="login.php">Back to login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>