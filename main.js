import { supabase } from "./supabase.js";


// Search songs
const searchBox = document.getElementById("searchBox");
const results = document.getElementById("search-results");


searchBox.addEventListener("input", async () => {

    const keyword = searchBox.value.trim();


    if (keyword === "") {
        results.innerHTML = "";
        return;
    }


    const { data, error } = await supabase
        .from("songs")
        .select("*")
        .or(
          `title.ilike.%${keyword}%,artist.ilike.%${keyword}%`
        )
        .limit(10);



    if (error) {
        console.log(error.message);
        return;
    }


    results.innerHTML = "";


    data.forEach(song => {

        results.innerHTML += `

        <div class="card">

        <a href="music/${song.slug}.html">

        <img src="${song.image_url}" 
        alt="${song.title}">

        <h3>${song.title}</h3>

        <p>${song.artist}</p>

        </a>

        </div>

        `;

    });

});
