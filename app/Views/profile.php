<style>
        /* Reset */
        * {
            box-sizing: border-box;
            font-family: Helvetica, Arial, sans-serif;
        }
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            background: #000;
            color: #fff;
        }
        a { color: inherit; text-decoration: none; }

        /* Navbar layout */
        .navbar {
            background: #000;
            border-bottom: 2px solid #F8C146;
            position: sticky;
            top: 0;
            z-index: 9999; /* ensure navbar and its gold line stay on top */
        }
        .nav-inner {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            gap: 0.5rem;
            min-height: 64px; /* fixed height so centering is consistent */
        }
        .brand h3 {
            margin: 0;
            color: #fff;
            font-weight: 700;
            font-size: 1.6rem;
        }
        .nav-center {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: center;
            align-items: center;
            width: auto;
            z-index: 100;
            /* keep space reserved to the right so the menu doesn't run under the right controls */
            padding-right: 140px;
        }

        /* nav items */
        .nav-menu {
            display: flex;
            gap: 1.25rem;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-item a {
            color: #fff;
            padding: 6px 8px;
            display: block;
            font-size: 0.95rem;
        }
        .nav-item a.active {
            color: #F8C146;
            border-bottom: 2px solid #F8C146;
        }

        /* user info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .account-icon {
            display: block;
            vertical-align: middle;
            width: 34px;
            height: 34px;
            object-fit: cover;
            border-radius: 50%;
        }
        .user-text { line-height: 1; text-align: left; }
        .user-text .name { margin: 0; font-weight: 600; font-size: 0.95rem; }
        .user-text .role { margin: 0; font-size: 0.85rem; color: #F8C146; }

        /* toggler (hamburger) */
        .toggler {
            display: none; /* shown via media queries */
            background: transparent;
            border: 0;
            padding: 6px;
            cursor: pointer;
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .toggler .bar {
            width: 24px;
            height: 3px;
            background: #fff;
            border-radius: 2px;
            display: block;
            transition: transform .18s ease, opacity .18s ease;
        }
        .toggler.open .bar:nth-child(1) { transform: translateY(6px) rotate(45deg); }
        .toggler.open .bar:nth-child(2) { opacity: 0; transform: scaleX(0); }
        .toggler.open .bar:nth-child(3) { transform: translateY(-6px) rotate(-45deg); }

        /* right group that contains toggler + user-info */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 200;
        }
        .nav-right .toggler, .nav-right .user-info { flex-shrink: 0; }

        /* responsive behavior */
        @media (max-width: 991.98px) {
            .toggler { display: inline-flex; }
            .nav-menu { display: none; position: absolute; top: 100%; left: 0; right: 0; background: #000; flex-direction: column; padding: 12px 16px; gap: 10px; z-index: 60; border-top: 1px solid rgba(248,193,70,0.08); }
            .nav-menu.show { display: flex; }
        }

        /* <= 768px: ensure hamburger sits immediately to the LEFT of the account box */
        @media (max-width: 768px) {
            /* position the right group absolutely inside .nav-inner so the navbar
               bottom rule spans the full viewport width */
            .nav-right {
                position: absolute;
                right: 16px;
                top: 50%;
                transform: translateY(-50%);
                gap: 8px;
                z-index: 300;
            }

            /* explicit order: toggler then account (toggler to left) */
            .nav-right .toggler {
                order: 1;
                width: 36px;
                height: 36px;
            }
            .nav-right .user-info {
                order: 2;
                margin-left: 0;
                gap: 8px;
            }

            /* reserve center area so menu items don't run under the fixed right controls */
            .nav-center {
                padding-right: 140px;
            }

            /* slightly smaller avatar on small screens */
            .account-icon {
                width: 30px;
                height: 30px;
            }

            /* very small screens - hide name/role to avoid crowding */
            @media (max-width: 420px) {
                .user-text .name, .user-text .role {
                    display: none;
                }
                .nav-center {
                    padding-right: 110px;
                }
                .account-icon {
                    width: 28px;
                    height: 28px;
                }
                .nav-right {
                    right: 10px;
                    gap: 6px;
                }
            }
        }

        @media (min-width: 992px) {
            .toggler { display: none; }
            .nav-right { position: static; margin-left: auto; gap: 12px; }
            .nav-menu { display: flex; position: static; flex-direction: row; }
            .nav-center { justify-content: center; padding-right: 0; }
        }

        /* Prevent images from overlapping the navbar */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 9999; /* ensure navbar and its gold line stay on top */
            border-bottom: 2px solid #F8C146;
        }

        /* If any .box or image was pulled up with negative margins, reset it */
        .box {
            margin-top: 0;
        }

        /* REMOVE debug outlines */
        .navbar, .nav-inner, .nav-right, .account-icon, .box img {
            outline: none;
        }

        /* Center the nav-menu relative to the viewport (not the .nav-inner width) */
        .nav-center {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: center;
            align-items: center;
            width: auto;
            z-index: 100;
            /* keep space reserved to the right so the menu doesn't run under the right controls */
            padding-right: 140px;
        }

        /* Keep the user/toggler pinned to the right inside the nav-inner */
        .nav-right {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 200;
        }

        /* On smaller screens, fall back to normal flow so the menu can stack */
        @media (max-width: 991.98px) {
            .nav-center {
                position: static;
                transform: none;
                padding-right: 0;
                justify-content: flex-start;
            }
        }
        .register-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 64px); /* full height minus navbar */
            padding: 20px;
        }

        .card {
            background: #111;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 450px;
            text-align: left;
        }

        .card h2 {
            margin-bottom: 20px;
            color: #F8C146;
            text-align: center;
        }

        .card p {
            margin: 5px 0;
            padding: 5px 0;
            text-align: center
        }

        .card label {
            display: block;
            text-align: center
            margin-top: 15px;
            margin-bottom: 5px;
        }

        /* Form styles */
    .card form {
        margin-top: 25px;
    }

    .card label {
        display: block;
        margin: 15px 0 6px 0;
        color: #F8C146;
        font-weight: 600;
    }

    .card input[type="text"],
    .card input[type="email"],
    .card input[type="password"] {
        width: 100%;
        padding: 12px;
        background: #222;
        border: 1px solid #444;
        border-radius: 5px;
        color: #fff;
        font-size: 1rem;
        margin-bottom: 5px;
    }

    .card input[type="text"]:focus,
    .card input[type="email"]:focus,
    .card input[type="password"]:focus {
        outline: none;
        border-color: #F8C146;
        box-shadow: 0 0 5px rgba(248, 193, 70, 0.3);
    }

    .card button {
        width: 100%;
        padding: 12px;
        background: #F8C146;
        color: #000;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .card button:hover {
        background: #e6b23a;
    }

    /* Logout button styling */
    .card form:last-of-type button {
        background: transparent;
        color: #F8C146;
        border: 1px solid #F8C146;
        margin-top: 10px;
    }

    .card form:last-of-type button:hover {
        background: rgba(248, 193, 70, 0.1);
    }

     @media (max-width: 320px) and (min-height: 600px) {
        .register-container {
            padding: 10px;
        }
        
        .card {
            padding: 20px 15px;
            margin: 5px;
        }
        
        .card h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .card p {
            margin: 10px 0;
            padding: 6px 0;
            font-size: 0.95rem;
        }
        
        .card p strong {
            width: 70px; /* Slightly smaller label width */
        }
        
        .card label {
            margin: 10px 0 4px 0;
            font-size: 0.95rem;
        }
        
        .card input[type="text"],
        .card input[type="email"],
        .card input[type="password"] {
            padding: 12px;
            font-size: 1rem;
        }
        
        .card button {
            padding: 12px;
            font-size: 1rem;
        }
    }

    /* Existing responsive adjustments for card */
    @media (max-width: 480px) {
        .card {
            padding: 20px;
            margin: 10px;
        }
        
        .card h2 {
            font-size: 1.5rem;
        }
        
        .card input[type="text"],
        .card input[type="email"],
        .card input[type="password"] {
            padding: 10px;
        }
        
        .card button {
            padding: 10px;
        }
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.1.0/css/all.min.css">
</head>
<body>
<header>
    <nav class="navbar" id="mainNavbar" role="navigation" aria-label="Main navigation">
        <div class="nav-inner">
            <a class="brand" href="<?= base_url('/') ?>"><h3>RateMyRide</h3></a>

            <div class="nav-center" aria-hidden="false">
                <ul class="nav-menu" id="siteMenu">
                    <li class="nav-item"><a class="nav-link <?= uri_string() === '' ? 'active' : '' ?>" href="<?= base_url('/') ?>">HOME</a></li>
                    <li class="nav-item"><a class="nav-link <?= uri_string() === 'aboutUs' ? 'active' : '' ?>" href="<?= base_url('/aboutUs') ?>">ABOUT US</a></li>
                    <li class="nav-item"><a class="nav-link <?= uri_string() === 'contactUs' ? 'active' : '' ?>" href="<?= base_url('/contactUs') ?>">MY REVIEWS</a></li>

                </ul>
            </div>

            <!-- RIGHT SIDE WRAPPER moved after nav-center so it sits at the far right on large screens.
                 On tablet and below it is absolutely positioned and will cling to the right. -->
            <div class="nav-right">
                <button class="toggler" id="navToggler" aria-controls="siteMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>

                <a class="user-info cling-right" href="<?= base_url('/profile') ?>" id="userInfo" role="link">
                    <img src="<?= base_url('public/images/account_box.png') ?>" alt="Account" class="account-icon">
                    <div class="user-text">
                        <p class="name"><?= esc(session()->get('name') ?? '') ?></p>
                        <p class="role"><?= esc(session()->get('role') ?? 'customer') ?></p>
                    </div>
                </a>
            </div>
        </div>
    </nav>
</header>
    <!--Main Body-->

<div class="register-container">
    <div class="card">
        <h2>User Profile</h2>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div style="color: #F8C146; padding: 10px; margin-bottom: 15px; text-align: center; background: rgba(248, 193, 70, 0.1); border-radius: 5px;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Error Message -->
        <?php if (session()->getFlashdata('error')): ?>
            <div style="color: #ff4444; padding: 10px; margin-bottom: 15px; text-align: center; background: rgba(255, 68, 68, 0.1); border-radius: 5px;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Validation Errors -->
        <?php 
        $errors = session()->getFlashdata('errors');
        if ($errors && is_array($errors)): ?>
            <div style="color: #ff4444; padding: 10px; margin-bottom: 15px; text-align: center; background: rgba(255, 68, 68, 0.1); border-radius: 5px;">
                <?php foreach ($errors as $error): ?>
                    <div><?= $error ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($user)): ?>
            <p><strong>Name:</strong> <?= esc($user['name']) ?></p>
            <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <?php else: ?>
            <p>User information is not available.</p>
        <?php endif; ?>

        <form action="<?= site_url('profile/submit') ?>" method="post">
            <?= csrf_field() ?>
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= old('name', isset($user) ? esc($user['name']) : '') ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= old('email', isset($user) ? esc($user['email']) : '') ?>" required>

            <label for="password">New Password (leave blank to keep current):</label>
            <input type="password" id="password" name="password">

            <button type="submit">Update Profile</button>
        </form>

        <form action="<?= base_url('logout') ?>" method="get">
            <button type="submit">Logout</button>
        </form>
    </div>
