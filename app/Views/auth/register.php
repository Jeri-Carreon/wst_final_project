</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Signup Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        // --- Client-side validation ---
        function validateForm() {
            const form = document.forms["signupForm"];
            const name = form["name"].value.trim();
            const email = form["email"].value.trim();
            const password = form["password"].value;
            const confirm = form["confirm"].value;
            const role = form["role"].value;
            const adminCode = form["admin_code"].value.trim();

            if (name === "" || email === "" || password === "" || confirm === "") {
                alert("All fields are required!");
                return false;
            }

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,}$/i;
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

            // If registering as admin, ensure admin code is provided and correct (client-side check)
            if (role === "admin") {
                if (adminCode === "") {
                    alert("Admin code is required for admin registration.");
                    return false;
                }
                // NOTE: Keep server-side check authoritative. This is only UX convenience.
                if (adminCode !== "Admin123") {
                    alert("Invalid admin code.");
                    return false;
                }
            }

            return true;
        }

        // toggle admin code field visibility
        function toggleAdminCodeField() {
            const roleSelect = document.getElementById('role');
            const adminRow = document.getElementById('adminCodeRow');
            const adminInput = document.getElementById('admin_code');

            if (roleSelect.value === 'admin') {
                adminRow.style.display = 'block';
                adminInput.disabled = false;
            } else {
                adminRow.style.display = 'none';
                adminInput.disabled = true;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            roleSelect.addEventListener('change', toggleAdminCodeField);
            toggleAdminCodeField(); // initial state
        });
    </script>

    <style>
        /* minimal styling */
        body { font-family: Arial, sans-serif; padding: 16px; color:#222; background:#fff; }
        label { display:block; margin-top:8px; }
        input, select { width:100%; max-width:360px; padding:8px; margin-top:4px; }
        .error { color: #c00; margin: 8px 0; }
        #adminCodeRow { margin-top:8px; }
    </style>
</head>
<body>
    <h2>Create an Account</h2>

    <?php if (isset($validation)): ?>
        <div class="error">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form name="signupForm" action="<?= base_url('register') ?>" method="post" onsubmit="return validateForm();">
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" value="<?= set_value('name') ?>">

        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="<?= set_value('email') ?>">

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" value="<?= set_value('password') ?>">

        <label for="confirm">Confirm Password:</label>
        <input id="confirm" type="password" name="confirm" value="<?= set_value('confirm') ?>">

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="customer" <?= set_value('role') == 'customer' ? 'selected' : '' ?>>Customer</option>
            <option value="admin" <?= set_value('role') == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <!-- Admin code row: shown/hidden based on role. disabled when hidden so not submitted. -->
        <div id="adminCodeRow" style="<?= set_value('role') == 'admin' ? 'display:block;' : 'display:none;' ?>">
            <label for="admin_code">Admin Code (if registering as Admin):</label>
            <input id="admin_code" type="text" name="admin_code" value="<?= set_value('admin_code') ?>" <?= set_value('role') == 'admin' ? '' : 'disabled' ?>>
        </div>

        <div style="margin-top:12px;">
            <button type="submit">Register</button>
        </div>
    </form>

    <p>Already have an account? <a href="<?= base_url('login') ?>"> Login here</a></p>
</body>
</html>
