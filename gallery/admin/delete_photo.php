<?php include("includes/init.php"); ?>
<?php 
  if(!$session -> is_signed_in()){
    redirect('login.php');
 }
 ?>
<?php

    if(empty($_GET["photo_id"])){
        redirect("photos.php");
    }
    $photo = new Photo();
    $photo = ($photo->find_by_id($_GET["photo_id"]))[0];
    if($photo) {
        $photo -> delete_photo($photo);
        redirect("/admin/index.php");
    } else {
        ECHO "invalid photo object";
        redirect("/admin/index.php");
    }
?>