<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiuweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border=1>";
  echo "<th>SL</th><th>Name</th><th>Student ID</th><th>Department</th><th>Mark</th><th>Age</th>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>$row[sl]</td><td>$row[name]</td><td>$row[s_id]</td><td>$row[dept]</td><td>$row[mark]</td><td>$row[age]</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo "<hr>";

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $sum = 0;
  $count = 0;
  while ($row = $result->fetch_assoc()) {
    if ($row['age'] >= 30 && $row['age'] <= 60) {
      $sum = $sum + $row['mark'];
      $count = $count + 1;
    }
  }
  echo $sum / $count;
} else {
  echo "0 results";
}
echo "<hr>";

$conn->close();
?>