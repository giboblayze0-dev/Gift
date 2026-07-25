import { supabase } from "../supabase.js";


document.getElementById("login").onclick = async()=>{


let email = document.getElementById("email").value;

let password = document.getElementById("password").value;



const {data,error}= await supabase.auth.signInWithPassword({

email,
password

});


if(error){

document.getElementById("message").innerHTML =
error.message;

}else{

window.location="admin.html";

}


};
