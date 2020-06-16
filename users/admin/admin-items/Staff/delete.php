<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>

<?php 
$id = filter_input(INPUT_POST, 'id');
if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $db = getDbInstance();
    $db->where('id', $id);
    $status = $db->delete('staff_accounts');
    if ($status) 
    {
        $_SESSION['success'] = "Staff Member deleted successfully!";
        header('location: staff-members.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete the member";
    	header('location: stff-members.php');
        exit;
    }
    
}else{
    die("Method not Allowed!");
}