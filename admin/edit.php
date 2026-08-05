<?php

session_start();

if(!isset($_SESSION['admin'])){

header("Location: login.php");
exit;

}


include "../db.php";


$id = $_GET['id'];


// Get song data

$result = mysqli_query(
$conn,
"SELECT * FROM songs WHERE id=$id"
);


$song = mysqli_fetch_assoc($result);



if(isset($_POST['update'])){


$title = $_POST['title'];

$artist = $_POST['artist'];

$image = $_POST['image'];

$audio = $_POST['audio'];

$download = $_POST['download'];

$section = $_POST['section'];



$sql = "UPDATE songs SET

title='$title',

artist='$artist',

image='$image',

audio='$audio',

download='$download',

section='$section'


WHERE id=$id";



mysqli_query($conn,$sql);



echo "Song updated successfully";


}


?>


<!DOCTYPE html>
<html>

<head>

<title>Edit Song</title>

</head>


<body>


<h1>Edit Song</h1>


<form method="POST">


<input 
name="title"
value="<?php echo $song['title']; ?>"
>


<br><br>


<input 
name="artist"
value="<?php echo $song['artist']; ?>"
>


<br><br>


<input 
name="image"
value="<?php echo $song['image']; ?>"
>


<br><br>


<input 
name="audio"
value="<?php echo $song['audio']; ?>"
>


<br><br>


<input 
name="download"
value="<?php echo $song['download']; ?>"
>


<br><br>


<select name="section">


<option value="new">
New Music
</option>


<option value="trending">
Trending Music
</option>


<option value="album">
Album
</option>


<option value="new_video">
New Video
</option>


<option value="trending_video">
Trending Video
</option>


</select>


<br><br>


<button name="update">
Update Song
</button>


</form>


</body>

</html>
