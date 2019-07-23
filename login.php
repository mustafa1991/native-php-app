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

    <title>Workshop | Login</title>
</head>
<body>
<div class="main">
    <div class="main-img">
        <img src="images/register-3.jpg" class="banner" alt="banner"/>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center full-height">
            <div class="col-sm-6 align-self-center auth-wrapper">
                <div class="auth-intro">
                    <h1 class="auth-title">Login form</h1>
                </div>
                <form id="loginForm" method="post" action="/app/Controllers/login.php">
                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="Entre Your Email" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="pass">Password</label>
                        <input id="pass" name="password" type="password" placeholder="Entre Your Password" class="form-control"
                               required/>
                    </div>
                    <div class="text-center submit-btn">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/main.js"></script>

</body>
</html>