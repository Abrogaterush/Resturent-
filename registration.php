<?php
 include "Functions/connect.php";

 $username = $password = $confirm_password = "";
 $username_err = $password_err = $confirm_password_err = "";

 if ($_SERVER['REQUEST_METHOD']=="POST") {
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
        echo "$username_err";
    }else{
        $sql = "SELECT id FROM login_system WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken";
                    echo "$username_err"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);
    // Check for password
if(empty(trim($_POST['password']))){        
    $password_err = "Password cannot be blank";
    echo"$password_err";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
    echo"$password_err";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
    echo"$password_err";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO login_system (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: admin_login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
     }
       mysqli_stmt_close($stmt);
     }
     mysqli_close($conn);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<?php include ("Partials/header.php"); ?>
    
    <div class="Login_form">
        <h1>Registration</h1>
            <form action="" method="post">
            <input type="text" name="username" placeholder="User Name" require>
            <input type="password" name="password" placeholder="Password" minlength = "6" maxlength = "9" require>
            <input type="password" name="confirm_password" placeholder="Confirm Password" minlength = "6" maxlength = "9" require>
            <input type="submit" value="Submit">
            </form>
    </div>
</body>
</html>