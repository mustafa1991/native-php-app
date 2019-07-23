<?php
require_once(__DIR__ . '/../Repository/UserRepository.php');

$userRepo = new UserRepository();

$users = $userRepo->getAll();


$response = [];

foreach ($users as $user) {
    $obj = ['id' => $user->getId(), 'fname' => $user->getFname(), 'email' => $user->getEmail()];
    array_push($response, $obj);
}

$response = json_encode($response);

echo $response;
exit();