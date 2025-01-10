<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        /* Add similar styling as your login form for consistency */
    </style>
</head>
<body>

    <div class="forgot-password-container">
        <h2>Forgot Password</h2>
        <form method="POST" action="send_reset_link.php">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Send Reset Link</button>
        </form>
    </div>

</body>
</html>
