<?php 
    session_start();
    include('..\includes\connect.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            array_push($errors, "Email is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM users WHERE email = '$email'AND password = '$password' ";
            $result = $con->query( $query );

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "Your are now logged in";
                header("location: ../../material-dashboard-master/index.php");
            } else {
                array_push($errors, "Wrong Email or Password");
                $_SESSION['error'] = "Wrong Email or Password!";
                header("location: ../login/login.php");
            }
        } else {
            array_push($errors, "Email & Password is required");
            $_SESSION['error'] = "Email & Password is required";
            header("location: ../login/login.php");
        }
    }

?>