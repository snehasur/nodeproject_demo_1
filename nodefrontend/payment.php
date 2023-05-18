<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h4 class="mb-3">Payment</h4>

<div class="d-block my-3">
    <div class="custom-control custom-radio">
        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="credit">Credit card</label>
    </div>
    <div class="custom-control custom-radio">
        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="debit">Debit card</label>
    </div>
    <div class="custom-control custom-radio">
        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="paypal">Paypal</label>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="cc-name">Name on card</label>
        <input type="text" class="form-control" id="cc-name" placeholder="" required>
        <small class="text-muted">Full name as displayed on card</small>
        <div class="invalid-feedback">
            Name on card is required
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="cc-number">Credit card number</label>
        <input type="text" class="form-control" id="cc-number" placeholder="" required>
        <div class="invalid-feedback">
            Credit card number is required
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 mb-3">
        <label for="cc-expiration">Expiration</label>
        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
        <div class="invalid-feedback">
            Expiration date required
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="cc-expiration">CVV</label>
        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
        <div class="invalid-feedback">
            Security code required
        </div>
    </div>
</div>

</body>
</html>
