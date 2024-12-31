<?php

function calculateArea($width, $height) {
    $area = $width * $height;
    return $area;
}

// Get input values (you can replace these with actual user input)
$width = 5;
$height = 10;

// Call the function and store the result
$rectangleArea = calculateArea($width, $height);

// Display the result
echo "The area of the rectangle is: " . $rectangleArea; 

?>