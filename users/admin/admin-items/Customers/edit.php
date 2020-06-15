<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>

<?php 
$id = filter_input(INPUT_POST, 'cust_id');
if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    $data = filter_input_array(INPUT_POST);
    $db = getDbInstance();
    $db->where('cust_id', $id);
    $status = $db->update('customer',$data);
    if ($status) 
    {
        $_SESSION['success'] = "Customer updated successfully!";
        header('location: Customers.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to update the customer";
    	header('location: Customers.php');
        exit;
    }
    
}else{
    die("Method not Allowed!");
}