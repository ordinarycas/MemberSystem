<?php
  require_once('connect.php');
  if (isset($_POST) &!empty($_POST)) {
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $datetime = gmdate("Y-m-d H:i:s",mktime(date('H')+8));
   
    $sql = "INSERT INTO `login` (username,email,password,registertime) VALUES ('$username','$email','$password','$datetime')";
    $result = mysqli_query($connection,$sql);
    if ($result) {
      $smsg = "User Registration Successfull";
    }else{$fmsg = "User Registration Failed";}
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>ShoppingGo 註冊</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse <!--fixed-top--> bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">ShoppingGo</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">首頁</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">商品</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php">登入</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">註冊</a>
            </li>
          </ul>
        </form>
      </div>
    </nav>

    <div class="container">
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?></div><?php } ?>
    <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?></div><?php } ?>
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">ShoppingGo 註冊</h2>

        <label class="sr-only">Username</label>
        <input type="text" name="username" id="inputUser" class="form-control" placeholder="Username" required autofocus>
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
