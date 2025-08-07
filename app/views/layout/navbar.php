<nav>
    <?php if (isset($_SESSION['user'])): ?>
        <a href="/dashboard">Dashboard</a>
        <a href="/auth/logout">Logout</a>
    <?php else: ?>
        <a href="/auth/login">Login</a>
        <a href="/auth/register">Register</a>
    <?php endif; ?>
</nav>
<hr>
