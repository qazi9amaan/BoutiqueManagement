<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>

<?php 
$id = filter_input(INPUT_POST, 'specification_id');
if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    $data = filter_input_array(INPUT_POST);
    $db = getDbInstance();
    $db->where('specification_id', $id);
    $status = $db->update('specifications',$data);
    if ($status) 
    {
        $_SESSION['success'] = "Specification updated successfully!";
        header('location: Specs.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to update the specification";
    	header('location: Specs.php');
        exit;
    }
    
}else{
    die("Method not Allowed!");
}