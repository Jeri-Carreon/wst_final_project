<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create an Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        /* ---- Reset ---- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", Arial, sans-serif;
        }

        body {
            background: #1A1A1A;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* ---- Container ---- */
        .register-container {
            background: #ffffff;
            width: 400px;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-size: 24px;
            font-weight: 600;
        }

        /* ---- Inputs ---- */
        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-top: 12px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.25s;
        }

        input:focus, select:focus {
            border-color: #4c82ff;
            box-shadow: 0 0 0 2px rgba(76,130,255,0.2);
        }

        /* ---- Button ---- */
        button {
            width: 100%;
            padding: 12px;
            background: #FCB146;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
            transition: 0.25s;
        }

        button:hover {
            background: #dcaa3eff;
        }

        /* ---- Login Link ---- */
        .login-text {
            text-align: center;
            margin-top: 15px;
            color: #555;
            font-size: 14px;
        }

        .login-text a {
            color: #4c82ff;
            text-decoration: none;
        }

        .login-text a:hover {
            text-decoration: underline;
        }

        /* --- Error message --- */
        .error {
            background: #ffe5e5;
            color: #d8000c;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        #adminCodeRow {
            margin-top: 12px;
        }
    </style>

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

            if (role === "admin") {
                if (adminCode === "") {
                    alert("Admin code is required for admin registration.");
                    return false;
                }
                if (adminCode !== "Admin123") {
                    alert("Invalid admin code.");
                    return false;
                }
            }

            return true;
        }

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
            toggleAdminCodeField();
        });
    </script>

</head>

<body>

<div class="register-container">

    <h2>Create an Account</h2>

    <?php if (isset($validation)): ?>
        <div class="error">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form name="signupForm" action="<?= base_url('register') ?>" method="post" onsubmit="return validateForm();">

        <label>Name</label>
        <input id="name" type="text" name="name" value="<?= set_value('name') ?>">

        <label>Email</label>
        <input id="email" type="email" name="email" value="<?= set_value('email') ?>">

        <label>Password</label>
        <input id="password" type="password" name="password">

        <label>Confirm Password</label>
        <input id="confirm" type="password" name="confirm">

        <label>Role</label>
        <select id="role" name="role">
            <option value="customer" <?= set_value('role') == 'customer' ? 'selected' : '' ?>>Customer</option>
            <option value="admin" <?= set_value('role') == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <div id="adminCodeRow" style="<?= set_value('role') == 'admin' ? 'display:block;' : 'display:none;' ?>">
            <label>Admin Code (Admin Only)</label>
            <input id="admin_code" type="text" name="admin_code" value="<?= set_value('admin_code') ?>" <?= set_value('role') == 'admin' ? '' : 'disabled' ?>>
        </div>

        <button type="submit">Register</button>
    </form>

    <p class="login-text">
        Already have an account?
        <a href="<?= base_url('login') ?>">Login here</a>
    </p>
</div>

</body>
</html>