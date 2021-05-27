<?php
require_once("../includes/braintree_init.php");
$result = $gateway->customer()->create([

    'firstName' => 'Mike',
    'lastName' => 'Jones',
    'company' => 'Jones Co.',
    'email' => 'mike.jones@example.com',
    'phone' => '281.330.8004',
    'fax' => '419.555.1235',
    'website' => 'http://example.com'
]);

$result->success;
# true

$result->customer->id;
# Generated customer id