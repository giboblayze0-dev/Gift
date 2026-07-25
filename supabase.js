// supabase.js

import { createClient } from 
"https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";


const supabaseUrl = 
"https://dcimhdlyazlrevckjnqx.supabase.co";


const supabaseAnonKey =
"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImRjaW1oZGx5YXpscmV2Y2tqbnF4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODQ4MzIxMzgsImV4cCI6MjEwMDQwODEzOH0.8UsdL3oQoH1tBBe75mYWV2bnO_HdyrzV_fRgcKch104";


export const supabase = createClient(
    supabaseUrl,
    supabaseAnonKey
);
