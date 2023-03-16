<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sql_tasks";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
  die ("connection failed:" . $conn->connect_error);

}

$sql = "SELECT id, task_name, task_description, task_due_date, task_status FROM tasks";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Due Date</th><th>Status</th><th>Actions</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["task_name"] . "</td>";
    echo "<td>" . $row["task_description"] . "</td>";
    echo "<td>" . $row["task_due_date"] . "</td>";
    echo "<td>" . $row["task_status"] . "</td>";
    echo "<td><a href='edit_task.php?id=" . $row["id"] . "'>Edit</a> <a href='delete_task.php?id=" . $row["id"] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
?>
<html>
  <body>
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
  
<form action="filter_task.php" method="GET">
  <br>
  <label for="status-filter">Filter by status:</label>
  <select id="status-filter" name="status">
    <option value="all">All</option>
    <option value="Incomplete">Incomplete</option>
    <option value="In Progress">In Progress</option>
    <option value="Complete">Complete</option>
  </select>
  <button type="submit">Filter</button>
</form>

  </body>
</html>