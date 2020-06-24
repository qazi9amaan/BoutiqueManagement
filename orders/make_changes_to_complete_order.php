<?php session_start();?>
<?php require_once '../libraries/config/config.php'; ?>

<?php 
$id = filter_input(INPUT_POST, 'order_id');
if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $db = getDbInstance();

    $data = filter_input_array(INPUT_POST);
    $order=$db->where('order_id',$id)->getOne('completed_orders');
    $data_order["order_id"] = $id;
    $data_order["additionals"] = $order['additionals'];
    $data_order["cust_id"] =$order['cust_id'];
    $data_order["product_id"]= $order['product_id'];
    $data_order["specifications"]=$order['specifications'];
    $data_order["artisen_assigned"]=$data['artisen_assigned'];
    $data_order["ordered_at"]=$order['ordered_at'];
    $data_order["order_price"] = $order['order_price'];
    $data_order["order_taken_by"] =$order['order_taken_by'];
    $data_order["advance_money"] = $order['payment']+$order['advance_money'];
    $data_order["delivery_date"] = $data['delivery_date'];
    $data_order["measurement_id"]= $order['measurement_id'];
    $data_order["extended_reason"]= $data['extended_reason'];
    $data_order["previous_delivery"]= $order['delivery_date'];
    $data_order["order_status"]= 'assigned';

    $status = $db->insert('orders',$data_order);
    if ($status) 
    {
        $status = $db->where('order_id',$id)->delete('completed_orders');
        $_SESSION['success'] = "Order resubmitted successfully!";
        if(@$_GET['r']){
             header('location:'.$_GET['r']);
        }else{
                    header('location: index.php');
        }
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to complete the resubmittion";
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