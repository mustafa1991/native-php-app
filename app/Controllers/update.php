<?php
require_once(__DIR__ . '/../Repository/UserRepository.php');
require_once(__DIR__ . '/../Models/User.php');

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

    $user = new User();
    $user->setId($data['id']);
    $user->setEmail($data['email']);
    $user->setFname($data['fname']);
    $user->setPassword($data['password']);

    $userRepo = new UserRepository();
    $success = $userRepo->update($user);
}


//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /dashboard.php');
    exit();
}