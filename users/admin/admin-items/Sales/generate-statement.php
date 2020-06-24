<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT .'/users/admin/includes/auth-validate.php';?>

<?php


    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $data_to_db = filter_input_array(INPUT_POST);
        $order_by = 'finishing_date';
        $order_dir = 'Asc';
        $start_date= $data_to_db['start_date'];
        $end_date= $data_to_db['end_date'];

        $db = getDbInstance();
        $db->orderBy($order_by, $order_dir);
        $db->where('finishing_date',$start_date,'>=');
        $db->where('finishing_date',$end_date,'<=');
        $db->join("staff_accounts u", "o.artisen_assigned=u.id", "LEFT");
        $db->join("customer c", "o.cust_id=c.cust_id", "LEFT");
        $rows = $db->arraybuilder()->get('completed_orders o');

        $total= $db->where('finishing_date',$start_date,'>=')->where('finishing_date',$end_date,'<=')->getValue('completed_orders','SUM(order_price)');

    }

?>
<style>
td, th,h3,p{
    padding-left:20px;
    padding-right:20px;
    padding-top:5px;
}
table{
    padding-bottom:15px;
    border-bottom: 1px solid black;
}
.cost{
    padding-top:15px;
    padding-left:20px;
    display:flex;
}
.amount{
    margin-left:50rem;
}
</style>   
    <h3>SPLASH BOUTIQUE</h3>
    <h4>Billing Statement from <?php echo $start_date;?> to <?php echo $end_date;?></h4> 
<table class="table bg-white table-bordered  table-sm  ">
    <thead class="thead-light">
        <tr >
            <th >#</th>
            <th >Order ID</th>
            <th >Customer</th>
            <th >Ordered On</th>
            <th >Delivery</th>
            <th >Artisen</th>
            <th >Amount</th>
            <th >Dispached</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter =1;?>
        <?php foreach ($rows as $row): ?>
        <tr>
        <td>
        <?php echo $counter; ?></td>
        <td><?php echo htmlspecialchars($row['order_id']); ?></td>
        <td><?php echo htmlspecialchars($row['cust_name']); ?></td>
        <td><?php echo htmlspecialchars($row['ordered_at']); ?></td>
        <td ><?php echo htmlspecialchars($row['delivery_date']); ?> </td>
        <td ><?php echo htmlspecialchars($row['full_name']); ?> </td>
        <td ><?php echo htmlspecialchars($row['order_price']); ?> </td>
        <td ><?php echo htmlspecialchars($row['finishing_date']); ?> </td>

        </tr>
        <?php $counter = $counter+1;?>

        <?php endforeach; ?>
    </tbody>
</table>
<div class="cost">
<span>Revenue</span>
<div class="amount">
Rs <?php echo $total?> /=
</div>
</div>

