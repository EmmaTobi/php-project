<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect('login.php');
}
?>

<?php

if (isset($_POST["create"])) {
    $user = new User();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user->__construct1($username, $password, $first_name, $last_name);
    $user->set_file($_FILES['filename']);
    $user->save($user);

    if ($user) {
        redirect("users.php");
    } else {
        die("could not create user , try again next time");
    }
}

?>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include("includes/top_nav.php") ?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include("includes/side_nav.php") ?>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Users
                    <small>Subheading</small>
                </h1>


                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
                <div>
                    <div class="btn-group">
                        <a href="users.php" class="btn btn-primary">Back</a>
                    </div>

                </div>
                <form action="add_user.php" enctype="multipart/form-data" method="POST" style="margin-top: 50px;">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Firstname</label>
                            <input type="text" name="first_name" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Lastname</label>
                            <input type="text" name="last_name" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="filename">Display Picture</label>
                            <input type="file" name="filename" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-info" name="create">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>

<div>


    <?php include("includes/footer.php"); ?>