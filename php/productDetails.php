<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/c818109c96.js" crossorigin="anonymous"></script>
    <title>Product Details</title>
</head>

<body>
    <div>
        <div>
            <h1>
                <a href="#" class="d-flex justify-content-center align-items-center mb-md-0 text-dark text-decoration-none">
                    <i class="fa-solid fa-circle-info"></i>
                    &nbsp;
                    <span>Product Details</span>
                </a>
            </h1>
            <?php
            session_start();
            if (isset($_GET['id'])) {
                // Store the selected product id in a session variable
                $_SESSION['product_id'] = $_GET['id'];

                // Connect to MySQL database
                $conn = mysqli_connect('aa1tv0d0z1bqh2d.ch7n15u5bxoa.us-east-1.rds.amazonaws.com', 'uts', 'potiass1DB', 'assignment1');

                // Check connection
                if (!$conn) die("Connection failed: " . mysqli_connect_error());

                $query = "SELECT * FROM products WHERE product_id = " . $_SESSION['product_id'];
                $result = mysqli_query($conn, $query);

                // Check the number of records returned using $num_rows
                $num_rows = mysqli_num_rows($result);

                // If the number of records is 1, then the product exists
                if ($num_rows > 0) {
                    // Prevent the form from submitting if validation is false
                    echo "<form method='POST' action='cart.php' target='bottom-right' onsubmit='return quantityValidation()'>
                    <table class='table table-sm'>
                        <thead class='table-dark'>
                            <tr>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Unit Quantity</th>
                                <th>In Stock</th>
                                <th>Purchase Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>";
                    if ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td>" . $row['product_name'] . "</td>
                        <td>$" . $row['unit_price'] . "</td>
                        <td>" . $row['unit_quantity'] . "</td>
                        <td>" . $row['in_stock'] . "</td>
                        <td>
                            <input id='txtQuantity' type='text' class='form-control' placeholder='Quantity' name='purchaseQuantity' value=1 required>
                        </td>
                        <td>
                            <input type='submit' class='btn btn-primary float-end' name='slcAction' value='Add'>
                        </td>
                    </tr>";
                    }
                    echo "<input name='productId' value=" . $_SESSION['product_id'] . " hidden>
                    <input name='productName' value=\"" . $row['product_name'] . "\" hidden>
                    <input name='unitPrice' value=" . $row['unit_price'] . " hidden>
                    <input name='unitQuantity' value=\"" . $row['unit_quantity'] . "\" hidden>";
                    echo "</table>";
                    echo "</form>";
                }
                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/productDetails.js"></script>
</body>

</html>