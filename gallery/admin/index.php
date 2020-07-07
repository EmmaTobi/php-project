<?php include("includes/header.php"); ?>
<?php 
  if(!$session -> is_signed_in()){
    redirect('login.php');
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
            Admin
            <small>Subheading</small>
        </h1>

        <?php
                // $user = new User();
                // $user = $user->find_by_id(1);
                // echo "previous username >>> " . $user->username;
                // $user->username = "Amo membrane 2221111";
                // $user->save();
                // echo "current username >>> " . $user->username;
                // $user = new User();
                // $user->__construct1("justinae","0001112222", "micheblackson", "destroyer");
                // if($user->save()){
                //     echo 'user created successfully ...';
                // }else{
                //     echo 'user could not be created ...';
                // }
                // $user = User::find_user_by_id(20);
                // if($user){
                //     if($user->delete_user()){
                //         echo "user with id {$user->id}  deleted successfully ...";
                //     }
                // }else{
                //     echo "error occured while deleting user";
                // }

                // $photo = new Photo();
                // $photo_array = $photo->find_by_id(1);
                // $photo = $photo_array[0];
                // var_dump($photo);
                // echo "\t id = {$photo->photo_id} previous photo title >>> " . $photo->title;
                // $photo->title = "Amo membrane 2221111";
                // $photo->save($photo);
                // echo "current photo title >>> " . $photo->title;
                // $photo = new Photo();
                // $photo->title = "amazon";
                // $photo->description = "amazon amamaxon description";
                // $photo->size = "5 mb";
                // $photo->save($photo);
                // echo INCLUDES_PATH;
                echo basename("drag/emmatobi.txt");

        ?>

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

</div>
<!-- /.container-fluid -->
   </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>