<?php 
class UserGoogle
{
    private $id ;

    private $email;

    private $gendre;

    private $last_name;
    
    private $first_name;

    private $full_name;

    private $picture;

    private $verifiedEmail;
    
    private $token;

    public function __construct($ID, $email, $gendre, $last_name, $first_name,$full_name,$picture,$verifiedEmail,$token)
    {
        $this->id = $ID;
        $this->gendre = $gendre;
        $this->last_name = $last_name;
        $this->email = $email ;       
        $this->picture = $picture;
        $this->verifiedEmail = $verifiedEmail;
        $this->token = $token;
        $this->first_name = $first_name;
        $this->full_name = $full_name;

    }


    
    public function getID()
    {
        return $this->id;
    }



    public function setID($ID)
    {
        $this->id = $ID;
    }

    public function getGendre()
    {
        return $this->gendre;
    }



    public function setGendre($gendre)
    {
        $this->gendre = $gendre;
    }

    public function getPicture()
    {
        return $this->picture;
    }



    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getEmail()
    {
        return $this->email;
    }



    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getLast_name()
    {
        return $this->last_name;
    }



    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }




    public function getFirst_name()
    {
        return $this->first_name;
    }



    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getVerifiedEmail()
    {
        return $this->verifiedEmail;
    }



    public function setVerifiedEmail($verifiedEmail)
    {
        $this->verifiedEmail = $verifiedEmail;
    }


    public function getToken()
    {
        return $this->token;
    }



    public function setToken($token)
    {
        $this->token = $token;
    }

    

    public function getFull_name()
    {
        return $this->full_name;
    }



    public function setFull_name($full_name)
    {
        $this->full_name = $full_name;
    }
}
?>