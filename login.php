<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .login-container {
            text-align: center;
            padding: 30px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            border: 2px solid darkblue;
        }
        input {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h3>Login</h3>
    <form method="POST" action="user.php">
        <label for="user-id">User-ID</label>
        <input type="text" id="user-id" name="user-id" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Enter</button>
    </form>
</div>

</body>
</html>
