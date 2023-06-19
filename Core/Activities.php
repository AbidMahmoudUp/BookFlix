<?php
require_once(__DIR__ . '/../config.php');
include_once('C://xampp/htdocs/projet/Model/ClasseActivities.php');
class CrudActivities{

    public static function insert($Activitie)
    {
        $sql = "INSERT INTO activities(id,idAdmin,description,date,picture) 
        VALUES ('',:idAdmin,:description,:date,:picture)  ";
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $req->bindValue(":idAdmin", $Activitie->getIDAdmin());
            $req->bindValue(":description", $Activitie->getDescription());
            $req->bindValue(":picture", $Activitie->getPicture());
            $req->bindValue(":date", $Activitie->getDate());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    public static function displayActivitiesProfile($idAdmin)
    {
        $sql="SELECT * FROM activities where activities.idAdmin='".$idAdmin."' ORDER BY activities.id DESC";
        $db=config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
?>