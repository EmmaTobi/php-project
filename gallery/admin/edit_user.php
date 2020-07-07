<?php include("includes/header.php"); ?>
<?php 
  if(!$session -> is_signed_in()){
    redirect('login.php');
 }
 ?>
<?php

if(empty($_GET["id"])){
    echo " id not present ;";
    redirect("users.php");
}else{
    $user = new user();
    $user = ($user->find_by_id($_GET["id"]))[0];
    if(isset($_POST["update"])){
        if($user){
           $user->username =  $_POST["username"];
           $user->password =  $_POST["password"];
           $user->first_name =  $_POST["first_name"];
           $user->last_name =  $_POST["last_name"];
           $user->save($user);
           redirect("users.php");
        }
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
                    Upload
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


            </div>
        </div>
        <!-- /.row -->
        <form action="edit_user.php" enctype="multipart/form-data" method="POST">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" name="title" value="<?php echo $user->username  ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Filename</label>
                    <input type="text" name="filename" value="<?php echo $user->password  ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" name="type" value="<?php echo $user->first_name  ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" name="description" value="<?php echo $user->description  ?>" class="form-control"></textarea>
                </div>
                <button type="submit" name="submit">Upload</button>
            
           </div>
           <div class="col-md-4">
            <div class="user-info-box">
                <div>
                    <span>Save</span><span>&uarr;</span>
                </div>
                <div class="user-info-list">
                    <ul>
                        <li> <span> Uploaded on: </span> </li>
                        <li> <span> user id: </span> </li>
                        <li> <span> Filename: </span> </li>
                        <li> <span> File Type: </span> </li>
                        <li> <span> File Size: </span> </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="delete_user.php?user_id=<?php echo $user->user_id ?>" data-target="">Delete</button>
                    </div>
                    <div class="col-md-6">
                        <a type="submit" name="update">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>