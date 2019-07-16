<?php

require_once(__DIR__ . '/app/Repository/UserRepository.php');

// Check if there are parameter in Get
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = $_GET['id'];
} else {
    echo 'There is no parameter id in requested URL.';
    exit();
}

// select and get the user from DB with $user_id
$userRepository = new UserRepository();
$user = $userRepository->getById($user_id);

// Check if there are exist user with $user_id
if (!$user) {
    echo 'No User with the selected ID';
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Workshop | Home</title>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Simple App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<article class="main container">
    <form method="post" action="/app/Controllers/update.php">

        <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input id="firstName" value="<?php echo $user->getFname(); ?>" name="fname" type="text"
                   placeholder="First Name" class="form-control"
                   required/>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" value="<?php echo $user->getEmail(); ?>" type="text" placeholder="Email"
                   class="form-control"
                   required/>
        </div>

        <div class="form-group">
            <label for="pass">Password</label>
            <input id="pass" type="password" name="password" placeholder="Entre Your Password"
                   class="form-control"
                   required/>
        </div>

        <div class="text-center submit-btn">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</article>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/main.js"></script>

</body>
</html>
