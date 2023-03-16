<?php

$conn = mysqli_connect("localhost", "root", "root", "sql_tasks");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Error: No task found.";
        exit;
    }
} else {
   
    echo "No task selected.";
    exit;
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $due_date = $_POST["due_date"];
    $status = $_POST["status"];

    $sql = "UPDATE tasks SET task_name = '$name', task_description = '$description', task_due_date = '$due_date', task_status = '$status' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Task edited complete.";
    } else {
        echo "Error editing task: " . mysqli_error($conn);
    }
}

?>
<html>
    <head>
        <title>Add</title>
    </style>
    </head>
    <body>

    <h2>Edit task</h2>
<form method="post">
    <label for="name">Task Name:</label><br>
    <input type="text" name="name" value="<?php echo $row["task_name"]; ?>"><br><br>

    <label for="task description">Task Description:</label><br>
    <textarea name="task description"><?php echo $row["task_description"]; ?></textarea><br><br>

    <label for="due_date">Task Due Date:</label><br>
    <input type="date" name="due_date" value="<?php echo $row["task_due_date"]; ?>"><br><br>

    <label for="status">Task Status:</label><br>
    <select name="status">
        <option value="Incomplete" <?php if ($row["task_status"] == "Incomplete") echo "selected"; ?>>Incomplete</option>
        <option value="Complete" <?php if ($row["task_status"] == "Complete") echo "selected"; ?>>Complete</option>
        <option value="In Progress" <?php if ($row["task_status"] == "In Progress") echo "selected"; ?>>In Progress</option>
    </select><br><br>

    <input type="submit" name="submit" value="Save">
</form>
    </body>
</html>