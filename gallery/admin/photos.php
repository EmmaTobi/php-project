<?php include("includes/header.php"); ?>

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
            Photos
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

</div>
<div>
            <table class="table table-hover">
                <thead>
                    <th>Photo</th>
                    <th>id</th>
                    <th>file name</th>
                    <th>title</th>
                    <th>size</th>
                </thead>
                <tbody>
                    <?php
                    $photo = new Photo();
                    $photos = $photo->find_all() ;
                    foreach($photos as $photo) :  ?>
                       <tr>
                            <td> <img style="width: 25px;height: 25px" src="<?php echo $photo->image_path() ?>" alt="cannot display" srcset=""> 
                                <div class="pictures">
                                    <a href="delete_photo.php?photo_id=<?php echo $photo->photo_id ?>">Delete</a>
                                    <a href="edit_photo.php?photo_id=<?php echo $photo->photo_id ?>">Edit</a>
                                    <a href="">View</a>
                                </div>
                            </td>
                            <td> <?php echo $photo->photo_id  ?> </td>
                            <td> <?php echo $photo->filename  ?> </td>
                            <td> <?php echo $photo->title  ?> </td>
                            <td> <?php echo $photo->size ?> </td>
                        <tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>


  <?php include("includes/footer.php"); ?>