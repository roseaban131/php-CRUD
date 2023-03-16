<?php

$conn = mysqli_connect("localhost", "root", "root", "sql_tasks");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

  
    $sql = "DELETE FROM tasks WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Task deleted.";
    } else {
        echo "Error" . mysqli_error($conn);
    }
} else {
    echo "Error deleting task.";
    exit;
}
?>