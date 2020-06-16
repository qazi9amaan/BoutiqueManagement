<?php
class staff
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
            'id' => 'ID',
            'full_name' => 'Name',
            'account_type' => 'Position',
            'created_at' => 'Created at',
           
        ];

        return $ordering;
    }
}
?>

