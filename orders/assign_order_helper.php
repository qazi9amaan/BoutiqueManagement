<?php session_start();?>
<?php require_once '../libraries/config/config.php'; ?>

<?php 
$id = filter_input(INPUT_POST, 'order_id');
if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $data = filter_input_array(INPUT_POST);
    $data['order_status']='assigned';
    $db = getDbInstance();
    $db->where('order_id', $id);
    $status = $db->update('orders',$data);
    if ($status) 
    {
        $_SESSION['success'] = "Artisen assigned successfully!";
        if(@$_GET['r']){
             header('location:'.$_GET['r']);
        }else{
                    header('location: index.php');
        }
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to assign the artisen";
    	if(@$_GET['r']){
            header('location:'.$_GET['r']);
       }else{
            header('location: index.php');
       }
        exit;
    }
    
}else{
    die("Method not Allowed!");
}