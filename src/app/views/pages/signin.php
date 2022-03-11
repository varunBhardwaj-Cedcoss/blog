<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin</title>    

    <!-- Bootstrap core CSS -->
    <link href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body class="text-center container">    
<main class="form-signin">
  <form action="check" method="post">
    <h1 class="h3 mb-3 fw-normal">Sign In</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <?php include 'errors.php'?>
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="signin">Sign in</button>
    <?php if (isset($_SESSION['errors'])) {
        $_SESSION['errors'] = [];?>
      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="againsignup">Sign up</button>
    <?php }?>
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
  </form>
</main>
</body>
</html>