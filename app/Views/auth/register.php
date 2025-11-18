</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
    <script>
        // --- Client-side validation ---
        function validateForm() {
            let name = document.forms["signupForm"]["name"].value;
            let email = document.forms["signupForm"]["email"].value;
            let password = document.forms["signupForm"]["password"].value;
            let confirm = document.forms["signupForm"]["confirm"].value;

            if (name == "" || email == "" || password == "" || confirm == "") {
                alert("All fields are required!");
                return false;
            }

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            if (password !== confirm) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Create an Account</h2>

    <?php if(isset($validation)): ?>
        <div style="color:red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form name="signupForm" action="<?= base_url('register') ?>" method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= set_value('name') ?>"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?= set_value('email') ?>"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" value="<?= set_value('password') ?>"><br><br>

        <label>Confirm Password:</label><br>
        <input type="password" name="confirm" value="<?= set_value('confirm') ?>"><br><br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="<?= base_url('login') ?>"> Login here</a></p>
</body>
</html>
