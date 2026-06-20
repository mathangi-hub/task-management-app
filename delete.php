<?php

include "db_connect.php";

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM tasks
WHERE id='$id'"
);

header("Location: dashboard.php");

?>
