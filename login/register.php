<?php
    include 'connect.php';
    // session_start();
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $email = 'sarah@g';
    //     $password = 'password123';
    //     if ($_POST['email'] == $email && $_POST['password'] == $password) {
    //         $_SESSION['email'] = $email;
    //         $_SESSION['logged_in'] = true;
    //         header('Location: ../index.php');
    //         exit;
    //     }else {
    //         echo 'Invalid credentials!';
    //     }
    // }
    if(isset($_POST['signup'])){
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password=md5($password);

        $checkEmail = "SELECT * From users where email='$email'";
        $result = $conn->query($checkEmail);
        if($result->num_rows > 0){
            echo "Email Adress already exist";
        }else{
            $insertQuery="INSERT INTO users(fname,email,password)
                        VALUES('$fname', '$email', '$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: login.php");
            }else{
                echo "Error:".$conn->error;
            }
        }
    }

    if(isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password=md5($password);

        $sql = "SELECT * FROM users WHERE email='$email' and password = '$password'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            session_start();
            $row=$result->fetch_assoc();
            header("Location: ../index.php");
            exit();
        }else{
            echo "Email or password is incorrect";
        }
    }
?>