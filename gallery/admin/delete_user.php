<?php include("includes/init.php"); ?>
<?php 
  if(!$session -> is_signed_in()){
    redirect('login.php');
 }
 ?>

<?php

if(empty($_GET["id"])){
    redirect("users.php");
}

$user = new User();
$user = ($user->find_by_id($_GET["id"]))[0];
if($user) {
    $user -> delete($user);
    redirect("/gallery/admin/users.php");
} else {
    ECHO "invalid user object";
    redirect("/gallery/admin/users.php");
}

?>