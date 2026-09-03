<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['update_cart'])) {

    foreach ($_POST['quantity'] as $index => $quantity) {

        $quantity = (int) $quantity;

        if ($quantity > 0 && isset($_SESSION['cart'][$index])) {
            $_SESSION['cart'][$index]['quantity'] = $quantity;
        }

    }

    header("Location: cart.php");
    exit;
}

$total = 0;
?>

<!DOCTYPE html>
<html>

<head>

    <title>Shopping Cart - Pharmacy Management System</title>

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

    <nav>

        <a href="home.php">
            Home
        </a>

        <a href="cart.php" class="cart">

            <i class="fa-solid fa-cart-shopping"></i>

            Cart

            <span>
                <?php echo count($_SESSION['cart']); ?>
            </span>

        </a>

    </nav>

</header>


<section class="medicine-section">

    <div class="section-heading">

        <h2>
            Shopping Cart
        </h2>

    </div>


    <?php if (empty($_SESSION['cart'])): ?>

        <div style="text-align:center; padding:50px;">

            <i class="fa-solid fa-cart-shopping"
               style="font-size:50px;">
            </i>

            <h2>
                Your cart is empty
            </h2>

            <br>

            <a href="home.php">
                Continue Shopping
            </a>

        </div>

    <?php else: ?>


        <form method="POST">

            <?php foreach ($_SESSION['cart'] as $index => $item): ?>

                <?php

                $subtotal =
                    $item['price'] * $item['quantity'];

                $total += $subtotal;

                ?>

                <div style="
                    background:white;
                    padding:20px;
                    margin-bottom:15px;
                    border-radius:10px;
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                ">

                    <div>

                        <h3>
                            <?php
                            echo htmlspecialchars(
                                $item['medicine']
                            );
                            ?>
                        </h3>

                        <p>
                            Price:
                            ৳<?php
                            echo number_format(
                                $item['price'],
                                2
                            );
                            ?>
                        </p>

                    </div>


                    <div>

                        <label>
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity[<?php echo $index; ?>]"
                               value="<?php echo $item['quantity']; ?>"
                               min="1"
                               style="width:60px; padding:8px;">

                    </div>


                    <div>

                        <strong>

                            ৳<?php
                            echo number_format(
                                $subtotal,
                                2
                            );
                            ?>

                        </strong>

                    </div>


                    <div>

                        <a href="removeCart.php?index=<?php echo $index; ?>"
                           onclick="return confirm('Remove this medicine from cart?');">

                            Remove

                        </a>

                    </div>

                </div>

            <?php endforeach; ?>


            <div style="
                background:white;
                padding:25px;
                border-radius:10px;
                margin-top:20px;
            ">

                <h2>
                    Total:
                    ৳<?php echo number_format($total, 2); ?>
                </h2>

                <br>

                <button type="submit"
                        name="update_cart">

                    Update Cart

                </button>

                <a href="home.php"
                   style="margin-left:20px;">

                    Continue Shopping

                </a>

            </div>

        </form>


    <?php endif; ?>

</section>


<footer>

    <p>
        © 2026 Pharmacy Management System. All Rights Reserved.
    </p>

</footer>

</body>

</html>