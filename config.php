<?php
include 'config.php';

$section = $_GET['section'];
$limit = $_GET['limit'];

$result = mysqli_query($conn, "SELECT * FROM songs WHERE section='$section' LIMIT $limit");

while($row = mysqli_fetch_assoc($result)){
?>
    <div class="song">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['artist']; ?></p>
        <audio controls src="<?php echo $row['audio']; ?>"></audio>
        <a href="<?php echo $row['audio']; ?>" download>Download</a>
    </div>
<?php } ?>
