<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div>
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
              <label for="username-input">Username: </label>
              <input type="text" class="form-control" id="username-input" name="username">
            </div>
            <div class="form-group">
              <label for="pw-input">Password: </label>
              <input type="password" class="form-control" id="pw-input" name="password">
            </div>
            <div class="form-group">
              <label for="email-input">Email Address: </label>
              <input type="email" class="form-control" id="email-input" aria-describedby="email-help" name="email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div>
              <button type="submit" class="btn btn-primary" name="register">Register!</button>
            </div>
            <p>
                Already registered? <a href="login.php">Sign in</a>
            </p>
        </form>
    </div>
</body>
</html>