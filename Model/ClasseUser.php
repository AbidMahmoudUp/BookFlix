<?php 
class User
{
    private $id ;

    private $username;

    private $password;

    private $email;

    private $phone_number;

    private $photo;

    

    public function __construct($ID, $username, $password, $email, $phone_number,$photo)
    {
        $this->id = $ID;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email ;       
        $this->phone_number = $phone_number;
        $this->photo=$photo;
    }


    
    public function getID()
    {
        return $this->id;
    }



    public function setID($ID)
    {
        $this->id = $ID;
    }



    public function getUsername()
    {
        return $this->username;
    }



    public function setUsername($username)
    {
        $this->username = $username;
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
    
    
    
    public function getPhoto()
    {
        return $this->photo;
    }



    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

}
?>