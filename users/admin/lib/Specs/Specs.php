<?php
class Specs
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
            'specification_id' => 'ID',
            'specification_name' => 'Specification Name',
            'specification_price' => 'Price',
            'created_at' => 'Created at',
           
        ];

        return $ordering;
    }
}
?>

