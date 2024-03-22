<?php

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: admin_index.php");
    exit;
}
require_once "Functions/connect.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM login_system WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: admin_index.php");       
                        }
                    }
                }
    }
}    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        
    </style>
</head>
<body>
<?php include ("Partials/header.php"); ?>
    
    <div class="Login_form">
        <h1>Admin Portle</h1>
            <form action="" method="post">
            <input type="text" name="username" placeholder="User Name" require>
            <input type="password" name="password" placeholder="Password" minlength = "6" maxlength = "9" require>
            <input class="" type="submit" value="Submit">
            </form>
    </div>
</body>
</html>