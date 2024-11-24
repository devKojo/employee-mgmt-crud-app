<?php
include __DIR__ . '/../../../config/database-config.php';
include __DIR__ . '/../../models/getAllUsers.php';

$login_page = 'location: login.php';

$user = $_SESSION['user'];
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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
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
            <li><a href="#" class="active">Overview</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Messages</a></li>
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
                <h1>Welcome, <?php echo $fullName; ?></h1>
                <p><strong><?php echo $email; ?></strong> | <?php echo $role; ?></p>
            </section>

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
                                    echo '<button class="edit-btn" onclick="editUser(' . htmlspecialchars($user['id']) . ')">Edit</button>';
                                    echo '<button class="delete-btn" onclick="deleteUser(' . htmlspecialchars($user['id']) . ')">Delete</button>';
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    
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
