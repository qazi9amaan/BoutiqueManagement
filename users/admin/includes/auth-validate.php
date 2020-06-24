<?php 
    if (!isset($_SESSION['staff_account_type']))
    {
        header('Location: /login.php');   
        exit;
    } 
    if (isset($_SESSION['staff_account_type']) && $_SESSION['staff_account_type'] != 'admin')
    {
        header('Location: /error-pages/403.php');   
        exit;

    }
?>