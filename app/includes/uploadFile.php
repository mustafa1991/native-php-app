<?php
function uploadFile()
{
    $target_dir = __DIR__ . "/../../uploads/";

    $target_file = $target_dir . basename($_FILES["profile-img"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profile-img"]["tmp_name"]);
        if ($check == false) {
            return false;
        }
    }

    // Check file size
    if ($_FILES["profile-img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        return false;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        return false;
    }

    // start upload file
    if (move_uploaded_file($_FILES["profile-img"]["tmp_name"], $target_file)) {
        // Upload success
        return $target_dir;

    } else {
        return false;
    }
}