<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="../../../public/assets/css/signup.css"/>
</head>
<body>
    <div class="container">
        <div class="header">
            Access Your Existing Account
        </div>
        <div class="form-container">
            <form action="../../controllers/signin-controllers.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Login</button>
            </form>
            <div class="form-link">
                <p>Don't have an account? <a href="signup.php">Register Here</a></p>
            </div>
        </div>
        <?php include "./layout/footer.php" ?>
    </div>
</body>
</html>
