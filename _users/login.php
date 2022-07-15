<?php
include('../database/connect.php');
include('handling/handling_login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../assets/others/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/others/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/users/login.css" rel="stylesheet">
</head>
<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" name="login">Đăng nhập</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="register.php">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="index.php">Return your page!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="../assets/others/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/others/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/others/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/users/login.js"></script>
</body>

</html>