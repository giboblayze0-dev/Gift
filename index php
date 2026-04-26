<?php
include 'config.php'; // database connection
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Website</title>
</head>
<body>

<!-- NAV -->
<nav>
    <h2>My Music</h2>
    <a href="#">Home</a>
    <a href="#new">New</a>
    <a href="#trending">Trending</a>
    <a href="#albums">Albums</a>
    <a href="#news">News</a>
</nav>

<!-- SEARCH -->
<form action="search.php" method="GET">
    <input type="text" name="q" placeholder="Search song...">
    <button type="submit">Search</button>
</form>

<!-- NEW MUSIC -->
<h2 id="new">New Music</h2>
<div id="newMusic">
<?php
$result = mysqli_query($conn, "SELECT * FROM songs WHERE section='new' LIMIT 5");
while($row = mysqli_fetch_assoc($result)){
?>
    <div class="song">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['artist']; ?></p>
        <audio controls src="<?php echo $row['audio']; ?>"></audio>
        <a href="<?php echo $row['audio']; ?>" download>Download</a>
    </div>
<?php } ?>
</div>
<button onclick="loadMore('new')">Load More</button>

<!-- TRENDING -->
<h2 id="trending">Trending</h2>
<div id="trendingMusic">
<?php
$result = mysqli_query($conn, "SELECT * FROM songs WHERE section='trending' LIMIT 5");
while($row = mysqli_fetch_assoc($result)){
?>
    <div class="song">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['artist']; ?></p>
        <audio controls src="<?php echo $row['audio']; ?>"></audio>
        <a href="<?php echo $row['audio']; ?>" download>Download</a>
    </div>
<?php } ?>
</div>
<button onclick="loadMore('trending')">Load More</button>

<!-- ALBUMS -->
<h2 id="albums">Albums</h2>
<div id="albumsMusic">
<?php
$result = mysqli_query($conn, "SELECT * FROM songs WHERE section='album' LIMIT 5");
while($row = mysqli_fetch_assoc($result)){
?>
    <div class="song">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['artist']; ?></p>
        <audio controls src="<?php echo $row['audio']; ?>"></audio>
        <a href="<?php echo $row['audio']; ?>" download>Download</a>
    </div>
<?php } ?>
</div>
<button onclick="loadMore('album')">Load More</button>

<!-- NEWS -->
<h2 id="news">News</h2>
<div id="newsMusic">
<?php
$result = mysqli_query($conn, "SELECT * FROM songs WHERE section='news' LIMIT 5");
while($row = mysqli_fetch_assoc($result)){
?>
    <div class="song">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['artist']; ?></p>
        <audio controls src="<?php echo $row['audio']; ?>"></audio>
        <a href="<?php echo $row['audio']; ?>" download>Download</a>
    </div>
<?php } ?>
</div>
<button onclick="loadMore('news')">Load More</button>

<!-- LOAD MORE SCRIPT -->
<script>
let limits = {
    new: 5,
    trending: 5,
    album: 5,
    news: 5
};

function loadMore(section){
    limits[section] += 5;

    fetch("loadmore.php?section=" + section + "&limit=" + limits[section])
    .then(res => res.text())
    .then(data => {
        if(section === "new"){
            document.getElementById("newMusic").innerHTML = data;
        }
        if(section === "trending"){
            document.getElementById("trendingMusic").innerHTML = data;
        }
        if(section === "album"){
            document.getElementById("albumsMusic").innerHTML = data;
        }
        if(section === "news"){
            document.getElementById("newsMusic").innerHTML = data;
        }
    });
}
</script>

</body>
</html>
