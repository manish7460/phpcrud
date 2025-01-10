<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        /* Add similar styling as your login form for consistency */
    </style>
</head>
<body>

    <div class="reset-password-container">
        <h2>Reset Password</h2>
        <form method="POST" action="update_password.php">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <input type="password" name="new_password" placeholder="Enter new password" required>
            <button type="submit">Update Password</button>
        </form>
    </div>

</body>
</html>
