<?php
$conn = new mysqli("localhost", "root", "", "music");

// SEARCH
$search = "";
if (isset($_GET['search'])) {
    $search = "%" . $_GET['search'] . "%";

    $stmt = $conn->prepare("SELECT * FROM songs WHERE title LIKE ? OR artist LIKE ? ORDER BY id DESC");
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $searchResult = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Music Site</title>
</head>
<body>

<!-- NAV -->
<nav>
  <h2>My Music</h2>

  <form method="GET">
    <input type="text" name="search" placeholder="Search songs..." required>
    <button type="submit">Search</button>
  </form>
</nav>

<!-- SEARCH RESULTS -->
<?php if (isset($searchResult)) { ?>
  <h2>Search Results</h2>

  <?php while($row = $searchResult->fetch_assoc()) { ?>
    <div>
      <h3><?php echo $row['title']; ?></h3>
      <p><?php echo $row['artist']; ?></p>

      <audio controls>
        <source src="<?php echo $row['audio']; ?>">
      </audio>

      <br>
      <a href="<?php echo $row['audio']; ?>" download>Download</a>
    </div>
  <?php } ?>

  <hr>
<?php } ?>

<!-- FUNCTION TO LOAD SECTION -->
<?php
function loadSection($conn, $section) {
    $stmt = $conn->prepare("SELECT * FROM songs WHERE section=? ORDER BY id DESC LIMIT 5");
    $stmt->bind_param("s", $section);
    $stmt->execute();
    return $stmt->get_result();
}
?>

<!-- NEW MUSIC -->
<section>
  <h2>New Music</h2>
  <div id="new">
    <?php
    $result = loadSection($conn, "new");
    while($row = $result->fetch_assoc()) {
    ?>
      <div>
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['artist']; ?></p>

        <audio controls>
          <source src="<?php echo $row['audio']; ?>">
        </audio>

        <br>
        <a href="<?php echo $row['audio']; ?>" download>Download</a>
      </div>
    <?php } ?>
  </div>
  <button onclick="loadMore('new')">Load More</button>
</section>

<!-- TRENDING -->
<section>
  <h2>Trending Music</h2>
  <div id="trending"></div>
  <button onclick="loadMore('trending')">Load More</button>
</section>

<!-- ALBUMS -->
<section>
  <h2>Albums</h2>
  <div id="album"></div>
  <button onclick="loadMore('album')">Load More</button>
</section>

<!-- NEWS -->
<section>
  <h2>News</h2>
  <div id="news"></div>
  <button onclick="loadMore('news')">Load More</button>
</section>

<!-- FOOTER -->
<footer>
  <!-- You design here -->
</footer>

<!-- LOAD MORE SCRIPT -->
<script>
let offsets = {
  new: 5,
  trending: 0,
  album: 0,
  news: 0
};

function loadMore(section) {
  fetch("loadmore.php?section=" + section + "&offset=" + offsets[section])
  .then(res => res.text())
  .then(data => {
    document.getElementById(section).innerHTML += data;
    offsets[section] += 5;
  });
}

// Load first data for other sections
loadMore("trending");
loadMore("album");
loadMore("news");
</script>

</body>
</html>
