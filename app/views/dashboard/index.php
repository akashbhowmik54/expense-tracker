<?php require '../app/views/layout/navbar.php'; ?>

<h2>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></h2>
<p>You are logged in!</p>
<a href="/auth/logout">Logout</a>
