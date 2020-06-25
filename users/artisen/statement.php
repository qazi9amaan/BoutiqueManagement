
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php


    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $data_to_db = filter_input_array(INPUT_POST);
        $order_by = 'order_id';
        $order_dir = 'Desc';
        $artist_id= $data_to_db['id'];
        $artist= $data_to_db['full_name'];
        $month= $data_to_db['month'];
        $year= $data_to_db['year'];
        $salary= $data_to_db['salary'];

        $db = getDbInstance();
        $db->orderBy($order_by, $order_dir);
        $db->where('artisen_assigned', $artist_id);
        $db->where('MONTH(finishing_date)',$month);
        $db->where('YEAR(finishing_date)', $year);
        $rows = $db->arraybuilder()->get('completed_orders o');
        $total = $db->where('artisen_assigned', $artist_id)->where('MONTH(finishing_date)',$month)->where('YEAR(finishing_date)', $year)->getValue('completed_orders' ,'count(*)');
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
    margin-left:38rem;
}
</style>
<h3>Orderly Statement for the month of <?php echo date('F', strtotime($month)).'-'.$year;?></h3>
<p> Artisen : <strong><?php echo $artist;?></strong> </p>
<table class="table">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Placed</th>
      <th scope="col">Delivery</th>
      <th scope="col">Artisen Cost</th>
      <th scope="col">Price</th>
      <th scope="col">Advance</th>
      <th scope="col">Pending</th>
      <th scope="col">Completed On</th>

    </tr>
  </thead>

  <tbody>

  <?php 
  $sal = 0;
  foreach ($rows as $row): ?>
    <tr>
      <th scope="row"><?php echo htmlspecialchars($row['order_id']); ?></th>
      <td ><?php echo date('d/m/y', strtotime($row['ordered_at'])); ?> </td>
      <td > <?php echo date('d/m/y', strtotime($row['delivery_date'])); ?></td>
      <td ><?php echo htmlspecialchars($row['artisen_price']); ?> </td>
      <td ><?php echo htmlspecialchars($row['order_price']); ?> </td>
      <td ><?php echo htmlspecialchars($row['advance_money']); ?> </td>
      <td ><?php echo htmlspecialchars((float)$row['order_price']-(float)$row['advance_money']); ?> </td>
      <td ><?php echo date('d/m/y', strtotime($row['finishing_date'])); ?> </td>
    </tr>
    <?php 
  $sal = $sal+(int)$row['artisen_price'];
  endforeach; ?>
  </tbody>
</table>
<div class="cost">
<span>Salary</span>
<div class="amount">
Rs <?php echo $sal?> /=
</div>
</div>


