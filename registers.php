<?php
@include 'register.php'; 

if (isset($_POST['submit_department'])) {
    
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $head = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['password']);
    

    $sql = "INSERT INTO department (username, email, password) VALUES (?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        
        $stmt->bind_param("sss", $username, $email, $password);
        
        if ($stmt->execute()) {
            echo "<p style='text-align: center; color: green;'>Department registered successfully!</p>";
        } else {
            echo "<p style='text-align: center; color: red;'>Error: " . $stmt->error . "</p>";
        }
        
        $stmt->close();
    } else {
        echo "<p style='text-align: center; color: red;'>Error preparing statement: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Finances Tracker - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* General Body Styles */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #000000;
            color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 0 20px;
            position: relative;
            min-height: 100vh;
            overflow: auto;
        }

        .app-branding {
            text-align: center;
            margin-bottom: 40px;
            width: 100%;
        }

        .app-branding img {
            width: 120px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .app-branding img:hover {
            transform: scale(1.1);
        }

        .app-branding h1 {
            font-size: 2.5rem;
            color: #ff8c00;
            margin: 0;
            font-weight: 500;
        }

        .app-branding p {
            font-size: 1rem;
            color: #a1a1a1;
            margin-top: 8px;
            font-weight: 400;
        }

        .form-container {
            background-color: #2d2d2d;
            padding: 40px 35px;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 450px;
            border-left: 6px solid #ff8c00;
            border-top: 6px solid #ff8c00;
            text-align: center;
            box-sizing: border-box;
        }

        .form-container h2 {
            color: #ff8c00;
            font-size: 1.8rem;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #dcdcdc;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 15px;
            border: 1px solid #444;
            border-radius: 8px;
            background-color: #444;
            color: white;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #ff8c00;
            background-color: #555;
            outline: none;
        }

        input[type="submit"] {
            background-color: #ff8c00;
            color: white;
            border: none;
            padding: 15px;
            font-size: 16px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #e77f00;
        }

        .divider {
            margin: 20px 0;
            border-top: 2px solid #ff8c00;
        }

        .alternative-options {
            margin: 20px 0;
        }

        .auth-buttons a {
            background-color: #fff;
            color: #444;
            text-decoration: none;
            border: 1px solid #ddd;
            padding: 12px;
            margin: 8px 0;
            display: block;
            width: 100%;
            text-align: center;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .auth-buttons a:hover {
            background-color: #f7f7f7;
            transform: translateY(-2px);
        }

        .auth-buttons img {
            width: 20px;
            height: 20px;
        }

        .login-link a {
            color: #ff8c00;
            font-size: 14px;
            text-decoration: none;
        }

        .login-link a:hover {
            color: #e77f00;
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 30px 20px;
            }

            .app-branding h1 {
                font-size: 2rem;
            }

            .form-container h2 {
                font-size: 1.5rem;
            }

            input[type="text"], input[type="email"], input[type="password"] {
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 14px;
            }

            .auth-buttons a {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="app-branding">
        <img src="logo.png" alt="My Finances Tracker Logo">
        <h1>My Finances Tracker</h1>
        <p>Manage your finances with ease and precision.</p>
    </div>

    <div class="form-container">
        <h2>Create a New Account</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
            </div>
            <input type="submit" value="Register">
        </form>
        <div class="divider"></div>
        <div class="alternative-options">
            <h3>Or sign up with:</h3>
            <div class="auth-buttons">
                <a href="https://accounts.google.com/" target="_blank">
                    <img src="google.png" alt="Google Icon">
                    Sign up with Google
                </a>
                <a href="https://appleid.apple.com/" target="_blank">
                    <img src="apple.png" alt="Apple Icon">
                    Sign up with Apple
                </a>
                <a href="https://www.facebook.com/" target="_blank">
                    <img src="facebook.png" alt="Facebook Icon">
                    Sign up with Facebook
                </a>
            </div>
        </div>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

    <p>&copy; 2024 My Finances Tracker. All Rights Reserved.</p>
</body>
</html>
