<?php 
class livreur
{
    private $id ;
    private $name;
    private $phonenumber;

    

    public function __construct($ID, $name, $phonenumber)
    {
        $this->id = $ID;
        $this->name = $name;
        $this->phonenumber = $phonenumber;
 
    }


    
    public function getID()
    {
        return $this->id;
    }

    public function setID($ID)
    {
        $this->id = $ID;
    }

    
    public function getname()
    {
        return $this->name;
    }

    public function setname($name)
    {
        $this->name = $name;
    }
    
    public function getphone_number()
    {
        return $this->phonenumber;
    }

    public function setphone_number($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }

}
?>