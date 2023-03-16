<?php

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "sql_tasks";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$filter = $_GET["status"];

$sql = "SELECT * FROM tasks WHERE task_status = '$filter' ORDER BY task_due_date";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Due Date</th><th>Status</th></tr>";
while ($row = $result->fetch_assoc()) {
  echo "<tr><td>".$row["id"]."</td><td>".$row["task_name"]."</td><td>".$row["task_description"]."</td><td>".$row["task_due_date"]."</td><td>".$row["task_status"]."</td></tr>";
}
echo "</table>";

$conn->close();
?>
<style>

td {
  background-color: black;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 1px;
  cursor: pointer;
}

td:hover {
  background-color: pink;
}
    </style>