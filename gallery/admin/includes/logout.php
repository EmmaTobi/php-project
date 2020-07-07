<?php include("header.php"); ?>
<?php
    
    if($session -> is_signed_in()){
        $session->logout(User::find_user_by_id($session->user_id));
        redirect("../login.php");
    }

?>