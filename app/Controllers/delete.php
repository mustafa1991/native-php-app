<?php
require_once(__DIR__ . '/../Repository/UserRepository.php');

// 1- Catch inputs from request
// 2- Sanitize all inputs before use
// 3- Validate inputs
// 4- process inputs

$data = $_GET;

//*** validate inputs ***//
$hasErrors = false;

if (!isset($data['id']) || empty($data['id'])) {
    $hasErrors = true;
}


//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {
    $userRepo = new UserRepository();
    $success = $userRepo->deleteById($data['id']);
}


//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /dashboard.php');
    exit();
}