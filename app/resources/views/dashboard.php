<?php
include __DIR__ . '/../../../config/database-config.php';
include __DIR__ . '/../../models/getAllUsers.php';

$login_page = 'location: login.php';

$user = $_SESSION['user'];
$firstName = $user['firstName'];
$fullName = $user['firstName'] . ' ' . $user['lastName'];
$email = $user['email'];
$role = $user['role'];

if(isset($_POST['logout_btn'])){
    session_destroy();
    header($login_page);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Dashboard</title>
    <link rel="stylesheet" href="../../../public/assets/dashboard.css">
    <script src="../../../public/assets/js/index.js" defer></script>

    <link rel="stylesheet" href="../../../public/assets/css/fontawesome.css">
    <link rel="stylesheet" href="../../../public/assets/css/modal.css">
    <link rel="stylesheet" href="../../../public/assets/css/dataTables.dataTables.css" />
</head>
<body>
    <div class="dashboard">
        <header>
            <div class="logo">Dashboard</div>
            <div class="user-info">
                <img src="https://via.placeholder.com/50" alt="User Avatar" class="avatar">
                <span><?php echo htmlspecialchars($fullName) . "!"; ?></span>
            </div>
        </header>
        <aside class="sidebar">
    <nav>
        <ul>
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="./createUser.php">
                <?php 
                if($role == 'admin' ){
                   echo 'New User';
                }
                ?>
            </a></li>
            <li><a href="#">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <button type="submit" id="logout" name="logout_btn" class="logout-btn">Logout</button></a>
                        </form>
                    </li>
        </ul>
    </nav>
</aside>
        <main>



            <section class="welcome">
                <h1>Welcome, <?php echo $firstName; ?></h1>
                <p><strong><?php echo $email; ?></strong> | <?php echo $role; ?></p>
            </section>

       <div class="statistics-cards">
            <div class="card">
            <i class="fas fa-users icon"></i>
            <h3>No. of Users</h3>
            <p><?php
                if($role == 'admin'){
                    echo count($_SESSION['getAllUsers']);
                }
            ?></p>
            </div>
            <div class="card">
            <i class="fas fa-user-shield icon"></i>
            <h3>No. of Admins</h3>
            <p></p>
            </div>
            <div class="card">
            <i class="fas fa-user-friends icon"></i>
            <h3>Total Users</h3>
            <p></p>
            </div>
        </div>

            <div class="table-container">
                <table id="userTable" class="display">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($role == 'admin') {
                                $allUsers = $_SESSION['getAllUsers'];
                                foreach ($allUsers as $user) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($user['firstName']) . '</td>';
                                    echo '<td>' . htmlspecialchars($user['lastName']) . '</td>';
                                    echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                                    echo '<td>' . htmlspecialchars($user['phone']) . '</td>';
                                    echo '<td>' . htmlspecialchars($user['department']) . '</td>';
                                    echo '<td>' . htmlspecialchars($user['role']) . '</td>';
                                    echo '<td>';
                                    echo '<form action="../views/signup.php" method="GET">
                                    <input type="hidden" name="record" value="' . htmlspecialchars($user["id"]) . '">
                                    <button type="submit" class="openModal edit-btn" name="edit-btn">Edit</button>
                                    <button type="submit" class="delete-btn" name="delete-btn">Delete</button>
                                  </form>';
                                    echo '';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<div class="empty-table">No users found</div>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="../../../public/assets/js/jquery-3.6.0.min.js"></script>
    <script src="../../../public/assets/js/dataTables.js"></script>

    
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25, 50],
                "language": {
                    "search": "Filter records:"
                }
            });
    
        });
    </script>

</body>
</html>
