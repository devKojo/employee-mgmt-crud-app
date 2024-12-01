<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="stylesheet" href="../../../public/assets/css/signup.css"/>
</head>
<body>
    <div class="container">
        <div class="header">
            Create User
        </div>
        <div class="form-container">
            <form action="../../controllers/create-user-controller.php"
             method="POST">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
         
                    <select id="department" name="department" required>
                        <option value="" disabled>Select a Department</option>
                        <option value="HR">HR</option>
                        <option value="IT">IT</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="" disabled >Select your role</option>
                        <option value="Staff">Staff</option>
                        <option value="Admin">Admin</option>
                        <option value="Visitor">Visitor</option>
                        <option value="Partner">Partner</option>
                    </select>

                </div>

                <div class="form-group">
                    <label for="password">
                    Choose Password
                    </label>
                    <input type="text" id="password" name="password" required>
                </div>
                
                <button type="submit" class="submit-btn" name="signup_submit-btn">
                Create User
                </button>
                </button>
            </form>
        </div>
       <?php include "./layout/footer.php" ?>
    </div>
</body>
</html>
