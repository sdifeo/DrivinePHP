<?php

class collection {
    
    public $information = array();
    
    #adds item/object to an array, makes it easier to access
    public function add($primarykey, $item)
    {
        $this->information[$primarykey] = $item;
    }
    
    #removes item/object from array
    public function remove($primarykey)
    {
        if(isset($this->information[$primarykey]))
        {
            unset($this->information[$primarykey]);
        }
    }
    
    #get specific item/object from array using primary key, like a search
    public function get ($primarykey)
    {
        if(isset($this->information[$primarykey]))
        {
            return $this->information[$primarykey];
        }
    }
    
    #counts items
    public function count ()
    {
        return count($this->information);
    }
        
}

