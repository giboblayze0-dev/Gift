<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "../db.php";

$totalSongs = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM songs"))['total'];

$newMusic = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM songs WHERE section='new'"))['total'];

$trendingMusic = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM songs WHERE section='trending'"))['total'];

$albums = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM songs WHERE section='album'"))['total'];

$newVideos = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM songs WHERE section='new_video'"))['total'];

$trendingVideos = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM songs WHERE section='trending_video'"))['total'];

$views = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(views) AS total FROM songs"))['total'];

$likes = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(likes) AS total FROM songs"))['total'];

?>

<!DOCTYPE html>
<html>
<head>

<title>Zengomusic Admin</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Zengomusic Dashboard</h1>

<div class="dashboard">

<div class="box">
<h2><?php echo $totalSongs; ?></h2>
<p>Total Songs</p>
</div>

<div class="box">
<h2><?php echo $newMusic; ?></h2>
<p>New Music</p>
</div>

<div class="box">
<h2><?php echo $trendingMusic; ?></h2>
<p>Trending Music</p>
</div>

<div class="box">
<h2><?php echo $albums; ?></h2>
<p>Albums</p>
</div>

<div class="box">
<h2><?php echo $newVideos; ?></h2>
<p>New Videos</p>
</div>

<div class="box">
<h2><?php echo $trendingVideos; ?></h2>
<p>Trending Videos</p>
</div>

<div class="box">
<h2><?php echo $views ?: 0; ?></h2>
<p>Total Views</p>
</div>

<div class="box">
<h2><?php echo $likes ?: 0; ?></h2>
<p>Total Likes</p>
</div>

</div>

<hr>

<h2>Quick Menu</h2>

<p><a href="upload.php">Upload Song</a></p>

<p><a href="manage.php">Manage Songs</a></p>

<p><a href="logout.php">Logout</a></p>

</body>
</html>
