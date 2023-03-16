<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "sql_tasks";

$conn = new mysqli($servername, $username,$password, $dbname);

if (!$conn) {
  die ("connection failed:" . mysqli_connect_error());

}
if (isset($_POST['submit'])) {
    $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
    $task_description = mysqli_real_escape_string($conn, $_POST['task_description']);
    $task_due_date = mysqli_real_escape_string($conn, $_POST['task_due_date']);
    $task_status = mysqli_real_escape_string($conn, $_POST['task_status']);

    $sql = "INSERT INTO tasks (task_name, task_description, task_due_date, task_status) VALUES ('$task_name', '$task_description', '$task_due_date', '$task_status')";
    if (mysqli_query($conn, $sql)) {
        echo "Added new task";
    } else {
        echo "Error: Failed " . $sql . "<br>" . mysqli_error($conn);
    }
}
    mysqli_close($conn);

?>

<html>
    <head>
        <title>Add</title>
    </style>
    </head>
    <body>

    <h2>Add a new task</h2>
    <form method = "post" action = "">
        <label for = "task_name">Task name:</label><br>
        <input type = "text" name = "task_name" required><br><br>

        <label for = "task_description">Task description:</label><br>
        <textarea name = "task_description" required></textarea><br><br>

        <label for = "task_due_date">Task due date:</label><br>
        <input type = "date" name = "task_due_date" required><br><br>
        
        <label for = "task_status">Task status:</label><br>
        <select name = "task_status" required>
            <option value = "Incomplete">Incomplete</option>
            <option value = "In Progress">In Progress</option>
            <option value = "Complete">Complete</option>
         </select><br><br>
         <input type = "submit" name= "submit" value = "Submit">
    </form>
    </body>
    </html>