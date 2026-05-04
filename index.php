<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Music Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>My Music</h2>
</nav>

<!-- SEARCH -->
<input type="text" id="search" placeholder="Search music..." onkeyup="searchMusic()">
<div id="searchResult"></div>

<!-- NEW MUSIC -->
<h2>New Music</h2>
<div id="newMusic"></div>
<button onclick="loadMore('new')">Load More</button>

<!-- TRENDING -->
<h2>Trending</h2>
<div id="trending"></div>
<button onclick="loadMore('trending')">Load More</button>

<!-- ALBUMS -->
<h2>Albums</h2>
<div id="albums"></div>
<button onclick="loadMore('album')">Load More</button>

<script>
let offsets = { new: 0, trending: 0, album: 0 };

function loadMore(section) {
    fetch(`loadmore.php?section=${section}&offset=${offsets[section]}`)
    .then(res => res.text())
    .then(data => {
        document.getElementById(section === 'new' ? 'newMusic' :
                              section === 'trending' ? 'trending' : 'albums')
        .innerHTML += data;

        offsets[section] += 5;
    });
}

// LOAD FIRST DATA
loadMore('new');
loadMore('trending');
loadMore('album');

// SEARCH
function searchMusic() {
    let query = document.getElementById("search").value;

    fetch(`search.php?q=${query}`)
    .then(res => res.text())
    .then(data => {
        document.getElementById("searchResult").innerHTML = data;
    });
}
</script>

</body>
</html>
