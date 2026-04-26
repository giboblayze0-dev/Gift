<!DOCTYPE html>
<html>
<head>
  <title>Admin Upload</title>
</head>
<body>

<h2>Upload Song</h2>

<form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="text" name="title" placeholder="Song Title" required><br><br>
  
  <input type="text" name="artist" placeholder="Artist" required><br><br>

  <select name="section" required>
    <option value="new">New</option>
    <option value="trending">Trending</option>
    <option value="album">Album</option>
    <option value="news">News</option>
  </select><br><br>

  <input type="file" name="image" accept="image/*" required><br><br>
  <input type="file" name="audio" accept="audio/*" required><br><br>

  <button type="submit">Upload</button>
</form>

</body>
</html>
