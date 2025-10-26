<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href="style.css">
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
    
        nav.navbar {
            background-color: black;
            border-bottom: 1px solid #F8C146;
            transition: 0.3s ease;
        }
        nav.navbar.sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);   
        }
        .navbar-brand {
            margin-left: 20%;
            color: white !important;
        }
        .navbar-nav {
            margin-left: 35%;
            font-style: ;
            color: white;
        }
        .nav-link.active {
            color: #F8C146 !important;
            border-bottom: 1px solid #F8C146;
        }

        .nav-link.active, 
        .nav-link {
            color: white ;
            font-size: 12px;
            transition: color 1s ease;
        }
        .nav-link:hover,
        .nav-link.active:hover {
            color: #F8C146 !important;
        }
        .dropdown-menu {
            background-color: #111;
            margin-top: 0; 
            border: none !important; 
            box-shadow: none !important;
        }
        .dropdown-toggle {
            color: white;
        }
        .dropdown-toggle::after {
            display: none;
        }
        .dropdown-item {
            color: white;
            font-size: 12px;
        }
        .dropdown-item:hover {
            background-color: rgba(248, 215, 0, 0.2);
            color: #F8C146;
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
                        <p>Feel refreshed and confident from head to toe with our full range of salon services. From hair care to relaxation treatments, take time to unwind at Lakan & Co Salon Privé.</p>
                        <a button type="button" id="servicesbtn" href="<?= base_url('/services') ?>" class="btn btn-custom">Our Products</button> </a>
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
