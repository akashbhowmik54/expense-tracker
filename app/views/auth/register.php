<?php require '../app/views/layout/navbar.php'; ?>

<form method="POST" action="/auth/register">
    <h2>Register</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>
