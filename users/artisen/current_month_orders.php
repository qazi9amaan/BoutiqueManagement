
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php
    
    $search_str	= filter_input(INPUT_GET, 'search_str_current');
   
    $order_by = 'order_id';
    $order_dir = 'Desc';
    $db = getDbInstance();
    if ($search_str) {
        $db->where('order_id', $search_str);

    }

    $db->orderBy($order_by, $order_dir);
    $db->where('artisen_assigned', $artist_id);
    $db->where('MONTH(finishing_date)',date("m"));
    $db->where('YEAR(finishing_date)', date('Y'));
    $rows = $db->arraybuilder()->get('completed_orders o');

?>
    
<div class="table-responsive mt-1">
<table class="table">
  <caption class="">
  <div class="text-center">
    </div>
  </caption>
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Placed</th>
      <th scope="col">Delivery</th>
      <th scope="col">Price</th>
      <th scope="col">Advance</th>
      <th scope="col">Pending</th>
      <th scope="col">Completed On</th>


    </tr>
  </thead>
  <tbody>
  <?php foreach ($rows as $row): ?>
    <tr>
      <th scope="row"><?php echo htmlspecialchars($row['order_id']); ?></th>
      <td ><?php echo date('j F Y', strtotime($row['ordered_at'])); ?> </td>
      <td > <?php echo date('j F Y', strtotime($row['delivery_date'])); ?></td>
      <td ><?php echo htmlspecialchars($row['order_price']); ?> </td>
      <td ><?php echo htmlspecialchars($row['advance_money']); ?> </td>
      <td ><?php echo htmlspecialchars((float)$row['order_price']-(float)$row['advance_money']); ?> </td>
      <td ><?php echo date('j F Y', strtotime($row['finishing_date'])); ?> </td>
    </tr>

    <div class="modal fade" id="confirm-delete-<?php echo $row['order_id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="/orders/delete_order.php?r=/users/customers/account.php?id=<?php echo $cust_id; ?>" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                          <div class="modal-header ">
                              <a>Confirmination </a>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body mb-0 pb-0">
                              <input hidden name="order_id" value="<?php echo $row['order_id']; ?>">

                              <p class="text-center"> Are you sure you want to delete this order?<br>
                              <i class="fa fa-arrow-circle-o-right"></i>
                              Deleting Order-<strong><?php echo htmlspecialchars($row['order_id']); ?></strong>
                              </p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-success pull-left">Proceed</button>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
    <?php endforeach; ?>
  
  </tbody>
</table>

</div>