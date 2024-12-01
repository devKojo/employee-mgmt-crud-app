<?php
session_start();
if(isset($_GET['record'])){
    $query = $_GET['record'];

    $users = $_SESSION['getAllUsers'];

foreach ($users as $index => $value) {
    if($value['id'] == $query){
        $_SESSION['edit-record'] = $value;
    }
}
}

function isUpdate(){
   return isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Signup</title>
    <link rel="stylesheet" href="../../../public/assets/css/signup.css"/>
</head>
<body>
    <div class="container">
        <div class="header">
            
            <?php if(isUpdate()): ?>
                Update Details
            <?php else: ?>
                Create a new Account
            <?php endif; ?>
        </div>
        <div class="form-container">
            <form action="
            <?php if(isUpdate()): ?>
            <?php else: ?>
                ../../controllers/signup-controllers.php
            <?php endif; ?>
                "
             method="POST">
                <?php if(isUpdate()):
                $editUser = $_SESSION['edit-record'];
                $id = $editUser['id'];
                $firstName = $editUser['firstName'];
                $lastName = $editUser['lastName'];
                $email = $editUser['email'];
                $phone = $editUser['phone'];
                $department = $editUser['department'];
                $role = $editUser['role'];
                $password = $editUser['password'];
                ?>
                <?php else:
                 $editUser = '';
                 $id = '';
                 $firstName = '';
                 $lastName = '';
                 $email = '';
                 $phone = '';
                 $department = '';
                 $role = '';
                 $password = '';
                ?>

                <?php endif ?>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $firstName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="<?php if(isUpdate())echo $lastName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <!-- <select id="department" name="department" value="<?php echo $department; ?>" required>
                        <option value="" disabled selected>Select a Department</option>
                        <option value="HR">HR</option>
                        <option value="IT">IT</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                    </select> -->
                    <select id="department" name="department" required>
                        <option value="" disabled <?php echo empty($department) ? 'selected' : ''; ?>>Select a Department</option>
                        <option value="HR" <?php echo ($department == 'HR') ? 'selected' : ''; ?>>HR</option>
                        <option value="IT" <?php echo ($department == 'IT') ? 'selected' : ''; ?>>IT</option>
                        <option value="Finance" <?php echo ($department == 'Finance') ? 'selected' : ''; ?>>Finance</option>
                        <option value="Marketing" <?php echo ($department == 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <!-- <select id="role" name="role" value="<?php echo $role; ?>" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="Staff">Staff</option>
                        <option value="Admin">Admin</option>
                        <option value="Visitor">Visitor</option>
                        <option value="Partner">Partner</option>
                    </select> -->
                    <select id="role" name="role" required>
                        <option value="" disabled <?php echo empty($role) ? 'selected' : ''; ?>>Select your role</option>
                        <option value="Staff" <?php echo ($role == 'Staff') ? 'selected' : ''; ?>>Staff</option>
                        <option value="Admin" <?php echo ($role == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="Visitor" <?php echo ($role == 'Visitor') ? 'selected' : ''; ?>>Visitor</option>
                        <option value="Partner" <?php echo ($role == 'Partner') ? 'selected' : ''; ?>>Partner</option>
                    </select>

                </div>

                <div class="form-group">
                    <label for="password">
                        <?php if(isUpdate()):?>
                            Change password
                            <?php else:?>
                                Choose Password
                        <?php endif?>
                    </label>
                    <input type="text" id="password" name="password" value="<?php echo $password; ?>" required>
                </div>
                
                <?php if(isUpdate()):?>
                    <button type="submit" class="submit-btn" name="update_submit-btn">
                        Update
                    </button>
                    <?php else: ?>
                <button type="submit" class="submit-btn" name="signup_submit-btn">
                Register
                </button>
                    <?php endif?>
                </button>
            </form>
            <div class="form-link">
                <?php if(isUpdate()): ?>
                
                    <?php else: ?>
                <p>Already have an account? <a href="login.php">Login Here</a></p>
                <?php endif?>
            </div>
        </div>
       <?php include "./layout/footer.php" ?>
    </div>
</body>
</html>
