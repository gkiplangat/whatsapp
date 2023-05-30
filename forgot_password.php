<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body,
        html {
            height: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .card {
            width: 350px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Forgot Password</h3>
                <form>
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter your Email">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <br>
                    <p><a href="index.php">Back to login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>