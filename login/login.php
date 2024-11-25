<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <title>Log-In</title>
    
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h1>Create Account</h1>
                <?php
                    include 'connect.php';
                    $message = "e";
                    if(isset($_POST['signup'])){
                        if(!empty($_POST['fname'])&& !empty($_POST['email'])&& !empty($_POST['password'])){
                            $fname = $_POST['fname'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $password=md5($password);
                    
                            $checkEmail = "SELECT * From users where email='$email'";
                            $result = $conn->query($checkEmail);
                            if($result->num_rows > 0){
                                echo "<p>Email Address already exist</p>";
                            }else{
                                $insertQuery="INSERT INTO users(fname,email,password)
                                            VALUES('$fname', '$email', '$password')";
                                if($conn->query($insertQuery)==TRUE){
                                    header("location: login.php");
                                    exit();
                                }else{
                                    $message = "Error: " . $conn->error;
                                }
                            }
                        }else{
                            $message = "Please fill the requirements";
                        }
                    }
                ?>     
                <input type="text" placeholder="Name" name="fname">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password"/>
                <input type = "submit" name = "signup" id = "signup" value = "Sign Up"> 
                <p>
                    <?php
                        echo $message;
                    ?>
                </p>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method = 'POST'>
                <?php
                    include 'connect.php';
                    $message2="";
                    if(isset($_POST['signin'])){
                        if(isset($_POST['email']) && isset($_POST['password'])){
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $password=md5($password);
                    
                            $sql = "SELECT * FROM users WHERE email='$email' and password = '$password'";
                            $result=$conn->query($sql);
                            if($result->num_rows>0){
                                session_start();
                                $row=$result->fetch_assoc();
                                $_SESSION['user_id'] = $row['id']; 
                                header("Location: ../index.php");
                                exit();
                            }else{
                                $message2 = "Email or password is incorrect";
                            }
                        }else{
                            $message2 = "Please insert the email and password";
                        }  
                    }
                ?>
                <h1>Sign in</h1>
                <input type="email" placeholder="Email" name = "email">
                <input type="password" placeholder="Password" name = "password">
                <input type = "submit" name = "signin" id = "submit" value = "sign in">
                <p class = "red">
                    <?php
                        echo $message2;
                    ?>
                </p>
                
                
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>WELCOME TO KALVIN</h1>
                    <p>Sign-In to start your shopping spree!</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Shopper!</h1>
                    <p>Log-In to continue your shopping and enduldge to our products.</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
        <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p>
    </footer>
    </div>

    
    <script src="./login.js"></script>
</body>
</html>