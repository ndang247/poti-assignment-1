<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/checkout.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Checkout</title>
</head>

<body>
    <div>
        <div>
            <h1 class="text-center">
                Checkout
            </h1>
        </div>
        <div class="col-md-7 col-lg-8">
            <form id="checkoutForm" method="POST" action="sendEmail.php" class="needs-validation" onsubmit="return isValidate(event)" novalidate>
                <div id="checkout" class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstName" placeholder="First Name" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="suburb" class="form-label">Suburb</label>
                        <input type="text" class="form-control" name="suburb" placeholder="Campsie" required>
                        <div class="invalid-feedback">
                            Please enter your suburb.
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" name="country" required>
                            <option value="">Choose...</option>
                            <option>Australia</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="state" class="form-label">State</label>
                        <select class="form-select" name="state" required>
                            <option value="">Choose...</option>
                            <option>NSW</option>
                            <option>Victoria</option>
                            <option>Queensland</option>
                            <option>South Australia</option>
                            <option>Western Australia</option>
                            <option>Northen Territory</option>
                            <option>Tasmania</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" class="form-control" name="zip" placeholder="2194" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <input class="w-100 btn btn-primary" type="submit" value="Purchase">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/checkoutValidation.js"></script>
</body>

</html>