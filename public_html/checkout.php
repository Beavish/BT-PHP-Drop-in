<?php

use Braintree\PaymentMethod;

require_once("../includes/braintree_init.php");

$amount = $_POST["amount"];
$nonce = $_POST["payment_method_nonce"];
//php -S localhost:3000 -t public_html
// $clientToken = $gateway->clientToken()->generate();
//
$result = $gateway->paymentMethod()->create([
  'customerId' => '145785331',
  'paymentMethodNonce' => $nonce,
  'options' => [
    'makeDefault' => true
  ]
]);
$result->paymentMethod->isDefault();
echo($result->paymentMethod->token);

