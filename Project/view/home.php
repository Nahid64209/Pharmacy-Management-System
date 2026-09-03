<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {

    $medicine = $_POST['medicine'];
    $price = (float) $_POST['price'];
    $image = $_POST['image'];

    $found = false;

    foreach ($_SESSION['cart'] as &$item) {

        if ($item['medicine'] === $medicine) {

            $item['quantity']++;

            $found = true;

            break;
        }
    }

    unset($item);

    if (!$found) {

        $_SESSION['cart'][] = [
            'medicine' => $medicine,
            'price' => $price,
            'image' => $image,
            'quantity' => 1
        ];
    }

    header("Location: home.php");
    exit;
}

$cartCount = 0;

foreach ($_SESSION['cart'] as $item) {
    $cartCount += $item['quantity'];
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Medicine Store - Pharmacy Management System</title>

    <link rel="stylesheet" href="../css/home.css">

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

        <button type="button">
            Search
        </button>

    </div>


    <nav>

        <a href="home.php">
            Home
        </a>

        <a href="index.php">
            About
        </a>

        <a href="index.php">
            Features
        </a>

        <a href="index.php">
            Contact
        </a>

        <a href="login.php" class="login">

            <i class="fa-solid fa-user"></i>

            Login

        </a>

        <a href="signup.php" class="signup">
            Sign Up
        </a>

        <a href="cart.php" class="cart">

            <i class="fa-solid fa-cart-shopping"></i>

            Cart

            <span id="cartCount">
                <?php echo $cartCount; ?>
            </span>

        </a>

    </nav>

</header>


<div class="category-menu">

    <a href="#all">
        All
    </a>

    <a href="#tablets">
        Tablets
    </a>

    <a href="#capsules">
        Capsules
    </a>

    <a href="#syrup">
        Syrup
    </a>

    <a href="#cream">
        Cream
    </a>

    <a href="#injection">
        Injection
    </a>

</div>


<section class="page-title">

    <h1>
        Online Medicine Store
    </h1>

    <p>
        Find and purchase medicines easily from our pharmacy.
    </p>

</section>


<section class="medicine-section" id="all">

    <div class="section-heading">

        <h2>
            All Medicines
        </h2>

        <a href="#">
            See All
        </a>

    </div>


    <div class="medicine-container">


        <!-- Medicine 1 -->

        <div class="medicine-card">

            <div class="discount">
                10% OFF
            </div>

            <img src="images/medicine1.jpg"
                 alt="Napa 500mg">

            <h3>
                Napa 500mg
            </h3>

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

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Napa 500mg">

                    <input type="hidden"
                           name="price"
                           value="10.80">

                    <input type="hidden"
                           name="image"
                           value="medicine1.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>


        <!-- Medicine 2 -->

        <div class="medicine-card">

            <div class="discount">
                10% OFF
            </div>

            <img src="images/medicine2.jpg"
                 alt="Omeprazole 20mg">

            <h3>
                Omeprazole 20mg
            </h3>

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

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Omeprazole 20mg">

                    <input type="hidden"
                           name="price"
                           value="72">

                    <input type="hidden"
                           name="image"
                           value="medicine2.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>


        <!-- Medicine 3 -->

        <div class="medicine-card">

            <div class="discount">
                5% OFF
            </div>

            <img src="images/medicine3.jpg"
                 alt="Vitamin C 500mg">

            <h3>
                Vitamin C 500mg
            </h3>

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

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Vitamin C 500mg">

                    <input type="hidden"
                           name="price"
                           value="95">

                    <input type="hidden"
                           name="image"
                           value="medicine3.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>


        <!-- Medicine 4 -->

        <div class="medicine-card">

            <div class="discount">
                10% OFF
            </div>

            <img src="images/medicine4.jpg"
                 alt="Antacid Syrup">

            <h3>
                Antacid Syrup
            </h3>

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

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Antacid Syrup">

                    <input type="hidden"
                           name="price"
                           value="135">

                    <input type="hidden"
                           name="image"
                           value="medicine4.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>


        <!-- Medicine 5 -->

        <div class="medicine-card">

            <div class="discount">
                5% OFF
            </div>

            <img src="images/medicine5.jpg"
                 alt="Ibuprofen 400mg">

            <h3>
                Ibuprofen 400mg
            </h3>

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

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Ibuprofen 400mg">

                    <input type="hidden"
                           name="price"
                           value="57">

                    <input type="hidden"
                           name="image"
                           value="medicine5.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>


        <!-- Medicine 6 -->

        <div class="medicine-card">

            <div class="discount">
                10% OFF
            </div>

            <img src="images/medicine6.jpg"
                 alt="Cough Syrup">

            <h3>
                Cough Syrup
            </h3>

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

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Cough Syrup">

                    <input type="hidden"
                           name="price"
                           value="180">

                    <input type="hidden"
                           name="image"
                           value="medicine6.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>


<section class="medicine-section">

    <div class="section-heading">

        <h2>
            Doctor Guided Medicine
        </h2>

        <a href="#">
            See All
        </a>

    </div>


    <div class="medicine-container">


        <!-- Medicine 7 -->

        <div class="medicine-card">

            <img src="images/medicine7.jpg"
                 alt="Ketozol Shampoo">

            <h3>
                Ketozol Shampoo
            </h3>

            <p class="category">
                Shampoo
            </p>

            <div class="bottom">

                <strong>
                    ৳207
                </strong>

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Ketozol Shampoo">

                    <input type="hidden"
                           name="price"
                           value="207">

                    <input type="hidden"
                           name="image"
                           value="medicine7.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>


        <!-- Medicine 8 -->

        <div class="medicine-card">

            <img src="images/medicine8.jpg"
                 alt="Sergel 20">

            <h3>
                Sergel 20
            </h3>

            <p class="category">
                Capsule-(20mg)
            </p>

            <div class="bottom">

                <strong>
                    ৳70
                </strong>

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Sergel 20">

                    <input type="hidden"
                           name="price"
                           value="70">

                    <input type="hidden"
                           name="image"
                           value="medicine8.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>


        <!-- Medicine 9 -->

        <div class="medicine-card">

            <img src="images/medicine9.jpg"
                 alt="Monas 10">

            <h3>
                Monas 10
            </h3>

            <p class="category">
                Tablet-(10mg)
            </p>

            <div class="bottom">

                <strong>
                    ৳262
                </strong>

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Monas 10">

                    <input type="hidden"
                           name="price"
                           value="262">

                    <input type="hidden"
                           name="image"
                           value="medicine9.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>


        <!-- Medicine 10 -->

        <div class="medicine-card">

            <img src="images/medicine10.jpg"
                 alt="Volinac Gel">

            <h3>
                Volinac Gel
            </h3>

            <p class="category">
                Gel-(50gm)
            </p>

            <div class="bottom">

                <strong>
                    ৳75
                </strong>

                <form method="POST">

                    <input type="hidden"
                           name="medicine"
                           value="Volinac Gel">

                    <input type="hidden"
                           name="price"
                           value="75">

                    <input type="hidden"
                           name="image"
                           value="medicine10.jpg">

                    <button type="submit"
                            name="add_to_cart">
                        ADD
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>


<footer>

    <p>
        © 2026 Pharmacy Management System. All Rights Reserved.
    </p>

</footer>


<script src="../js/home.js"></script>

</body>

</html>