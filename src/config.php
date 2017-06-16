<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_5cuC4yCDgAv5rq8wvBtnqNNt",
  "publishable_key" => "pk_test_pfqRpfAQiBPwgHfcQ51ZKpU1"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>