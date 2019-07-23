<?php
require_once(__DIR__ . '/../Repository/UserRepository.php');
require_once(__DIR__ . '/../includes/uploadFile.php');

// 1- Catch inputs from request
// 2- Sanitize all inputs before use
// 3- Validate inputs
// 4- process inputs

$data = $_POST;

//*** validate inputs ***//
$hasErrors = false;

// Validate email
if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
    $hasErrors = true;
}

if (!isset($data['fname']) || empty($data['fname'])) {
    $hasErrors = true;
}
// @todo: continue validating remaining inputs


//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {
    $userRepo = new UserRepository();
    $success = $userRepo->create($data);

    // Start upload user image if user created successfully
    if ($success) {
        $filePath = uploadFile();
        // todo: do not miss to update the created user with the upload file path
    }
}


//*** Handle redirection after saving ***//
if ($success) {
    uploadFile();
    header('Location: /login.php');
    exit();
}