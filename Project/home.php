<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Medicine Store - Pharmacy Management System</title>

    <link rel="stylesheet" href="css/home.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<header>

    <div class="logo">
        <i class="fa-solid fa-capsules"></i>
        Pharmacy Management
    </div>

    <div class="search-box">

        <i class="fa-solid fa-magnifying-glass"></i>

        <input type="text"
               id="searchMedicine"
               placeholder="Search medicines...">

        <button>
            Search
        </button>

    </div>

    <nav>

        <a href="home.php">Home</a>

        <a href="index.php">About</a>

        <a href="index.php">Features</a>

        <a href="index.php">Contact</a>

        <a href="login.php" class="login">
            <i class="fa-solid fa-user"></i>
            Login
        </a>

        <a href="signup.php" class="signup">
            Sign Up
        </a>

        <a href="#" class="cart">
            <i class="fa-solid fa-cart-shopping"></i>
            Cart
            <span id="cartCount">0</span>
        </a>

    </nav>

</header>


<div class="category-menu">

    <a href="#all">All</a>

    <a href="#tablets">Tablets</a>

    <a href="#capsules">Capsules</a>

    <a href="#syrup">Syrup</a>

    <a href="#cream">Cream</a>

    <a href="#injection">Injection</a>

</div>


<section class="page-title">

    <h1>Online Medicine Store</h1>

    <p>
        Find and purchase medicines easily from our pharmacy.
    </p>

</section>


<section class="medicine-section" id="all">

    <div class="section-heading">

        <h2>All Medicines</h2>

        <a href="#">See All</a>

    </div>


    <div class="medicine-container">

        <div class="medicine-card">

            <div class="discount">
                10% OFF
            </div>

            <img src="images/medicine1.jpg" alt="Medicine">

            <h3>Napa 500mg</h3>

            <p class="category">
                Tablet
            </p>

            <p class="old-price">
                ৳12
            </p>

            <div class="bottom">

                <strong>
                    ৳10.80
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>


        <div class="medicine-card">

            <div class="discount">
                10% OFF
            </div>

            <img src="images/medicine2.jpg" alt="Medicine">

            <h3>Omeprazole 20mg</h3>

            <p class="category">
                Capsule
            </p>

            <p class="old-price">
                ৳80
            </p>

            <div class="bottom">

                <strong>
                    ৳72
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>


        <div class="medicine-card">

            <div class="discount">
                5% OFF
            </div>

            <img src="images/medicine3.jpg" alt="Medicine">

            <h3>Vitamin C 500mg</h3>

            <p class="category">
                Tablet
            </p>

            <p class="old-price">
                ৳100
            </p>

            <div class="bottom">

                <strong>
                    ৳95
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>


        <div class="medicine-card">

            <div class="discount">
                10% OFF
            </div>

            <img src="images/medicine4.jpg" alt="Medicine">

            <h3>Antacid Syrup</h3>

            <p class="category">
                Syrup
            </p>

            <p class="old-price">
                ৳150
            </p>

            <div class="bottom">

                <strong>
                    ৳135
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>


        <div class="medicine-card">

            <div class="discount">
                5% OFF
            </div>

            <img src="images/medicine5.jpg" alt="Medicine">

            <h3>Ibuprofen 400mg</h3>

            <p class="category">
                Tablet
            </p>

            <p class="old-price">
                ৳60
            </p>

            <div class="bottom">

                <strong>
                    ৳57
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>


        <div class="medicine-card">

            <div class="discount">
                10% OFF
            </div>

            <img src="images/medicine6.jpg" alt="Medicine">

            <h3>Cough Syrup</h3>

            <p class="category">
                Syrup
            </p>

            <p class="old-price">
                ৳200
            </p>

            <div class="bottom">

                <strong>
                    ৳180
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>

    </div>

</section>


<section class="medicine-section">

    <div class="section-heading">

        <h2>Doctor Guided Medicine</h2>

        <a href="#">See All</a>

    </div>


    <div class="medicine-container">

        <div class="medicine-card">

            <img src="images/medicine7.jpg" alt="Medicine">

            <h3>Ketozol Shampoo</h3>

            <p class="category">
                Shampoo
            </p>

            <div class="bottom">

                <strong>
                    ৳207
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>


        <div class="medicine-card">

            <img src="images/medicine8.jpg" alt="Medicine">

            <h3>Sergel 20</h3>

            <p class="category">
                Capsule-(20mg)
            </p>

            <div class="bottom">

                <strong>
                    ৳70
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>


        <div class="medicine-card">

            <img src="images/medicine9.jpg" alt="Medicine">

            <h3>Monas 10</h3>

            <p class="category">
                Tablet-(10mg)
            </p>

            <div class="bottom">

                <strong>
                    ৳262
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>


        <div class="medicine-card">

            <img src="images/medicine10.jpg" alt="Medicine">

            <h3>Volinac Gel</h3>

            <p class="category">
                Gel-(50gm)
            </p>

            <div class="bottom">

                <strong>
                    ৳75
                </strong>

                <button onclick="addToCart()">
                    ADD
                </button>

            </div>

        </div>

    </div>

</section>


<footer>

    <p>
        © 2026 Pharmacy Management System. All Rights Reserved.
    </p>

</footer>


<script src="js/home.js"></script>

</body>

</html>