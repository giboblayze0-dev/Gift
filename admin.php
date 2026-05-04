<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $file = $_POST['file'];
    $section = $_POST['section'];

    $conn->query("INSERT INTO songs (title, artist, file, section)
                  VALUES ('$title','$artist','$file','$section')");

    echo "Song added!";
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Song</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="artist" placeholder="Artist" required>
    <input type="text" name="file" placeholder="Song URL" required>

    <select name="section">
        <option value="new">New</option>
        <option value="trending">Trending</option>
        <option value="album">Album</option>
    </select>

    <button name="submit">Add Song</button>
</form>

</body>
</html>
