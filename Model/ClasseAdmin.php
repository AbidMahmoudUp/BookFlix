<?php 
class Admin
{
    private $id ;

    private $name;

    private $password;

    private $email;

    private $address;
    
    private $work;
    
    private $responsibility;

    private $picture;

    private $country;

    private $phone_number;

 //----------------------------------End Declaration---------------------------------------   
    public function __construct($ID, $name, $password, $email, $phone_number,$address,$work,$country,$responsibility,$picture)
    {
        $this->id = $ID;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email ;       
        $this->phone_number = $phone_number;
        $this->address=$address;
        $this->work=$work;
        $this->country=$country;
        $this->responsibility=$responsibility;
        $this->picture=$picture;
    }


    
    public function getID()
    {
        return $this->id;
    }



    public function setID($ID)
    {
        $this->id = $ID;
    }



    public function getName()
    {
        return $this->name;
    }



    public function setName($name)
    {
        $this->name= $name;
    }



    public function getPassword()
    {
        return $this->password;
    }



    public function setPassword($password)
    {
        $this->password = $password;
    }



    public function getEmail()
    {
        return $this->email;
    }



    public function setEmail($email)
    {
        $this->email = $email;
    }



    public function getPhoneNumber()
    {
        return $this->phone_number;
    }



    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }



    public function getAddress()
    {
        return $this->address;
    }



    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getWork()
    {
        return $this->work;
    }



    public function setWork($work)
    {
        $this->work = $work;
    }

    public function getCountry()
    {
        return $this->country;
    }



    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getResponsibility()
    {
        return $this->responsibility;
    }



    public function setResponsibility($responsibility)
    {
        $this->responsibility = $responsibility;
    }

    public function getPicture()
    {
        return $this->picture;
    }



    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

}
?>