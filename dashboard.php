<?php

session_start();
include "db_connect.php";

if(!isset($_SESSION['user'])){
header("Location: login.php");
}

$user_id = $_SESSION['user'];

if(isset($_POST['add'])){

$title = $_POST['title'];
$status = $_POST['status'];

mysqli_query(
$conn,
"INSERT INTO tasks
(user_id,title,status)
VALUES
('$user_id','$title','$status')"
);

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>

<h2>Task Dashboard</h2>

<form method="POST">

<input
type="text"
name="title"
placeholder="Task Title"
required>

<select name="status">

<option>Pending</option>

<option>In Progress</option>

<option>Completed</option>

</select>

<button name="add">
Add Task
</button>

</form>

<br>

<table border="1">

<tr>
<th>Task</th>
<th>Status</th>
<th>Delete</th>
</tr>

<?php

$result = mysqli_query(
$conn,
"SELECT * FROM tasks
WHERE user_id='$user_id'"
);

while(
$row = mysqli_fetch_assoc($result)
){

?>

<tr>

<td>
<?php echo $row['title']; ?>
</td>

<td>
<?php echo $row['status']; ?>
</td>

<td>

<a href="delete.php?id=<?php
echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="logout.php">
Logout
</a>

</body>
</html>
