import { supabase } from "./supabase.js";

const params = new URLSearchParams(window.location.search);
const songId = params.get("id");


async function loadSong(){

    if(!songId){
        document.body.innerHTML = "Song not found";
        return;
    }


    const { data, error } = await supabase
        .from("songs")
        .select("*")
        .eq("id", songId)
        .single();


    if(error){
        console.log(error);
        document.body.innerHTML = "Song not found";
        return;
    }


    document.getElementById("title").textContent = data.title;
    document.getElementById("artist").textContent = data.artist;

    document.getElementById("cover").src = data.image;

    document.getElementById("audio").src = data.audio;

    document.getElementById("download").href = data.download;

}


loadSong();
