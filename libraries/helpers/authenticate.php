<?php
require_once '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$username = filter_input(INPUT_POST, 'phone_number');
	$password = filter_input(INPUT_POST, 'password');

	$db = getDbInstance();
	$db->where('phone_number', $username);
	$row = $db->getOne('staff_accounts');
	if ($db->count >= 1)
    {

		$db_password = $row['password'];
		if (password_verify($password, $db_password))
        {
			$_SESSION['admin_user_logged_in'] = TRUE;
			$_SESSION['admin_type'] = $row['admin_type'];
            $_SESSION['user_id'] = $row['id'];

			$_SESSION['staff_member_logged_in'] = TRUE;
			$_SESSION['staff_account_type'] = $row['account_type'];
            $_SESSION['staff_user_id'] = $row['id'];
            $_SESSION['staff_user_name'] = $row['full_name'];

			header('Location:  /libraries/helpers/choose_staff_panel.php');
		}else{
			$_SESSION['login_failure'] = 'Invalid credientials';
		header('Location: /login.php');
		exit;
		}
	}
    else
    {
		$_SESSION['login_failure'] = 'Invalid phone number';
		header('Location: /login.php');
		exit;
	}
}
else
{
	die('Method Not allowed');
}
