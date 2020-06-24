<?php 
    session_start();

    if (isset($_SESSION['staff_account_type']) && $_SESSION['staff_account_type'] === 'admin')
    {
        header('Location: /main-page.php');   
        exit;

    } if (isset($_SESSION['staff_account_type'])   && $_SESSION['staff_account_type'] === 'manager')
    {
        header('Location: /main-page.php'); 
        exit;

    } if (isset($_SESSION['staff_account_type']) && $_SESSION['staff_account_type'] == "artisen")
    {
        header('Location: /users/artisen?name='.$_SESSION['staff_user_name'].'&id='.$_SESSION['staff_user_id']);

        exit;
    }
?>