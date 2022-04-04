<?php
session_start();

$subject = "Purchase Confirmation From POTI Grocery Store";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: noreply@potigrocery.com";

// User input
$name = $_POST['firstName'] . " " . $_POST['lastName'];
$email = $_POST['email'];
$address = $_POST['address'];
$suburb = $_POST['suburb'];
$country = $_POST['country'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$message = "<html><body>";
$message .= "<h1>Purchase Confirmation</h1>";
$message .= "<p>Thank you for your purchase!</p>";
$message .= "<h2>Customer's Details:</h2>";
$message .= "<p>Name: " . $name . "</p>";
$message .= "<p>Email: " . $email . "</p>";
$message .= "<p>Address: " . $address . "</p>";
$message .= "<p>Suburb: " . $suburb . "</p>";
$message .= "<p>Country: " . $country . "</p>";
$message .= "<p>State: " . $state . "</p>";
$message .= "<p>Zip: " . $zip . "</p>";
$message .= "<h2>Your order details are below:</h2>";
$message .= "<table style='font-family: arial, sans-serif; border-collapse: collapse;'>";
$message .= "<tr>
                <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Product</th>
                <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Unit</th>
                <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Price</th>
                <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Quantity</th>
                <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Sub Total</th>
            </tr>";

// Loop over the cart items
foreach ($_SESSION['cart'] as $item) {
    $message .= "<tr>
                    <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $item['name'] . "</td>
                    <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $item['quantity'] . "</td>
                    <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $item['price'] . "</td>
                    <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $item['purchase'] . "</td>
                    <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . "$" . $item['subTotal'] . "</td>
                </tr>";
}

$message .= "<tr>
                <td colspan='5' align='right' style='border: 1px solid #dddddd; text-align: right; padding: 8px;'>Total Price: $" . $_SESSION['totalPrice'] . "</td>
            </tr>";
$message .= "</table><br>";
$message .= "<p>Thank you for shopping with us!</p>";
$message .= "<p>Please finalise your payment to process the order further.</p>";

// Set date and time
date_default_timezone_set('Australia/Sydney');
$date = date("d-M-Y");
$time = date("H:i A, D,");
$message .= "<p>" . "Order Time: " . $time . " " . $date . "</p>";
$message .= "<br></body></html>";

// Send email
$sent = mail($email, $subject, $message, $headers);

if ($sent) {
    echo "Your order confirmation has been sent to: <b>" . $_POST['email'] . "</b> please check it.";
    session_unset();
    session_destroy();
} else {
    echo "Error sending email.";
}
