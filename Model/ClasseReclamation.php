<?php 
class Reclamation
{
    private $id ;

    private $idClient;

    private $topic;

    private $description;
    
    private $creationDate;

    private $status;


    public function __construct($ID,$idClient, $topic, $description, $creationDate,$status)
    {
        $this->id = $ID;
        $this->idClient=$idClient;
        $this->topic = $topic;
        $this->description = $description;      
        $this->creationDate = $creationDate;
        $this->status=$status;
    }


    
    public function getID()
    {
        return $this->id;
    }



    public function setID($ID)
    {
        $this->id = $ID;
    }


    public function getIDClient()
    {
        return $this->idClient;
    }



    public function setIDClient($idClient)
    {
        $this->idClient = $idClient;
    }

    public function getTopic()
    {
        return $this->topic;
    }



    public function setTopic($topic)
    {
        $this->topic = $topic;
    }



    public function getDescription()
    {
        return $this->description;
    }



    public function setDesgetDescription($description)
    {
        $this->description = $description;
    }



    public function getStatus()
    {
        return $this->status;
    }



    public function setStatus($status)
    {
        $this->status = $status;
    }



    public function getCreationDate()
    {
        return $this->creationDate;
    }



    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
    
    
    

}
?>