<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT .'/users/admin/includes/auth-validate.php';?>

<?php 
$id = filter_input(INPUT_POST, 'id');
if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    $data = filter_input_array(INPUT_POST);
    $db = getDbInstance();
    $db->where('id', $id);
    $status = $db->update('staff_accounts',$data);
    if ($status) 
    {
        $_SESSION['success'] = "staff member updated successfully!";
        header('location: staff-members.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to update the staff member";
    	header('location: staff-members.php');
        exit;
    }
    
}else{
    die("Method not Allowed!");
}