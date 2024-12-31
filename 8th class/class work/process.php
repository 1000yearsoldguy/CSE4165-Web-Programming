<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get form data
  $pineapples = $_POST["pineapples"];
  $delivery = $_POST["delivery"];
  $location = $_POST["location"];
  $tip = $_POST["tip"];

  // Validate and sanitize data (e.g., input filtering)
  $pineapples = filter_var($pineapples, FILTER_VALIDATE_INT);
  $tip = filter_var($tip, FILTER_VALIDATE_FLOAT);

  // Calculate discount
  $pineapplePrice = 12.5;
  $discount = 0;
  if ($pineapples >= 1 && $pineapples <= 9) {
    $discount = 0.05;
  } else if ($pineapples >= 10 && $pineapples <= 19) {
    $discount = 0.10;
  } else if ($pineapples >= 20) {
    $discount = 0.15;
  }

  // Calculate total
  $total = $pineapples * $pineapplePrice * (1 - $discount);

  // Add delivery charge if applicable
  if ($delivery === "yes") {
    $total += 40;
  }

  // Calculate tax
  $taxRate = 0;
  if ($location === "dhaka") {
    $taxRate = 0.20;
  } else if ($location === "chittagong") {
    $taxRate = 0.15;
  }
  $total += $total * $taxRate;

  // Add tip
  $total += $tip;

  // Display the result
  echo "<h1>Your Total Bill:</h1>";
  echo "<p>BDT " . number_format($total, 2) . "</p>";
} else {
  // Handle invalid request
  echo "Invalid request.";
}

?>