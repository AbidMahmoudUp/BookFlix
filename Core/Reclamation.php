<?php 
include_once('C://xampp/htdocs/projetv2/config.php');
include_once('C://xampp/htdocs/projetv2/Model/ClasseReclamation.php');
class CrudReclamation
{
    public static function insert($Reclamation)
    {   
        $sql = "INSERT INTO reclamation(idReclamation,idClient,topic,description,date,statusReclamation) 
        VALUES ('',:idClient,:topic,:description,:date,'In Progress')  ";
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $req->bindValue(":idClient", $_SESSION['idUser']);
            $req->bindValue(":description", $Reclamation->getDescription());
            $req->bindValue(":topic", $Reclamation->getTopic());
            $req->bindValue(":date", $Reclamation->getCreationDate());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
   
    public static function UpdateStatusReclamation($id, $status)
    {
        // Define an array that maps each status value to its corresponding new value
        $status_map = array(
            'In Progress' => 'Done',
            'Done' => 'Canceled',
            'Canceled' => 'In Progress'
        );
    
        // Look up the new status value based on the current value
        $new_status = $status_map[$status];
    
        // Construct the SQL query with a parameter for the new status value
        $sql = "UPDATE reclamation SET statusReclamation=:new_status WHERE idReclamation=:id";
    
        // Get the database connection and prepare the query
        $db = config::getConnexion();
        $req = $db->prepare($sql);
    
        // Bind the ID and new status parameters to the query
        $req->bindValue(":id", $id);
        $req->bindValue(":new_status", $new_status);
    
        // Execute the query and handle any errors
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    

    public function DisplayAllReclamation()
    {
        $sql="SELECT * FROM  reclamation,user where reclamation.idClient=user.id ";
        $db=config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

     public function searchByReclamationname($arg1)
    {
        $sql="SELECT * FROM Reclamation where Reclamationname like  '%".$arg1."%'" ;
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }
    
    
    public function SearchWithCheckBox($ConditionAttribut1,$ConditionAttribut2,$OrderAttribut)
    {
        if(($ConditionAttribut1=="")&&($ConditionAttribut2==""))
        {
        $sql="SELECT * FROM product order by price ".$OrderAttribut;
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }

        if(($ConditionAttribut1!="")&&($ConditionAttribut2!=""))
        {
        $sql="SELECT * FROM product where categories='".$ConditionAttribut1."' and type='".$ConditionAttribut2."' order by price ".$OrderAttribut;
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }
        if(($ConditionAttribut1=="")&&($ConditionAttribut2!="")){
            $sql="SELECT * FROM product where  type='".$ConditionAttribut2."' order by price ".$OrderAttribut;
            $db=config::getConnexion();
            try{
                $liste=$db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
        if(($ConditionAttribut1!="")&&($ConditionAttribut2==""))
        {    $sql="SELECT * FROM product where  categories='".$ConditionAttribut1."' order by price ".$OrderAttribut;
            $db=config::getConnexion();
            try{
                $liste=$db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   


        }

        
    }
}  
    
    
?>