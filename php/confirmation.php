<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/confirmation.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/c818109c96.js" crossorigin="anonymous"></script>
    <title>Confirmation</title>
</head>

<body>
    <div>
        <div>
            <h1 class="text-center">
                <?php
                session_start();
                // Display the confirmation page if the cart exists
                // Otherwise display empty cart message
                if (isset($_SESSION['cart'])) {
                    echo "Purchase Confirmation";
                } else echo "<p>Your cart is empty.</p>
                <p>Please refresh the page to continue shopping.</p>";
                ?>
            </h1>
        </div>
        <div>
            <?php
            // User input
            $name = $_POST['firstName'] . " " . $_POST['lastName'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $suburb = $_POST['suburb'];
            $country = $_POST['country'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];

            // Set date and time
            date_default_timezone_set('Australia/Sydney');
            $date = date("d-M-Y");
            $time = date("H:i A, D,");

            // Loop over the cart items if the cart is set and is an array
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                echo "<p class='text-center'>Thank you for your purchase!</p>
                <h2>Customer's Details:</h2>
                <p><span class='fw-bold'>Name: </span>" . $name . "</p>
                <p><span class='fw-bold'>Email: </span> " . $email . "</p>
                <p><span class='fw-bold'>Address: </span> " . $address .  "</p>
                <p><span class='fw-bold'>Suburb: </span> " . $suburb . "</p>
                <p><span class='fw-bold'>Country: </span> " . $country . "</p>
                <p><span class='fw-bold'>State: </span> " . $state . "</p>
                <p><span class='fw-bold'>Zip: </span> " . $zip . "</p>
                <h2>Your order details are below:</h2>
                <table class='confirmationTable'>
                    <tr>
                        <th class='cell'>Product</th>
                        <th class='cell'>Unit</th>
                        <th class='cell'>Price</th>
                        <th class='cell'>Quantity</th>
                        <th class='cell'>Sub Total</th>
                    </tr>";
                foreach ($_SESSION['cart'] as $item) {
                    echo "<tr>
                            <td class='cell'>" . $item['name'] . "</td>
                            <td class='cell'>" . $item['quantity'] . "</td>
                            <td class='cell'>" . $item['price'] . "</td>
                            <td class='cell'>" . $item['purchase'] . "</td>
                            <td class='cell'>" . "$" . $item['subTotal'] . "</td>
                        </tr>";
                }
                echo "<tr>
                        <td colspan='5' class='total'><span class='fw-bold'>Total Price: </span>$" . $_SESSION['totalPrice'] . "</td>
                    </tr>
                </table>
                <br>
                <p>Thank you for shopping with us!</p>
                <p>Please finalise your payment to process the order further.</p>
                <p>Order Time: " . $time . " " . $date . "</p>";
                unset($_SESSION['cart']);
                session_unset();
                session_destroy();
                // Test to see if the session cart is destroy after unset
                if (isset($_SESSION['cart'])) print_r($_SESSION['cart']);
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>