</div>


    <script src="https://kit.fontawesome.com/154041df64.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            const stickyPoint = navbar.offsetTop;

            if (window.scrollY > stickyPoint) {
            navbar.classList.add('sticky');
            } else {
            navbar.classList.remove('sticky');
            }
        });
    </script>

    <!-- at end of body: small JS to control toggler -->
    <script>
        (function(){
            const toggler = document.getElementById('navToggler');
            const menu = document.getElementById('siteMenu');

            function closeMenu() {
                menu.classList.remove('show');
                toggler.classList.remove('open');
                toggler.setAttribute('aria-expanded', 'false');
            }
            function openMenu() {
                menu.classList.add('show');
                toggler.classList.add('open');
                toggler.setAttribute('aria-expanded', 'true');
            }

            toggler.addEventListener('click', function(e){
                e.stopPropagation();
                if (menu.classList.contains('show')) closeMenu(); else openMenu();
            });

            // close overlay when clicking outside on small screens
            document.addEventListener('click', function(e){
                if (!menu.contains(e.target) && !toggler.contains(e.target) && menu.classList.contains('show')) {
                    closeMenu();
                }
            });
            // ensure menu closed on resize to large screens
            window.addEventListener('resize', function(){
                if (window.innerWidth >= 992) closeMenu();
            });
        })();
    </script>
</body>
</html>