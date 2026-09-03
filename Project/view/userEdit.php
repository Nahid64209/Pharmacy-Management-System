<?php
require '../controllers/userEdit.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form action="../controllers/userEdit.php" method="POST">
    <input type="hidden" name="oldUsername" value="<?php echo $user['username']; ?>">

    <label>Name</label>
    <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>">
    <br><br>

    <label>Email</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>">
    <br><br>

    <label>Username</label>
    <input type="text" name="username" value="<?php echo $user['username']; ?>">
    <br><br>

    <label>Password</label>
    <input type="text" name="password" value="<?php echo $user['password']; ?>">
    <br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>
