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

<title><?php echo $song['title']; ?> | Zengomusic</title>

<meta name="description" content="Download <?php echo $song['title']; ?> by <?php echo $song['artist']; ?>">

<link rel="canonical" href="https://zengomusic.great-site.net/<?php echo $song['slug']; ?>">

<script type="application/ld+json">
{
 "@context":"https://schema.org",
 "@type":"MusicRecording",
 "name":"<?php echo $song['title']; ?>",
 "byArtist":{
   "@type":"MusicGroup",
   "name":"<?php echo $song['artist']; ?>"
 },
 "image":"<?php echo $song['image']; ?>",
 "url":"https://zengomusic.great-site.net/<?php echo $song['slug']; ?>",
 "datePublished":"<?php echo date('Y-m-d', strtotime($song['created_at'])); ?>",
 "genre":"Malawi Music",
 "description":"Download <?php echo $song['title']; ?> by <?php echo $song['artist']; ?> on Zengomusic."
}
</script>

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

<div class="like-box">

❤️ 
<span id="likes">
<?php echo $song['likes']; ?>
</span>

Likes

<br><br>

<button onclick="likeSong()">

❤️ Like

</button>


</div>

<p>

Views:
<?php echo $song['views']; ?>

</p>



</div>


<script>


function likeSong(){


let id = "<?php echo $song['id']; ?>";


let liked = localStorage.getItem(
"liked_"+id
);



if(liked){

alert("You already liked this song");

return;

}



fetch("like.php",{

method:"POST",

headers:{

"Content-Type":"application/x-www-form-urlencoded"

},

body:"id="+id


})

.then(res=>res.text())

.then(data=>{


document.getElementById("likes").innerHTML=data;


localStorage.setItem(
"liked_"+id,
"yes"
);


});


}


</script>

</body>

</html>
