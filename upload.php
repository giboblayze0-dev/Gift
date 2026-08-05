// IMAGE CHECK

$imageType = $_FILES['image']['type'];

$allowedImages = [
"image/jpeg",
"image/png",
"image/webp"
];


if(!in_array($imageType,$allowedImages)){

die("Only JPG, PNG or WEBP images allowed");

}



// AUDIO CHECK

$audioType = $_FILES['audio']['type'];

if($audioType != "audio/mpeg"){

die("Only MP3 files allowed");

}



// CREATE UNIQUE NAMES

$imageName = time()."_".$_FILES['image']['name'];

$audioName = time()."_".$_FILES['audio']['name'];



move_uploaded_file(
$_FILES['image']['tmp_name'],
"../uploads/images/".$imageName
);



move_uploaded_file(
$_FILES['audio']['tmp_name'],
"../uploads/songs/".$audioName
);



$imagePath = "uploads/images/".$imageName;

$audioPath = "uploads/songs/".$audioName;
