<?php
include 'config.php';

$section = $_GET['section'];
$offset = $_GET['offset'];

$result = $conn->query("SELECT * FROM songs WHERE section='$section' LIMIT 5 OFFSET $offset");

while($row = $result->fetch_assoc()) {
    echo "<div class='song'>
            <b>{$row['title']}</b> - {$row['artist']}<br>
            <audio controls src='{$row['file']}'></audio>
          </div>";
}
?>
