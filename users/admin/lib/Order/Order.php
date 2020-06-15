<?php
class Orders
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'o.order_id' => 'ID',
            'o.ordered_at' => 'Ordered at',
            'o.cust_id' => 'Customer',
            'o.delivery_date' => 'Delivery',
           
        ];

        return $ordering;
    }
}
?>

