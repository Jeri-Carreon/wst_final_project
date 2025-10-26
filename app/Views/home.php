<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="public/css/headerStyleSheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.1.0/css/all.min.css">
    <title>Homepage</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /*
        Color Palette:
        #000000  – Black (background)
        #F8C146  – Gold (accent/highlight)
        #FFFFFF  – White (text)
        #2C2C2C  – Charcoal (secondary background)
        #C0A062  – Muted gold (hover or border)
``      */
        *{
            font-family: Helvetica, Arial, sans-serif;
        }
        /*BODY*/
        .flex-container {
            min-height: 800px;
        /*border: 8px solid black; */
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            align-items: center;
            align-content: center;
        }
        .first-row {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 800px;

            background-image: url(<?= base_url('public/images/seats2.jpg')?>);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;

            color: white;
        }
        .first-row::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 0;
        }

        .first-row .box {
            position: relative;
            z-index: 1;
        }

        .first-row .text-content {
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            justify-content: flex-start;
        }
        .custom-row {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            flex-direction: column;
        }
        .column {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box {
            width: 100%;
            max-width: 1200px;
            height: auto;
            min-height: 400px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
            text-align: start;
            box-sizing: border-box; /* include padding in width */
            /*border: 3px solid black;*/
        
        }
        .box.second .text-content,
        .box.third .text-content {
            flex: 1 1 300px; /* grow/shrink with minimum width */
        }

        .box.second img {
            flex: 1 1 300px;
            max-width: 30%;
            height: auto;
            object-fit: cover;
        }

        .box.third img {
            flex: 1 1 300px;
            max-width: 40%;
            height: auto;
            object-fit: cover;            
        }

        .first-row .box {
            /*padding-left: 5%;*/ /*Beauty Made Simple box padding*/
        }
        .first-row .box h1 {
            font-size: 5vw;
            color: white;
        }
        .first-row .box p {
            font-size: 2vw;
        }

        .btn-custom {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-custom:hover {
            background-color: transparent;
            border: 2px solid #F8C146;
            color: #F8C146
        }

        #learnmorebtn {
            font-size: 1vw;
        }

        #servicesbtn {
            background-color: black;
            border: 2px solid black;
            color: white;
        }

        .box.second, .box.third {
            display: flex;
            flex-direction: row;
            padding: 2rem 0;
            gap: 3rem;
        }

        .box.second .text-content, 
        .box.third .text-content {
            flex: 1;
            padding-top: 2em;
        }

        .box.second .text-content h1{
            font-size: 3vw;
            font-weight: bold;
        }

        .third-row {
            width: 100%;
            background-color: #1d1d1dff;
            display: flex;
            justify-content: center;
            padding: 50px 0;
        }
        .box.third {
            display: flex;
            flex-direction: row;
            justify-content: space-between;

            padding-top: 5rem;

            background-color: #1d1d1dff;
        }

        .box.third .text-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 5rem;
            color: white;
        }

        .third-row-bg {
            width: 100%;
            background-color: #1d1d1dff;
        }

        .third-row-bg .box.third {
            margin: 0 auto;
            /*border: 2px solid black;*/
        }

        /*Small Screens*/
        @media (max-width: 768px) {
            body, html {
                overflow-x: hidden;
            }
            .first-row .box h1 {
                font-size: 8vw; /* scale text for small screens */
            }
            .first-row .box p {
                font-size: 4vw;
            }

            .navbar-brand {
                margin-left: 10px; /* smaller margin on mobile */
            }
            .navbar-nav {
                margin-left: 0; /* avoid horizontal scroll */
            }

            .box,
            .box.second,
            .box.third {
                flex-direction: column; /* stack text + image */
                text-align: center;
                align-items: center
            }
            .box .text-content,
            .box.second .text-content,
            .box.third .text-content {
                margin-left: 0;
                padding: 0;
                align-items: center;
            }

            .box.second .text-content h1,
            .box.third .text-content h1 {
                font-size: 10vw;
            }

            .box.second .text-content p,
            .box.third .text-content p {
                padding: 0 2rem;
            }

            .box.second img,
            .box.third img {
                max-width: 80%;
            }
            #learnmorebtn {
                font-size: 3vw;
            }
        }
        .footer-container {
            width: 100%;
            min-height: 22rem;
            padding: 1rem;
            border-top: 1px solid #F8C146;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            flex-direction: column;
            /*border: 2px solid red;*/
        }
        .footer-col {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-content: center;  
            /*border: 2px solid green;*/
        }

        .footer-row {
            display: flex;
            justify-content: center;
            margin-bottom: 1em;
            transition: 0.5 ease;
            /*border: 2px solid red;*/
        }

        .footer-row-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2em 0;
        }

        .footer-row-logo img {
            max-width: auto;
            max-height: 50em;
            flex-shrink: 0;         
        }

        .footer-row ul {
            display: flex;
            list-style: none;
            gap: 30px;
            color: white;
            font-size: 0.8em;
            padding: 0;
            margin: 0;
            /*border: 2px solid red;*/
        }

        .footer-row a {
            color: white;
            padding: 0.5em;
            transition: color 0.3s ease;
        }

        .footer-row a:hover {
            color: #F8C146;            
        }
        .footer-row a:link {
            text-decoration: none;
        }
        .footer-row-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            /*border: 2px solid red;*/
        }
        .footer-row-icons ul{
            display: flex;
            list-style: none;
            gap: 20px;
            color: white;
            padding: 0;
            margin: 0;
        }
        .footer-row-icons .btn {
            color: rgba(255, 255, 255, 0.7);
            font-size: 2em;
        }

        .footer-row-icons .btn:hover {
            color: #F8C146;
        }
        .footer-row-rights {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 1em 0;
            color: white;
        }
    </style>
