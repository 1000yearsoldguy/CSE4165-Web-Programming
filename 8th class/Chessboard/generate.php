<?php

// Get the value of n from the form
$n = $_POST["n"];

// Create the grid
echo "<table border='1' cellspacing='0' cellpadding='10'>";
for ($row = 0; $row < $n; $row++) {
  echo "<tr>";
  for ($column = 0; $column < $n; $column++) {
    if (($row + $column) % 2 == 0) {
      $color = 'black';
    } else {
      $color = 'white';
    }
    echo "<td style='background-color: $color; width: 40px; height: 40px;'></td>";
  }
  echo "</tr>";
}
echo "</table>";
