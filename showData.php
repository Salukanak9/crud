<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kanak";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo"<h1 align=center>Data in Users table</h1><p align='center'><a href='index.php'>Back to Home</a></p>";

$sql = "SELECT * FROM users";
if ($res = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($res) > 0) {
        echo "<table width='100%' border=2>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Designation</th>";
        echo "<th>Salary</th>";
        echo "<th>Date</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['designation']."</td>";
            echo "<td>".$row['salary']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else {
        echo "No matching records are found.";
    }
}

mysqli_close($conn);
?> 