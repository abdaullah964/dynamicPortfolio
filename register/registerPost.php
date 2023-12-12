<?php 
    session_start();
    include('..\includes\connect.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM users WHERE name = '$username' OR email = '$email' LIMIT 1";
        $result_dup=$con->query($user_check_query);
        $result = mysqli_fetch_assoc($result_dup);

        if ($result) { // if user exists
            if ($result['username'] == $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] == $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password);

            $sql = "INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')";
            $con->query($sql);
            $_SESSION['username'] = $username;
           echo $_SESSION['success'] = "You are now logged in";
            header('location: ../login/login.php');
        } else {
            header("location: ../register/register.php");
        }
    }

?>