</head>
<body>
<header>
    <!--NAVBAR-->
    <nav id="mainNavbar" class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('public/images/logo.png') ?>" alt="Lakan & Co Logo" style="height:60px; width:auto;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active text-reset" aria-current="page" href="<?= base_url('/') ?>">HOME</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-reset" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                WHAT WE DO
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('/services') ?>">SERVICES</a></li>
                <li><a class="dropdown-item" href="<?= base_url('/shop') ?>">SHOP</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/ourTeam') ?>">OUR TEAM</a>
            </li>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/faq') ?>">FAQ</a>
            </li>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/aboutUs') ?>">ABOUT US</a>
            </li>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/contactUs') ?>">CONTACT US</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!--CAROUSEL
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?= base_url('public/images/ad2.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?= base_url('public/images/ad1.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?= base_url('public/images/ad2.jpg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    -->
    <!--Main Body-->
    <div class="flex-container">
        <div class="custom-row first-row">
            <div class="box">
                <div class="text-content">
                    <h1>Beauty made simple.</h1>
                    <p>Because feeling good never goes out of style.</p>
                    <a button type="button" id="learnmorebtn" href="<?= base_url('/services') ?>" class="btn btn-custom">Learn More</button> </a>
                </div>
            </div>
        </div>
       <div class="custom-row">
            <div class="box second">
                <div class="text-content">
                    <h1>Services</h1>
                    <p>Feel refreshed and confident from head to toe with our full range of salon services. From hair care to relaxation treatments, take time to unwind at Lakan & Co Salon Privé.</p>
                    <a button type="button" id="servicesbtn" href="<?= base_url('/services') ?>" class="btn btn-custom">Our Services</button> </a>
                </div>
                <img src="<?= base_url('public/images/nails1.jpg')?>" alt="Salon Service" style="">
            </div>
       </div>
       <div class="third-row-bg">
            <div class="row">
                <div class="box third">
                    <img src="<?= base_url('public/images/productModel.jpg')?>" alt="Salon Service" style="">
                    <div class="text-content">
                        <h1>Products</h1>
                        <p>Discover our premium line of beauty essentials designed to keep you feeling refreshed and confident from head to toe. From nourishing hair care to soothing body treatments, We offers everything you need for everyday luxury.</p>
                        <a button type="button" id="servicesbtn" href="<?= base_url('/products') ?>" class="btn btn-custom">Our Products</button> </a>
                    </div>
                </div>
            </div>
       </div>

       <!-- 
       <div class="row third">
            <div class="box third">
                <img src="<?= base_url('public/images/nails1.jpg')?>" alt="Salon Service" style="">
                <div class="text-content">
                    <h1>Services</h1>
                    <p>Feel refreshed and confident from head to toe with our full range of salon services. From hair care to relaxation treatments, take time to unwind at Lakan & Co Salon Privé.</p>
                    <a button type="button" id="servicesbtn" href="<?= base_url('/services') ?>" class="btn btn-custom">Our Services</button> </a>
                </div>
            </div>
       </div>
        -->
    </div>

    <!--FOOTER-->
    <div class="footer-container">
        <div class="footer-col">
            <div class="footer-row-logo">
                <img src="<?= base_url('public/images/logo.png') ?>" alt="Lakan & Co Logo">
            </div>
            <div class="footer-row">
                <ul>
                    <li><a  href="<?= base_url('/') ?>">HOME</a></li>
                    <li><a  href="<?= base_url('/services') ?>">OUR SERVICES</a></li>
                    <li><a  href="<?= base_url('/shop') ?>">OUR PRODUCTS</a></li>
                    <li><a  href="<?= base_url('/ourTeam') ?>">OUR TEAM</a></li>
                    <li><a  href="<?= base_url('/faq') ?>">FAQ</a></li>
                    <li><a  href="<?= base_url('/aboutUs') ?>">ABOUT US</a></li>
                    <li><a  href="<?= base_url('/contactUs') ?>">CONTACT US</a></li>
                </ul>
            </div>
            <div class="footer-row-icons">
                <ul>
                    <button class="btn" onclick="window.location.href='https://facebook.com/profile.php?id=61580202315598&sk=about';"><i class="fa-brands fa-facebook"></i></button>
                    <button class="btn" onclick="window.location.href='https://instagram.com';"><i class="fa-brands fa-instagram"></i></button>
                    <button class="btn" onclick="window.location.href='https://tiktok.com';"><i class="fa-brands fa-tiktok"></i></button>
                </ul>
            </div>
            <div class="footer-row-rights">
                <p>&copy; 2025 Lakan & Co. Salon Privé. All rights reserved.</p>
                <p>For Educational Purposes Only</p>
            </div>
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

</body>
</html>
