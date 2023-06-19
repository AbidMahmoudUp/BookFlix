<?php
require_once(__DIR__ . '/../config.php');
include('../../Model/ClasseUserGoogle.php');

class CrudUserGoogle
{
    public function insert($Usergoogle)
    {
        
     

        $sql1 = "INSERT INTO `googleusers`(`email`,`first_name`,`last_name`,`verified_email`,`token`)
        VALUES (?,?,?,?,?)";
        $db = config::getConnexion();
        
        try
        {
            $req=$db->prepare($sql1);
           
  
        $req->execute([$Usergoogle->getEmail(),$Usergoogle->getFirst_name(),$Usergoogle->getLast_name(),$Usergoogle->getVerifiedEmail(),$Usergoogle->getToken()]);
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
            
        }
    }
    public function verifie($Usergoogle)
    {
        
        $sql1 = "SELECT * from`googleusers`where email=:email ";
        $db = config::getConnexion();

        
        try
        {
            $req=$db->prepare($sql1);
            $req->bindValue(':email',$Usergoogle->getEmail());
            $req->execute();
           $results = $req->fetch();
           return $results;
  
        
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
            return NULL;
        }
    }
}
?>