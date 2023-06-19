<?php
class Activities
{
    private $id ;

    private $idAdmin;

    private $description;

    private $picture;

    private $date;



    public function __construct($ID, $idAdmin, $description,$date,$picture)
    {
        $this->id = $ID;
        $this->idAdmin = $idAdmin;
        $this->description = $description;
        $this->picture=$picture;
        $this->date=$date;

    }



    public function getID()
    {
        return $this->id;
    }



    public function setID($ID)
    {
        $this->id = $ID;
    }



    public function getIDAdmin()
    {
        return $this->idAdmin;
    }



    public function setIDAdmin($idAdmin)
    {
        $this->idAdmin= $idAdmin;
    }



    public function getDescription()
    {
        return $this->description;
    }



    public function setDescription($description)
    {
        $this->description = $description;
    }



    public function getPicture()
    {
        return $this->picture;
    }



    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
   
    public function getDate()
    {
        return $this->date;
    }



    public function setDate($date)
    {
        $this->date = $date;
    }
}
?>