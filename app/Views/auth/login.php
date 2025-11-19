<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

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
        .login-container {
            background: #ffffff;
            width: 360px;
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
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.25s;
        }

        input:focus {
            border-color: #4c82ff;
            box-shadow: 0 0 0 2px rgba(76,130,255,0.2);
        }

        /* ---- Button ---- */
        button {
            width: 100%;
            padding: 12px;
            background: #F8C146;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.25s;
        }

        button:hover {
            background: #dcaa3eff;
        }

        /* ---- Register Link ---- */
        .register-text {
            text-align: center;
            margin-top: 15px;
            color: #555;
            font-size: 14px;
        }

        .register-text a {
            color: #4c82ff;
            text-decoration: none;
        }
        .register-text a:hover {
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
    </style>

    <script>
        // --- Client-side validation ---
        function validateLoginForm() {
            let email = document.forms["loginForm"]["email"].value;
            let password = document.forms["loginForm"]["password"].value;

            if (email === "" || password === "") {
                alert("All fields are required!");
                return false;
            }

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,}$/;
            if (!email.match(emailPattern)) {
                alert("Please enter a valid email address.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>

<div class="login-container">
    
    <h2>RateMyRide</h2>

    <?php if(isset($error)): ?>
        <div class="error">
            <?= esc($error) ?>
        </div>
    <?php endif; ?>

    <form name="loginForm" action="<?= base_url('login/submit') ?>" method="post" onsubmit="return validateLoginForm()">

        <label>Email</label>
        <input type="text" name="email" value="<?= set_value('email') ?>">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>

    <p class="register-text">
        Don't have an account?
        <a href="<?= base_url('register') ?>">Register here</a>
    </p>
</div>

</body>
</html>