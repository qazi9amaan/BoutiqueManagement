<?php 
    session_start();

    if (isset($_SESSION['staff_account_type']) && $_SESSION['staff_account_type'] === 'admin')
    {
        header('Location: /users/admin');

    }else if ($_SESSION['staff_account_type'] === TRUE)
    {
        header('Location: /users/manager');

    }else if ($_SESSION['staff_account_type'] === TRUE)
    {
        header('Location: /users/artisen');

    }

?>