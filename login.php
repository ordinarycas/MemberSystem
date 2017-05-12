<?php
  session_start();
  require_once('connect.php');
  if (isset($_POST) &!empty($_POST)) {
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    //$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $sql = "SELECT * FROM `login` WHERE username='$username'";
    $result = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($result);
    $count2 = mysqli_fetch_assoc($result);

    if(password_verify($_POST['password'],$count2["password"])){
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $count2["name"];
        $_SESSION['sex'] = $count2["sex"];
        $_SESSION['phome'] = $count2["phome"];
        $_SESSION['addr'] = $count2["addr"];
        $_SESSION['email'] = $count2["email"];
        $_SESSION['registertime'] = $count2["registertime"];
        $_SESSION['level'] = $count2["level"];
    }else{
        $fmsg = "Invalid Username/Password";
    }

    if (isset($_SESSION['username'])) {
        $smsg = "User already logged in";
        header('location: member.php');
    }
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
    <title>ShoppingGo 登入</title>
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
      
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">ShoppingGo 登入</h2>

        <label class="sr-only">Username</label>
        <input type="text" name="username" id="inputUser" class="form-control" placeholder="Username" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 請記住我
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
      </form>
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?></div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?></div><?php } ?>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>