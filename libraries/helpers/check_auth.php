<?php 
 if(!isset($_SESSION['staff_member_logged_in'])){
    header('Location:/login.php');
    exit;
}

?>