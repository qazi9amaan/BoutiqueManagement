
<?php
require_once '/var/www/html/libraries/config/config.php';

// HOLDER
if(isset($_GET['get-all-customers']))
{
    $db = getDbInstance();
    $db->where("MONTH(created_at)",date('m'));
    $db->groupBy("date(created_at)");
    $cols = Array ("count(*)");
    $data= $db->get ("customer", null, $cols);
    
    $main =array();
    foreach ($data as $d):
        $main[]=$d['count(*)'];
    endforeach;
    
    echo json_encode($main);

}


// HOLDER
if(isset($_GET['get-all-orders']))
{
    $db = getDbInstance();
    $db->where("MONTH(ordered_at)",date('m'));
    $db->groupBy("date(ordered_at)");
    $cols = Array ("count(*)");
    $data= $db->get("orders", null, $cols);
    $main =array();
    foreach ($data as $d):
        $main[]=$d['count(*)'];
    endforeach;
    
    echo json_encode($main);

}

   
?>
   
