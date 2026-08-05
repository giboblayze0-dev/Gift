<?php

include "db.php";

$q = "";

if(isset($_GET['q'])){
    $q = trim($_GET['q']);
}

$sql = "SELECT * FROM songs
WHERE title LIKE '%$q%'
OR artist LIKE '%$q%'
OR section LIKE '%$q%'
ORDER BY id DESC";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Search - Zengomusic</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Search Music</h1>

<form action="search.php" method="GET">

<input
type="text"
name="q"
placeholder="Search song or artist..."
value="<?php echo htmlspecialchars($q); ?>">

<button type="submit">

Search

</button>

</form>

<div class="grid">

<?php

while($song=mysqli_fetch_assoc($result)){

?>

<div class="card">

<a href="music/<?php echo $song['slug']; ?>">

<img src="<?php echo $song['image']; ?>">

<h3><?php echo $song['title']; ?></h3>

<p><?php echo $song['artist']; ?></p>

</a>

</div>

<?php

}

?>

</div>

</body>

</html>
