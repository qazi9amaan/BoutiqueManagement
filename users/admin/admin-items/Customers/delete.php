<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>

<?php 
$id = filter_input(INPUT_POST, 'cust_id');
if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $db = getDbInstance();
    $db->where('cust_id', $id);
    $status = $db->delete('customer');
    if ($status) 
    {
        $_SESSION['success'] = "Customer deleted successfully!";
        header('location: Customers.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete the customer";
    	header('location: Customers.php');
        exit;
    }
    
}else{
    die("Method not Allowed!");
}