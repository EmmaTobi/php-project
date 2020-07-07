<?php include("includes/header.php"); ?>
<?php 
  $message = "";
  if(!$session -> is_signed_in()){
    redirect('login.php');
  }
  if (isset($_POST['submit'])) {
    $photo = new Photo();
    $photo -> title =  $_POST['title'];
    $photo -> set_file($_FILES['file_upload']);
        if ($photo->save($photo)){
            $message = "Photo uploaded Successfully ...";
        }else {
            $message = join("<br>", $photo->custom_error_array);
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
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="col-md-12">
        <h2><?php  echo $message  ?></h2>
          <form action="upload.php" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="file_upload"  class="form-control">
            </div>
            <button type="submit" name="submit">Upload</button>
         </form>
        </div>
</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>