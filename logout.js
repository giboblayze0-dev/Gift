import { supabase } from "./supabase.js";

const logoutBtn = document.getElementById("logoutBtn");

if (logoutBtn) {
    logoutBtn.addEventListener("click", async () => {

        const { error } = await supabase.auth.signOut();

        if (error) {
            alert("Logout failed: " + error.message);
        } else {
            window.location.href = "login.html";
        }

    });
}
