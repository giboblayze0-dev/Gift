import { supabase } from "../supabase.js";



async function checkUser(){

const {data}=await supabase.auth.getUser();


if(!data.user){

window.location="login.html";

}

}


checkUser();





async function loadSongs(){


const {data,error}=await supabase

.from("songs")
.select("*")
.order("created_at",
{ascending:false});



let box=document.getElementById("songs");

box.innerHTML="";



data.forEach(song=>{


box.innerHTML+=`

<div>

<img width="100" src="${song.image_url}">

<h3>${song.title}</h3>

<p>${song.artist}</p>


<a href="edit-song.html?id=${song.id}">
Edit
</a>


<button onclick="deleteSong(${song.id})">
Delete
</button>


</div>

<hr>

`;

});


}



window.deleteSong=async(id)=>{


if(confirm("Delete song?")){


await supabase

.from("songs")
.delete()
.eq("id",id);


loadSongs();

}


}





document.getElementById("logout").onclick=async()=>{

await supabase.auth.signOut();

location="login.html";

};



loadSongs();
