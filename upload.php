<?php
$conn = new mysqli("localhost", "root", "", "music");

// CLOUDINARY CONFIG
$cloud_name = "dvvjrd7ax";
$api_key = "386928255371945";
$api_secret = "03IGQ";

// FUNCTION TO UPLOAD TO CLOUDINARY
function uploadToCloudinary($filePath, $resource_type = "auto") {
    global $cloud_name, $api_key, $api_secret;

    $timestamp = time();
    $signature = sha1("timestamp=$timestamp$api_secret");

    $url = "https://api.cloudinary.com/v1_1/$cloud_name/$resource_type/upload";

    $post = [
        "file" => new CURLFile($filePath),
        "api_key" => $api_key,
        "timestamp" => $timestamp,
        "signature" => $signature
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

// GET FORM DATA
$title = $_POST['title'];
$artist = $_POST['artist'];
$section = $_POST['section'];

// UPLOAD IMAGE
$imageTmp = $_FILES['image']['tmp_name'];
$imageUpload = uploadToCloudinary($imageTmp, "image");
$imageUrl = $imageUpload['secure_url'];

// UPLOAD AUDIO
$audioTmp = $_FILES['audio']['tmp_name'];
$audioUpload = uploadToCloudinary($audioTmp, "video"); // audio uses video type
$audioUrl = $audioUpload['secure_url'];

// SAVE TO DATABASE
$stmt = $conn->prepare("INSERT INTO songs (title, artist, audio, image, section) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $title, $artist, $audioUrl, $imageUrl, $section);
$stmt->execute();

echo "Upload successful!";
?>
