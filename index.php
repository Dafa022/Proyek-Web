<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg,rgb(220, 199, 40),rgb(244, 20, 0),rgb(0, 51, 255));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 500px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 4px rgba(52, 152, 219, 0.5);
        }
        .login-btn {
            width: 99.5%;
            padding: 15px;
            background: #fc6060;
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .login-btn:hover {
            background: rgba(104, 105, 105, 0.62);
        }
        .error {
            text-align: center;
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .register a{
            text-decoration: none;
            color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])): ?>
            <div class="error">Invalid username or password!</div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="Username" id="Username" required>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="Password" id="Password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
            <div class="register">
                <h4>Tidak Punya Akun ?<a href="register.php"> Daftar Di Sini</a></h4>
            </div>
        </form>
    </div>
</body> 
</html>
