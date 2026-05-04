<?php
include 'config.php';

$q = $_GET['q'];

$result = $conn->query("SELECT * FROM songs WHERE title LIKE '%$q%' OR artist LIKE '%$q%'");

while($row = $result->fetch_assoc()) {
    echo "<div class='song'>
            <b>{$row['title']}</b> - {$row['artist']}
          </div>";
}
?>
