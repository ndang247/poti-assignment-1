<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bottomRight.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Shopping Cart</title>
</head>

<body>
    <div>
        <div>
            <h1>
                <a href="#" class="d-flex justify-content-center align-items-center mb-md-0 text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    &nbsp;
                    <span>Shopping Cart</span>
                </a>
            </h1>
        </div>
        <div>
            <?php
            session_start();
            switch ($_POST['slcAction']) {
                case 'Add':
                    // If the session cart is not set then set the session cart to an empty array
                    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
                    // The $_SESSION['cart'] is a 2D array with each element being an array of 
                    // product id, product name, unit price, unit quantity, purchase quantity and total price
                    // Add the product to the session cart
                    // First check if the item is already in the cart
                    $itemFound = false;
                    foreach ($_SESSION['cart'] as $item) {
                        if ($item['id'] == $_POST['productId']) {
                            $itemFound = true;
                            break;
                        }
                    }
                    // If the item is not in the cart then add it
                    if (!$itemFound) {
                        array_push($_SESSION['cart'], array(
                            "id" => $_POST['productId'],
                            "name" => $_POST['productName'],
                            "price" => $_POST['unitPrice'],
                            "quantity" => $_POST['unitQuantity'],
                            "purchase" => $_POST['purchaseQuantity'],
                            "subTotal" => $_POST['purchaseQuantity'] * $_POST['unitPrice']
                        ));
                    } else {
                        // If the item is in the cart then update the purchase quantity
                        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                            if ($_SESSION['cart'][$i]['id'] == $_POST['productId']) {
                                $_SESSION['cart'][$i]['purchase'] += $_POST['purchaseQuantity'];
                                $_SESSION['cart'][$i]['subTotal'] = $_SESSION['cart'][$i]['purchase'] * $_SESSION['cart'][$i]['price'];
                                break;
                            }
                        }
                    }
                    break;
                case 'Clear':
                    // Clear to destroy the session cart
                    unset($_SESSION['cart']);
                    session_destroy();
                    print_r($_SESSION['cart']);
                    break;
                case 'Checkout':
                    break;
                default:
                    break;
            }
            ?>
            <div class="card">
                <div class="card-body cart">
                    <h4>Product
                        <span class="float-end">Sub Total</span>
                    </h4>
                    <form method="GET" action="checkout.php" target="top_right">
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            echo "<p>" . $item['name'] . " * " . $item['purchase'] .
                                "<span class='float-end'>" . "<b>" . "$" . $item['subTotal'] . "</b>" .
                                "</span>" . "</p>";
                        }
                        ?>
                        <hr>
                        <p>
                            Total
                            <span class="float-end">
                                <b>
                                    <?php
                                    foreach ($_SESSION['cart'] as $item) {
                                        $total += $item['subTotal'];
                                    }
                                    echo "$" . $total;
                                    ?>
                                </b>
                            </span>
                        </p>

                        <div class="float-right">
                            <input type="submit" class="btn btn-success" name="slcAction" value="Checkout">
                            <input type='submit' form="formClear" class='btn btn-danger' name='slcAction' value='Clear'>
                        </div>
                    </form>
                    <form id='formClear' method="POST" action="cart.php"></form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>