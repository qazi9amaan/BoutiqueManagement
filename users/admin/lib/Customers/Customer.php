<?php
class Customers
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
            'cust_id' => 'ID',
            'cust_name' => 'Customer Name',
            'cust_sex' => 'Sex',
            'created_at' => 'Created at',
           
        ];

        return $ordering;
    }
}
?>

