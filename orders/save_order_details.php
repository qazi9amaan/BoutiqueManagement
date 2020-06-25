<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php 

   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {   
        $data = filter_input_array(INPUT_POST);
        $db = getDbInstance();
        
        // CUSTOMER DETAILS
        $data_cust['cust_name'] =$data['cust_name'];
        $data_cust['cust_phone_number'] =$data['cust_phone_number'];
        $data_cust['cust_sex'] =$data['cust_sex'];
        $data_cust['cust_address'] =$data['cust_address'];
        $data_cust['created_at'] =date('Y-m-d H:i:s');

        $cust_id = $db->insert('customer', $data_cust);
        if ($cust_id)
        {
            // PRODUCT DETAILS
            $data_product['product_color'] =$data['product_color'];
            $data_product['product_length'] =$data['product_length'];
            $data_product['product_owner'] =$cust_id ;
            $product_id = $db->insert('products', $data_product);
            if ($product_id)
            {   

                // MEASUREMENTS
                $data_measurement['measurement_belongs_to'] =$cust_id;
                $data_measurement['created_at'] =date('Y-m-d H:i:s');
                $data_measurement['no_of_pieces'] =$data['no_of_pieces'];
                $data_measurement['embroidery'] =$data['embroidery'];
                $data_measurement['upper_length'] =$data['upper_length'];
                $data_measurement['upper_chest'] =$data['upper_chest'];
                $data_measurement['upper_waist'] =$data['upper_waist'];
                $data_measurement['upper_hips'] =$data['upper_hips'];
                $data_measurement['upper_flair'] =$data['upper_flair'];
                $data_measurement['upper_hemline'] =$data['upper_hemline'];
                $data_measurement['upper_sleeves'] =$data['upper_sleeves'];
                $data_measurement['upper_neck_line'] =$data['upper_neck_line'];
                $data_measurement['lower_length'] =$data['lower_length'];
                $data_measurement['lower_poocha'] =$data['lower_poocha'];
                $data_measurement['lower_thy'] =$data['lower_thy'];
                $data_measurement['lower_waist'] =$data['lower_waist'];
                $data_measurement['lower_hips'] =$data['lower_hips'];

                $measurement_id = $db->insert('measurements', $data_measurement);
                
                if ($measurement_id)
                { 
                    // DEFAULT MEASUREMNETS
                    $data_meas_cust['measurement_id'] = $measurement_id;
                    $cust_bol = $db->where('cust_id',$cust_id)->update('customer', $data_meas_cust);


                    $data_order["additionals"]= $data['product_additional'].' '. $data['measurement_additonal'].' '. $data['specs_additonal'];
                    $data_order["cust_id"] = $cust_id;
                    $data_order["product_id"]= $product_id;
                    $data_order["measurement_id"]= $measurement_id;
                    $data_order["specifications"]=implode(',',$data['specs']);
                    $data_order["ordered_at"]=date('Y-m-d H:i:s');
                    $data_order["order_price"] = $data['order_price'];
                    $data_order["order_taken_by"] = $_SESSION['staff_user_id'];
                    $data_order["advance_money"] = $data['advance_money'];
                    $data_order["delivery_date"] = $data['delivery_date'];
                    $data_order["artisen_price"] = $data['artisen_price'];

                    
                    $order_id = $db->insert('orders', $data_order);
                
                    if ($order_id)
                    { 

                        $_SESSION['success'] = 'Order placed succcessfully!';
                        header('Location: /orders/complete-order-noti.php?q=success&order='.$order_id);
                        exit();
                    }else{
                        $db->where('product_id',$product_id)->delete('products');
                         $db->where('cust_id',$cust_id)->delete('customer');
                         $db->where('id',$measurement_id)->delete('measurements');
                        echo 'Insert failed: ' . $db->getLastError();
                        exit();
                    }

                } else
                {
                    
                    $db->where('product_id',$product_id)->delete('products');
                    $db->where('cust_id',$cust_id)->delete('customer');
                    echo 'Insert failed: ' . $db->getLastError();
                    exit();
                }

                
            }
            else
            {
                $db->where('cust_id',$cust_id)->delete('customer');
                echo 'Insert failed: ' . $db->getLastError();
                exit();
            }
            
        }
        else
        {
            echo 'Insert failed: ' . $db->getLastError();
            exit();
        }
        



        
        
        

        
    }else{
        die("Method not Allowed!");
    }

?>