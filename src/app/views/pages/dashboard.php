<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dashboard Template · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



  <!-- Bootstrap core CSS -->
  <link href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


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


  <!-- Custom styles for this template -->
  <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
<button class="navbar-toggler position-absolute d-md-none collapsed" 
type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" 
aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <a class="nav-link px-3" href="debug.php">Sign out</a>
    </div>
    </div>
  </header>
  <?php if ($_SESSION['role'] == 'Admin') { ?>
    <div class="container-fluid">
    <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard">
                <span data-feather="home"></span>
                Dashboard
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="blogs">
                <span data-feather="file"></span>
                Blogs
            </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="users">
                  <span data-feather="shopping-cart"></span>
                  Users
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home">
                  <span data-feather="file"></span>
                  Home Page
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <h2>Last Five Coustumer</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
              <tr>
              <?php
                foreach ($data as $key => $value) { ?>
                <td><?php echo $value['user_id']; ?></td>
                <td><?php echo $value['user_name']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['role']; ?></td>
                <td><?php echo $value['status']; ?></td>
                </tr>
                    <?php
                }?>
              </tbody>
            </table>
          </div>
          <h2>Latest Blogs Added</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Blog Id</th>
                  <th scope="col">User Id</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Title</th>
                  <th scope="col">Content</th>
                  <th scope="col">Status</th>
                  <th scope="col">Time Date</th>
                </tr>
              </thead>
              <tbody>
              <tr>
              <?php
                foreach ($arr as $key => $value) { ?>
                <td><?php echo $value['blog_id']; ?></td>
                <td><?php echo $value['user_id']; ?></td>
                <td><?php echo $value['user_name']; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['content']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['time_date']; ?></td>
                </tr>
                    <?php
                }?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  <?php } else { ?>
    <div class="container-fluid">
    <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard">
                <span data-feather="home"></span>
                Dashboard
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="userBlogs">
                <span data-feather="file"></span>
                Blogs
            </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home">
                  <span data-feather="file"></span>
                  Home Page
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <h2>Latest Blogs Added</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Blog Id</th>
                  <th scope="col">User Id</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Title</th>
                  <th scope="col">Content</th>
                  <th scope="col">Status</th>
                  <th scope="col">Time Date</th>
                </tr>
              </thead>
              <tbody>
              <tr>
              <?php
                foreach ($arr as $key => $value) { ?>
                <td><?php echo $value['blog_id']; ?></td>
                <td><?php echo $value['user_id']; ?></td>
                <td><?php echo $value['user_name']; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['content']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['time_date']; ?></td>
                </tr>
                    <?php
                }?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  <?php } ?>

<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>