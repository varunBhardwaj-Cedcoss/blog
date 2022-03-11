<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="home.css">
</link>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</link>
<title>Document</title>
</head>

<body style="background-color:#ffe5b4">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="#" class="navbar-brand">The<b>BlogGers</b></a>
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
<span class="navbar-toggler-icon"></span>
</button>
<!-- Collection of nav links, forms, and other content for toggling -->
<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
<div class="navbar-nav">
<form action="" method="post" class="navbar-form form-inline">
<div class="input-group search-box">
<input type="text" name="searchInput" value="<?php if (isset($_POST['searchInput'])) {
    echo $_POST['searchInput'];
                                             } ?>" class="form-control p-4" placeholder="Search here...">
<button name="searchbtn" class="btn btn-success">Search</button>
<div class="dropdown mx-3">
<button class="btn btn-primary dropdown-toggle" name='filter' data-toggle="dropdown">Filter By:
<span class="caret"></span></button>
<ul class="dropdown-menu">
<li><button class="btn btn-primary mx-3" value='ASC' name='filter'>low to high</button></li>
<li><button class="btn btn-primary mx-3" value='DESC' name='filter'>high to low</button></li>
</ul>
</div>
</div>
</form>
</div>

<div class="navbar-nav action-buttons ml-auto">
<?php if (empty($_SESSION['user']) && empty($_SESSION['email'])) { ?>
<a href="signin" class="btn btn-primary nav-item nav-link mr-3">Login</a>
<?php } else { ?>
<a href="dashboard" class="nav-item nav-link">Dashboard</a>
<a href="profile" class="nav-item nav-link mr-3">Profile</a>
<a href="logout" class="nav-item nav-link mr-3">Logout</a>
<?php } ?>
<a href="cart.php" class="btn btn-primary">Cart</a>
</div>
</div>
</nav>
<div class="container">
<div id='htm' class="row">
<?php foreach ($data as $key => $value) {
    ?>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-dark mt-3"><?php echo $value['title']; ?></h1>
                </div>
                <div class="col-md-12 text-danger">
                <?php echo "Time:" . $value['time_date']; ?>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 deflist">
                        <?php echo "Blogger: " . $value['user_name']; ?>
                        </div>
                        <div class="col-md-12 text-center about">
                            <h3 class="text-muted mt-3">Description</h3>
                        </div>
                        <div class="col-md-12 text-center about">
                            <h4 class=" text-primary mt-3"><?php echo $value['content'];?></h4>
                        </div>
                    </div>
                </div>
<?php }?>
</div>
<nav aria-label="Page navigation example">
<ul class="pagination"></nav>
</div>
</body>
</html>