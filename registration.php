<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Roboto:wght@300;700&family=Signika&family=Source+Code+Pro:wght@200&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {

        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);

        $age = stripslashes($_REQUEST['name']);
        $age = mysqli_real_escape_string($con, $age);

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
  
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);


        $query    = "INSERT into `users` (name, age, username, password)
                     VALUES ('$name','$age','$username','" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title reg">Registration</h1>

        <label for="name">Name</label>
        <input type="text" class="login-input" name="name" placeholder="name" required />

        <label for="age">Age</label>
        <input type="number" class="login-input" name="age" placeholder="age" required>

        <label for="username">Username</label>
        <input type="username" class="login-input" name="username" placeholder="username" required>

        <label for="password">Password</label>
        <input type="password" class="login-input" name="password" placeholder="Password" required>


        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
