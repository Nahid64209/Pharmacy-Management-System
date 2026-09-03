<?php
require '../models/User.php';
session_start();
if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    header("Location: login.php");
    exit();
}

$users = getUsers();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Pharmacy Management System</title>

    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>

<aside class="sidebar">

    <div class="logo">
        <span>💊</span>
        Pharmacy Management System
    </div>

    <nav class="menu">

        <a href="dashboard.php" class="active">
            <span>📊</span> Dashboard
        </a>



        <a href="logout.php" class="logout">
            <span>🚪</span> Logout
        </a>

    </nav>

</aside>


<main class="main">

    <header class="topbar">

        <div>
            <h1>Dashboard</h1>
            <p>Welcome to Pharmacy Management System</p>
        </div>


        

            <h1>👤Admin </h1>

            

       

    </header>


    <section class="section">

        <h2>Users</h2>

        <table border="1">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>

            <?php while ($user = mysqli_fetch_assoc($users)) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['password']); ?></td>

                    <td>
                        <a href="userEdit.php?username=<?php echo $user['username']; ?>">Edit</a>
                        <a href="../controllers/userDelete.php?username=<?php echo $user['username']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>


        </table>

    </section>

    <section class="section">

        <h2>Overview</h2>

        <p>
            Manage medicines, inventory, sales, suppliers, customers and reports from one place.
        </p>

    </section>

</main>

</body>

</html>