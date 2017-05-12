<?php
  session_start();
  require_once('connect.php');
  $unsetdat = "未設定";
  if (isset($_SESSION['username']) &!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM `login` WHERE username='$username'";
    $result = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($result);

  }else{
      header('location: login.php');
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
    <title>ShoppingGo 會員頁面</title>
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
              <a class="nav-link" href="member.php"><?php echo "$username"; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">登出</a>
            </li>
          </ul>
        </form>
      </div>
    </nav>

    <div class="container">
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?></div><?php } ?>
    <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?></div><?php } ?>
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">帳號</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php if(!empty($_SESSION['username'])){echo $_SESSION['username'];}else{echo $unsetdat;} ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性別</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php if(!empty($_SESSION['sex'])){echo $_SESSION['sex'];}else{echo $unsetdat;} ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php if(!empty($_SESSION['email'])){echo $_SESSION['email'];}else{echo $unsetdat;} ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];}else{echo $unsetdat;} ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">電話</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php if(!empty($_SESSION['phome'])){echo $_SESSION['phome'];}else{echo $unsetdat;} ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">地址</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php if(!empty($_SESSION['addr'])){echo $_SESSION['addr'];}else{echo $unsetdat;} ?></p>
                </div>
            </div>
        </form>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
