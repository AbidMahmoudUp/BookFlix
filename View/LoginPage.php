<?php

include('../Core/User.php');

//------ init configuration file -----------//
include('../Model/ConfigGoogle.php');
//------- end config file ------------//


// authenticate code from Google OAuth Flow



//-----------------------------------------

if (isset($_GET['Login'])) {
    $userController = new CrudUser();

    $userEmail = $_GET['email'];
    $userPassword = ($_GET['password']);
    if ($userEmail != null && $userEmail != "") {

        $_SESSION['userEmail'] = $userEmail;
    }
    if ($userPassword != null && $userPassword != "") {
        $_SESSION['userPassword'] = $userPassword;
    }

    $userController->Verifie($userEmail, $userPassword);
}
$phone_number = $photo = "";

$username = $email = $password = $confirmePassword = "";

$errors = array('username' => '', 'password' => '', 'confirmePassword' => '', 'email' => '');

if (isset($_POST['submit'])) //if there is data on the input filed
{
    if (empty($_POST['username'])) //if the filed of the username is empty
    {
        //$errors['username'] = "You have to enter your Username ";

    } else {
        htmlspecialchars($username = $_POST['username']);

        if (!preg_match('/^[a-zA-Z\s]+$/', $username)) {
            // echo "Username must be letters and spaces only";
        }
    }
    if (empty($_POST['password'])) //if the filed of the Password is empty
    {
        //$errors['password'] = "try an other password please ";

    } else {
        $password = md5($_POST['password']);
    }
    if (empty($_POST['phone_number'])) //if the filed of the ConfirmePassword is empty
    {
        //$errors['confirmePassword'] = "You have to confirme your password !";

    } else {

        htmlspecialchars($phone_number = $_POST['phone_number']);
    }
    if (empty($_POST['email'])) //if the filed of the email is empty
    {
        // $errors['email'] = "try an other email please ";
    } else {
        htmlspecialchars($email = $_POST['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            //  echo 'Email must be a valid email address';
        }
    }
    if (array_filter($errors)) {
        //echo "error form invalid";
        //we can implimente the pop up of failed here
    } else {
        echo "form valid";

        $user = new User('', $username, $password, $email, $phone_number, $photo);

        CrudUser::insert($user);

        //We can implimente the pop up of success here
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Project Name</title>
    <link rel="stylesheet" href="styleLogin.css">
    <script src="https://kit.fontawesome.com/e326d32ffe.js" crossorigin="anonymous"></script>
    <script src="Validation-Admin.js"></script>
 
</head>

<body>
    <!-- <h2>Weekly Coding Challenge #1: Sign in/up Form</h2> -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="post" name="userForm" oninput="return verif()">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="<?php $client->createAuthUrl(); ?>" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php $client->createAuthUrl(); ?>" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" id="username" onkeydown="return /[a-z]/i.test(event.key)" name="username" autofocus placeholder="Username" value="<?php echo htmlspecialchars($username) ?>"required>
                <span id="username-msg"></span>
                <input type="email" id="email-form" name="email" autofocus placeholder="Email Adresse" value="<?php echo htmlspecialchars($email) ?>"required>
                <span id="email-msg"></span>
                <input type="password" id="password-form" name="password" autofocus placeholder="password" value="<?php echo htmlspecialchars($password) ?>"required>
                <span id="password-msg"></span>
                <input type="text" id="phone-form" name="phone_number" placeholder="Phone Number" required/>
                <span id="phone-msg"></span>
                <button type="submit" name="submit">Sign Up</button>
            </form>


        </div>
        
        <!-- ./now-ui-dashboard-master/examples/dashboard.php -->
        <div class="form-container sign-in-container">
            <form action="" method="get">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $client->createAuthUrl(); ?>" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <a href="forgetPassword1.php">Forgot your password?</a>

                <button name="Login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <button type="submit"  name="submit" onclick="navigateToPHPFunction()">Sign Up</button> -->
    <footer>
        <p>
            Copy Right 2022-2023
        </p>
    </footer>
    <script src="main.js">

    </script>
    
</body>

</html>