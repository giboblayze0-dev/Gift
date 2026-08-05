<?php

include "db.php";


$id = $_GET['id'];


// Add view

mysqli_query($conn,
"UPDATE songs SET views = views + 1 WHERE id=$id"
);



$sql = "SELECT * FROM songs WHERE id=$id";

$result = mysqli_query($conn,$sql);

$song = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>

<html>

<head>


<title>
<?php echo $song['title']; ?> - <?php echo $song['artist']; ?> | Zengomusic
</title>


<meta name="description" content="
Download <?php echo $song['title']; ?> by <?php echo $song['artist']; ?> on Zengomusic.
">


<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="style.css">


</head>



<body>



<header>

<h1>Zengomusic</h1>

</header>



<div class="song-page">


<img 
src="<?php echo $song['image']; ?>"
width="300"
>



<h2>
<?php echo $song['title']; ?>
</h2>



<h3>
<?php echo $song['artist']; ?>
</h3>



<audio controls>

<source src="<?php echo $song['audio']; ?>" type="audio/mpeg">

</audio>



<br><br>



<a class="download"
href="<?php echo $song['download']; ?>"
download>

Download Song

</a>



<p>

Views:
<?php echo $song['views']; ?>

</p>



</div>




</body>

</html>
