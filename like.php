<?php

include "db.php";


$id = $_POST['id'];


$sql = "UPDATE songs 
SET likes = likes + 1 
WHERE id=$id";


mysqli_query($conn,$sql);


$result = mysqli_query(
$conn,
"SELECT likes FROM songs WHERE id=$id"
);


$data = mysqli_fetch_assoc($result);


echo $data['likes'];

?>
