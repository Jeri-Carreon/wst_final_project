<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <script>
        // --- Client-side validation ---
        function validateLoginForm() {
            let email = document.forms["loginForm"]["email"].value;
            let password = document.forms["loginForm"]["password"].value;

            if (email == "" || password == "") {
                alert("All fields are required!");
                return false;
            }

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                alert("Please enter a valid email address.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Login Form</h2>

    <?php if(isset($error)): ?>
        <div style="color:red;">
            <?= esc($error) ?>
        </div>
    <?php endif; ?>

    <form name="loginForm" action="<?= base_url('login/submit') ?>" method="post" onsubmit="return validateLoginForm()">
        <label>Email:</label><br>
        <input type="text" name="email" value="<?= set_value('email') ?>"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an Account?<a href="<?= base_url('register') ?>">Register Here</a></p>
</body>
</html>
