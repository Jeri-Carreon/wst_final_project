<!DOCTYPE html>
<html>
<head>
    <title>Login Successful</title>
</head>
<body>
    <h2>Welcome, <?= esc($name) ?>!</h2>
    <p>You are now logged in.</p>
    <a href="<?= base_url('logout') ?>">Logout</a>
    <a href="<?= base_url('/') ?>">Homepage</a>
</body>
</html>
